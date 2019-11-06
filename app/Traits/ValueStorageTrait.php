<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Spatie\Valuestore\Valuestore;

trait ValueStorageTrait
{
    /** @var Spatie\Valuestore\Valuestore|null */
    private $valueStore;

    /** @var string */
    private $storagePath;

    /** @var string */
    private $folderPath = 'storage/valueStore/';

    /** @var string */
    private $fileName;

    /** @var string */
    private $key;

    /** @var string */
    public $folder;

    /** @var string */
    public $string;


    /**
     * BaseValueStore constructor.
     */
    public function __construct ()
    {
        // if string is set
        if($this->string)
        {
            // ValueStoreHelperTrait function
            $this->transform($this->string);
        }

        // Set all necessary variables
        $this->setFolderPath($this->folder);
        $this->setStoragePath();
        $this->setValueStore();
    }

    /**
     * Transform the string into something that can be used
     *
     * @param string $string
     *
     * @return $this
     */
    protected function transform(string $string)
    {
        // explode the string
        $exString = explode('.', $string);

        // Get the file name out of the exploded string & unset it
        $this->setFileName($exString[0]);
        unset($exString[0]);

        // Check if there is more left
        if(isset($exString[1])) {
            // Implode it to dot notation again
            $this->key = implode('.', $exString);
        }

        // Return this
        return $this;
    }

    /**
     * Loads the ValueStore
     *
     * @return $this|null
     */
    protected function setValueStore()
    {
        $this->setStoragePath();

        // Check if value store exists
        if(!file_exists($this->storagePath))
        {
            // Return null
            $this->valueStore = null;

            return $this;
        }

        // set valueStore within the valueStore variable
        $this->valueStore = Valuestore::make($this->storagePath);

        // Return instance
        return $this;
    }

    /**
     * Get the value store
     *
     * @param string|null $folder
     * @param string|null $file
     *
     * @return \App\Traits\Spatie\Valuestore\Valuestore
     */
    protected function getValueStore(string $folder = null, string $file = null)
    {
        // Check if folder or file is given
        if(!is_null($folder) || !is_null($file)){
            $this->setStoragePath($folder, $file);
        }

        if(!file_exists($this->storagePath))
        {
            // Return null
            $this->valueStore = null;
        }

        return $this->valueStore = $this->setValueStore()->valueStore;
    }

    /**
     * create a new valueStore document
     *
     * @param string $folder
     * @param string $file
     * @param array  $values
     * @param bool   $overwrite
     *
     * @return $this|null
     */
    protected function CreateValueStore(string $folder = null, string $file = null, array $values = [], bool $overwrite = false)
    {
        // Set the storage path
        $this->setStoragePath($folder, $file);

        // Check if file exists & the overwrite is disabled
        if(file_exists($this->storagePath) && $overwrite == false) {
            // Return null
            return null;
        }

        // Create a new value store
        $this->valueStore = Valuestore::make($this->storagePath)->flush()->put($values);

        // Return instance
        return $this;
    }

    /**
     * @param array       $values
     * @param string|null $folder
     * @param string|null $file
     *
     * @return $this|null
     */
    protected function UpdateValueStore(array $values, string $folder = null, string $file = null)
    {
        // Set the storage path
        $this->setStoragePath($folder, $file);

        // Check if file exists
        if(!file_exists($this->storagePath)){
            // Return null
            return null;
        }

        // Update the selected value store
        $this->valueStore = Valuestore::make($this->storagePath, $values);

        // Return instance
        return $this;
    }

    /**
     * @param        $values
     * @param string $folder
     * @param string $file
     *
     * @return \App\Traits\ValueStorageTrait|null
     */
    protected function UpdateOrCreateValueStore($values, string $folder = null, string $file = null)
    {
        // Set the storage path
        $this->setStoragePath($folder, $file);

        // Check if file exists
        if(file_exists($this->storagePath)) {
            // update the selected ValueStore
            return $this->UpdateValueStore($values, $folder, $file);
        }

        // Create a new valueStore
        return $this->CreateValueStore($folder, $file, $values, true);
    }

    /**
     * @param array       $values
     * @param string|null $folder
     * @param string|null $file
     *
     * @return \App\Traits\Spatie\Valuestore\Valuestore
     */
    protected function forgetArray(array $values, string $folder = null, string $file = null)
    {
        // Set the storage path
        $this->setStoragePath($folder, $file);

        // Check if file exists
        if(!file_exists($this->storagePath)) {
            // Return null
            return null;
        }

        // Convert both to a dot notation
        $values = Arr::dot($values);
        $valueStore = Arr::dot($this->valueStore->all());

        // loop trough the values
        foreach($values as $key=>$value)
        {
            // Unset every value
            unset($valueStore[$key]);
        }

        // create a array to store the new values
        $newValueStore = [];

        // Loop through the left over values
        foreach ($valueStore as $key=>$value)
        {
            // Set every value
            Arr::set($newValueStore, $key, $value);
        }

        // Set new content on the valueStore
        $this->valueStore->setContent($newValueStore);

        // Return the new valueStore
        return $this->getValueStore();
    }

    /**
     * Get the storage path for the valueStore loader
     *
     * @param string      $folder
     * @param string|null $file
     *
     * @return string
     */
    protected function getStoragePath(string $folder = null, string $file = null)
    {
        // Check if folder is null
        if(is_null($folder)){
            // Set folderPath
            $folder = $this->folderPath;
        }

        // Check if file is null
        if(!is_null($file)){
            // Set fileName
            $file = $this->fileName;
        }

        // Return the storagePath
        return "{$folder}{$file}.json";
    }

    /**
     * @param string|null $folder
     * @param string|null $file
     *
     * @return $this
     */
    protected function setStoragePath(string $folder = null, string $file = null)
    {
        // Check if folder is null
        if(is_null($folder)){
            $folder = $this->folderPath;
        }

        // Check if file is null
        if(is_null($file)){
            $file = $this->fileName;
        }

        // set the storagePath
        $this->storagePath = "{$folder}{$file}.json";

        // Return the instance
        return $this;
    }

    /**
     * Get the values asserted to the key
     *
     * @return null|
     */
    protected function getByKey()
    {
        // Get all settings from the config
        $valueStore = $this->valueStore->all();

        // See if tou want a child setting
        if($this->key)
        {
            // Explode the child settings
            $exSetting = explode('.', $this->key);

            // Foreach child setting within the explode
            foreach ($exSetting as $key=>$value)
            {
                // Go one layer deeper each time
                if(!Arr::has($valueStore, $value)) {
                    return null;
                }
                $valueStore = $valueStore[$value];
            }
        }

        // Return the final result
        return $valueStore;
    }


    public function valueToArray(){
        return $this->valueStore->all();
    }

    //------------ Setters & Getters ------------//

    /**
     * @param string|null $folder
     *
     * @return $this|\Spatie\Valuestore\Valuestore
     */
    public function setFolderPath(string $folder = null){

        if($folder !== null) {
            $this->folderPath = $folder;
        } else {
            $this->folderPath = storage_path();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFolderPath(){
        return $this->folderPath;
    }

    /**
     * @param string $fileName
     *
     * @return $this|\Spatie\Valuestore\Valuestore
     */
    public function setFileName(string $fileName){
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName(){
        return $this->fileName;
    }
}
