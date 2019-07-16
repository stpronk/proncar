<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class PageController extends BaseController
{
    public function index(){
        return $this->view('pages.index', $pages);
    }
}
