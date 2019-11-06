<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'selector',
        'uuid',
        'content'
    ];

    public function Sections(){
        return $this->belongsTo(Content::class, 'section_id', 'id');
    }

    public function saveToDatabase($sectionId, $data, $count = null)
    {
        if(isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $this->saveToDatabase($sectionId, $item, $item[]);
            }

            unset($data['items']);
        }


    }
}
