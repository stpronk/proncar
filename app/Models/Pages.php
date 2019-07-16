<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable = [];

    function Sections(){
        return $this->hasMany(Sections::class, 'page_id', 'id');
    }

    function Template(){
        return $this->belongsTo(Templates::class, 'template_id', 'id');
    }
}

