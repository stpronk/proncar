<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ContentController extends BaseController
{
    public function store(Request $request)
    {
        $path = $request->path.'.'.$request->uuid.'.'.$request->change;

        $content = Content::where('path', $path)->first();

        if(!$content) {
            $content = new Content();
        }

        $content->uuid = $request->uuid;
        $content->page = $request->page;
        $content->path = $path;
        $content->data = $request->data;

        $content->save();

        dd($request->all(), $content);
    }
}
