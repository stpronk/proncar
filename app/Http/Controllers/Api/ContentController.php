<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends BaseController
{
    public function store(Request $request)
    {
        $uuid = $request->uuid ?? Str::uuid();

        $content = Content::firstOrNew([
            'selector' => $request->selector,
            'uuid' => $uuid,
        ]);

        $content->content = $request->data;

        if($request->image) {
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            Storage::disk('public')->put($uuid . '.jpeg', base64_decode($image));
        }

        $content->save();

        return Response()->json(['message' => 'success'], 200);
    }
}
