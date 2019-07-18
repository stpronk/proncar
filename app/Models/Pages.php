<?php

namespace App\Models;

use App\Traits\ValueStorageTrait;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use ValueStorageTrait;

    protected $table = 'pages';

    protected $fillable = [];

    public function Sections(){
        return $this->hasMany(Sections::class, 'page_id', 'id');
    }

    public function Template(){
        return $this->belongsTo(Templates::class, 'template_id', 'id');
    }
}

