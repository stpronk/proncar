<?php

namespace App\Models;

use App\Traits\ValueStorageTrait;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use ValueStorageTrait;

    protected $table = 'pages';

    protected $fillable = [
        'selector',
        'name',
        'title',
        'route_url',
        'route_auth',
        'route_controller',
        'nav_hidden',
        'nav_name',
        'nav_class',
        'template_id',
        'template_blade',
        'type',
        'uuid',
        'hidden'
    ];

    public function Sections(){
        return $this->hasMany(Sections::class, 'page_id', 'id');
    }

    public function Template(){
        return $this->belongsTo(Templates::class, 'template_id', 'id');
    }

    public function formatFromDatabase(){
        return [
            $this->selector => [
                'name'     => $this->name,
                'title'    => $this->title,
                'type'     => $this->type,
                'uuid'     => $this->uuid,
                'hidden'   => $this->hidden,
                'route'    => [
                    'url'        => $this->route_url,
                    'auth'       => $this->route_auth,
                    'controller' => $this->route_controller,
                ],
                'nav'      => [
                    'hidden' => $this->nav_hidden,
                    'name'   => $this->nav_name,
                    'class'  => $this->nav_class,
                ],
                'template' => [
                    'id'    => $this->template_id,
                    'blade' => $this->template_blade,
                ],
            ]
        ];
    }
    
    public function formatForDatabase($page, $data)
    {
        $this->selector         = $page;
        $this->name             = $data['name'];
        $this->title            = $data['title'];
        $this->route_url        = $data['route']['url'];
        $this->route_auth       = $data['route']['auth'];
        $this->route_controller = $data['route']['controller'];
        $this->nav_hidden       = $data['nav']['hidden'];
        $this->nav_name         = $data['nav']['name'];
        $this->nav_class        = $data['nav']['class'];
        $this->template_id      = $data['template']['id'];
        $this->template_blade   = $data['template']['blade'];
        $this->type             = $data['type'];
        $this->uuid             = $data['uuid'];
        $this->hidden           = $data['hidden'];

        return $this;
    }
}

