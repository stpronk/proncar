<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view($blade, $data = []){
        return view($blade, array_merge($data, $this->viewData()));
    }

    protected function viewData(){
        return [
            'nav' => $this->generateNavItems()
        ];
    }

    protected function generateNavItems(){
        $navigation = [];

        foreach (page_index() as $key => $values) {
            if(!$values['nav']['hidden']){
                $navigation[$key]['url']  = $key;
                $navigation[$key]['name'] = $values['nav']['name'];
                $navigation[$key]['class'] = $values['nav']['class'];
            }
        }

        return $navigation;
    }
}
