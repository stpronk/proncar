<?php

namespace App\Http\Requests;

use App\Content;
use App\Models\Pages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Valuestore\Valuestore;

class PageRequest extends FormRequest
{
    protected $index;
    protected $page = [];

    public function rules(){
        return [];
    }

    public function __construct(){
        Parent::__construct();

        $this->index = Route::currentRouteName();
    }


    public function getPageAttributes(){
        // Check if their is a use logged in
        // if this not the case then it will get all content based on the valueStore content
        // else it will get the database content
        if(!Auth::check()) {
            $this->page             = page_index($this->index);
            $this->page['sections'] = page_sections($this->index);
        } else {

            $data =

            $data = $data->mapWithKeys(function($value, $key){
                return [$value->selector => $value];
            })->valueToArray();
        }

        // setup the index of the page
        $this->page['index'] = $this->index;

        // Return all attributes that will be used within the application
        return $this->page;
    }
}
