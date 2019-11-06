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
}
