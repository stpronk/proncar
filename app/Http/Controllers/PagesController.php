<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\PageRequest;
use App\Models\Content;
use App\Models\Pages;
use App\Models\Sections;
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

    public function create()
    {
        return 'W.I.P.';
    }

    public function edit(PageRequest $pageRequest)
    {
        $page = $pageRequest->getPageAttributes();

        return $this->view('pages.editor.edit', [
            'page' => $page
        ]);
    }

    public function show(PageRequest $pageRequest)
    {
        $page = $pageRequest->getPageAttributes();

        return $this->view($page['template']['blade'], [
            'sections' => $page['sections'],
            'index'    => $page['index'],
        ]);
    }

    public function generatePages()
    {
            $page_index = [
            'pages' => [
                'welcome'     => [
                    'name'     => 'Welcome',
                    'title'    => 'Performance',
                    'route'    => [
                        'url'        => '/',
                        'auth'       => false,
                        'controller' => 'PagesController',
                    ],
                    'nav'      => [
                        'hidden' => true,
                        'name'   => 'Home',
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
                                'overlay' => true,
                                'logo' => true,
                                'alt'  => 'proncar_header',
                                'src'  => '/images/Logo_web_transparant.png'
                            ]
                        ],
                        1 => [
                            'blade' => 'feature-icons',
                            'content' => [
                                'items' => [
                                    0 => [
                                        'icon' => 'wrench',
                                        'head' => 'Reperaties',
                                        'body' => 'Voor reparatie en onderhoud bent u aan het juiste adres.'
                                    ],
                                    1 => [
                                        'icon' => 'energy',
                                        'head' => 'Presentatie',
                                        'body' => 'We halen alles uit uw auto!',
                                    ],
                                    2 => [
                                        'icon' => 'chemistry',
                                        'head' => 'Stijl',
                                        'body' => 'Geef je auto een eigen touch en wees uniek.',
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
                                        'head'       => 'Waarmee kunnen wij u helpen?',
                                        'body'       => 'We doen veel aan het verbeteren en repareren van uw auto. Heeft u iets speciaals nodig of wilt u gewoon kijken wat we voor u in petto hebben. Bekijk het hier!',
                                        'route_key'  => 'activities',
                                        'route_name' => 'Activiteiten',
                                    ],
                                    1 => [
                                        'image'      => 'images/bg-showcase-2.jpg',
                                        'head'       => 'We hebben veel gedaan!',
                                        'body'       => 'We hebben alle soorten auto\'s gedaan, willen we zien wat we allemaal hebben gedaan? Of wil je eens rondkijken?',
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
                                'head' => 'Je kunt me vinden op sociale media!',
                                'contact' => [
                                    'route' => 'contact',
                                    'head' => 'Neem contact op!'
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
                    'name'     => 'Over ons',
                    'title'    => 'Over ons',
                    'route'    => [
                        'url'        => '/about',
                        'auth'       => false,
                        'controller' => 'PagesController',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Over ons',
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
                    'name'     => 'Activiteiten',
                    'title'     => 'Activiteiten',
                    'route'    => [
                        'url'        => '/activities',
                        'auth'       => false,
                        'controller' => 'PagesController',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Activiteiten',
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
                    'title'     => 'Portfolio',
                    'route'    => [
                        'url'        => '/portfolio',
                        'auth'       => false,
                        'controller' => 'PagesController',
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
                    'hidden'   => false
                ],

                'contact'     => [
                    'name'     => 'Contact',
                    'title'     => 'Contact',
                    'route'    => [
                        'url'        => '/contact',
                        'auth'       => false,
                        'controller' => 'PagesController',
                    ],
                    'nav'      => [
                        'hidden' => false,
                        'name'   => 'Contact',
                        'class'  => 'btn btn-primary text-white',
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'default',
                    ],
                    'sections' => [
                        0 => [
                            'blade'   => 'contact',
                            'content' => [
                                'action' => 'dashboard.contact',
                                'method' => 'POST'
                            ]
                        ],
                        1 => [
                            'blade' => 'social-media',
                            'content' => [
                                'head' => 'Je kunt me vinden op sociale media!',
                                'contact' => [
                                    'route' => 'contact',
                                    'head' => 'Neem contact op!'
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
                    'hidden'   => false
                ],
                'voorwaarden' => [
                    'name'     => 'Voorwaarden',
                    'title'     => 'Voorwaarden',
                    'route'    => [
                        'url'        => '/voorwaarden',
                        'auth'       => false,
                        'controller' => 'PagesController',
                    ],
                    'template' => [
                        'id'    => 1,
                        'blade' => 'default',
                    ],
                    'nav'      => [
                        'hidden' => true,
                        'name'   => 'Voorwaarden',
                        'class'  => null,
                    ],
                    'sections' => [
                        0 => [
                        'blade'   => 'text',
                        'content' => ['body' => '<h1>HTML Ipsum Presents</h1>

<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

<h2>Header Level 2</h2>

<ol>
   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
   <li>Aliquam tincidunt mauris eu risus.</li>
</ol>

<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>

<h3>Header Level 3</h3>

<ul>
   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
   <li>Aliquam tincidunt mauris eu risus.</li>
</ul>'
                    ]
                        ]],
                    'type'     => 'get',
                    'uuid'     => Str::uuid(),
                    'hidden'   => false
                ],
            ],
        ];

        foreach ($page_index['pages'] as $key => &$values) {
            $this->CreateValueStore( storage_path('content/pages/'), $key, $values['sections'], true);
            $this->CreateValueStore( storage_path('concept/pages/'), $key, $values['sections'], true);
            $sections[$key] = $values['sections'];
            unset($values['sections']);
        }

        $this->UpdateOrCreateValueStore($page_index, storage_path('content/'), 'pages_index');
        $this->UpdateOrCreateValueStore($page_index, storage_path('concept/'), 'pages_index');


        dd(
            'valueStore:', $this->pages->valueToArray()
        );
    }
}
