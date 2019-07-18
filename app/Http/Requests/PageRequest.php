<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Spatie\Valuestore\Valuestore;

class PageRequest extends FormRequest
{
    public $index;

    public $page = [];

    public function rules(){
        return [];
    }

    public function __construct(){
        Parent::__construct();

        $this->index = Route::currentRouteName();

        $this->page = page_index($this->index);
        $this->page['sections'] = page_sections($this->index);
    }


    public function getPageAttributes(){
        $this->page['index'] = $this->index;

        return $this->page;
    }
}
