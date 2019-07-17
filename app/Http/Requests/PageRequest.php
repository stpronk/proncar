<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getPageAttributes(){
        $key = Route::currentRouteName();
        $page = page_index()[$key];
        $page['index'] = $key;

        return $page;
    }
}
