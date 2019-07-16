<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'templates';

    protected $fillable = [];

    public function Page(){
        return $this->belongsTo(Pages::class, 'page_id', 'id');
    }

    public function Content(){
        return $this->hasOne(Content::class, 'section_id', 'id');
    }
}
