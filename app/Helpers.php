<?php

if(!function_exists('page_index'))
{
    function page_index(){
        return \Spatie\Valuestore\Valuestore::make(storage_path('content/pages_index.json'))->all()['pages'];
    }
}