<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\PageRequest;
use App\Traits\ValueStorageTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class PagesController extends BaseController
{

    use ValueStorageTrait;

    public $pages = [];

    public $page_index = [];

    public function __construct()
    {
        $this->setFolderPath(storage_path('content/'));
        $this->setFileName('pages_index');

        $this->pages      = $this->setValueStore();
        $this->page_index = page_index();
    }

    public function index()
    {
        return $this->view('pages.index');
    }

    public function edit()
    {
        return $this->view('pages.edit');
    }

    public function create()
    {
        return 'W.I.P.';
    }


    public function GeneratePage(PageRequest $pageRequest)
    {
        $page = $pageRequest->getPageAttributes();

        return $this->view($page['template']['blade'], [
            'sections' => $page['sections'],
        ]);
    }

    public function generatePages()
    {

        $this->UpdateOrCreateValueStore([
            'pages' => [
                'welcome'     => [
                    'name'     => 'Welcome',
                    'route'    => [
                        'url'        => '/',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'nav'      => [
                        'hidden' => true,
                        'name'   => 'Welcome',
                        'class'  => null,
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'default',
                    ],
                    'sections' => [
                        0 => [
                            'blade' => 'header',
                            'content' => [
                                'logo'    => true,
                                'overlay' => true,
                                'alt'     => 'proncar_header',
                                'src'     => '/images/Logo_web_transparant.png'
                            ]
                        ],
                        1 => [
                            'blade' => 'feature-icons',
                            'content' => [
                                'items' => [
                                    0 => [
                                        'icon' => 'wrench',
                                        'head' => 'Repairs',
                                        'body' => 'For repair and maintenance you are at the right address.'
                                    ],
                                    1 => [
                                        'icon' => 'energy',
                                        'head' => 'Performance',
                                        'body' => 'We will get everything out of your car that it has!',
                                    ],
                                    2 => [
                                        'icon' => 'chemistry',
                                        'head' => 'Style',
                                        'body' => 'Give your own touch to your car and be unique.',
                                    ]
                                ],
                                'item_count' => 3,
                            ]
                        ],
                        2 => [
                            'blade' => 'showcase',
                            'content' => [
                                'items' => [
                                    0 => [
                                        'image'      => 'images/bg-showcase-1.jpg',
                                        'head'       => 'With what can we help you?',
                                        'body'       => 'We do a lot in terms of improving and repairing your car. Do you need something specifik or just want to look what we have in store for you. See it here!',
                                        'route_key'  => 'activities',
                                        'route_name' => 'Activities',
                                    ],
                                    1 => [
                                        'image'      => 'images/bg-showcase-2.jpg',
                                        'head'       => 'We did a lot!',
                                        'body'       => 'We did all type of cars, want to see what we all did? Or do you want to take a look around?',
                                        'route_key'  => 'portfolio',
                                        'route_name' => 'Portfolio',
                                    ],
                                ],
                                'item_count' => 2,
                            ]
                        ],
                        3 => [
                            'blade' => 'social-media',
                            'content' => [
                                'head' => 'You can find me on social media!',
                                'contact' => [
                                    'route' => 'contact',
                                    'head' => 'Contact me!'
                                ],
                                'items' => [
                                    0 => [
                                        'icon' => 'social-facebook',
                                        'href' => 'https://www.facebook.com/Proncar-468839900135515/'
                                    ],
                                    1 => [
                                        'icon' => 'social-instagram',
                                        'href' => 'https://www.instagram.com/proncar_zoetermeer/',
                                    ],
                                ],
                                'item_count' => 2,
                            ]
                        ],
                    ],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                    'hidden'   => true,
                ],
                'about'       => [
                    'name'     => 'About',
                    'route'    => [
                        'url'        => '/about',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'About',
                        'class'  => null,
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'about',
                    ],
                    'sections' => [],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                    'hidden'   => false,
                ],
                'activities'  => [
                    'name'     => 'Activities',
                    'route'    => [
                        'url'        => '/activities',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Activities',
                        'class'  => null,
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'activities',
                    ],
                    'sections' => [],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                    'hidden'   => false,
                ],
                'portfolio'   => [
                    'name'     => 'Portfolio',
                    'route'    => [
                        'url'        => '/portfolio',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Portfolio',
                        'class'  => null,
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'portfolio',
                    ],
                    'sections' => [],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                ],
                'contact'     => [
                    'name'     => 'Contact',
                    'route'    => [
                        'url'        => '/contact',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Contact',
                        'class'  => 'btn btn-primary',
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'contact',
                    ],
                    'sections' => [],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                ],
                'voorwaarden' => [
                    'name'     => 'Voorwaarden',
                    'route'    => [
                        'url'        => '/voorwaarden',
                        'auth'       => false,
                        'controller' => 'PagesController@GeneratePage',
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'voorwaarden',
                    ],
                    'nav'      => [
                        'hidden' => true,
                        'name'   => 'Voorwaarden',
                        'class'  => null,
                    ],
                    'sections' => [],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                ],
            ],
        ], storage_path('content/'), 'pages_index');

        dd($this->pages->toArray());
    }
}
