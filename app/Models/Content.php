<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [];

    public function Sections(){
        return $this->belongsTo(Content::class, 'section_id', 'id');
    }
}
