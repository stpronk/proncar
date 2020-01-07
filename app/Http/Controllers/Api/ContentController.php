<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use App\Http\Controllers\BaseController;
use App\Traits\ValueStorageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ContentController extends BaseController
{
    use ValueStorageTrait;

    /**
     * Store value to the database
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json(['message' => 'Change has been successfully stored', 'page' => $request->page], 200);
    }

    /**
     * Publish the made changes
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function publish(Request $request)
    {
        $items = Content::where('page', $request->page)->get();

        $this->setFolderPath(storage_path('content/pages/'));
        $this->setFileName($request->page);

        $content = $this->getValueStore()->all();

        foreach ($items as $item) {
            Arr::set($content, $item->path, $item->data);
        }

        $this->UpdateValueStore($content);

        Content::destroy($items->pluck('id'));

        return response()->json(['message' => 'Page successfully published', 'page' => $request->page], 200);
    }

    /**
     *
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getValueStoreData (Request $request) {
        $this->setFolderPath(storage_path('content/pages/'));
        $this->setFileName($request->page);

        return response()->json($this->getValueStore()->all(), 200);
    }

    public function storeValueStoreData (Request $request) {
        $this->CreateValueStore(storage_path('content/pages/'), $request->page, json_decode($request->data, true), true);
        return response()->json(['message' => 'ValueStore has been stored'], 200);
    }
}
