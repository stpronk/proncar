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
        // Setup the basics
        $this->page             = page_index($this->index);
        $this->page['sections'] = page_sections($this->index);

        // setup the index of the page
        $this->page['index'] = $this->index;

        // Return all attributes that will be used within the application
        return $this->page;
    }
}
