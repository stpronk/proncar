<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $table = 'templates';

    protected $fillable = [];

    public function Pages(){
        return $this->hasMany(Pages::class, 'template_id', 'id');
    }

}
