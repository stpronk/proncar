<?php

use Illuminate\Support\Facades\Auth;

if(\Spatie\Valuestore\Valuestore::class) {
    if ( ! function_exists('page_index')) {
        function page_index ($index = null)
        {
            if ($index) {
                return \Spatie\Valuestore\Valuestore::make(storage_path('content/pages_index.json'))
                           ->all()['pages'][$index];
            }

            return \Spatie\Valuestore\Valuestore::make(storage_path('concept/pages_index.json'))->all()['pages'];
        }
    }

    if ( ! function_exists('page_sections')) {
        function page_sections ($index)
        {
            return \Spatie\Valuestore\Valuestore::make(storage_path('content/pages/' . $index . '.json'))->all();
        }
    }
}