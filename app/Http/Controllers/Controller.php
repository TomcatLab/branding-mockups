<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $Data = [
        'menu' => [
            [
                "type" => "category",
                "label" => "Main",
            ],
            [
                "type" => "link",
                "label" => "Analytics",
                "icon" => "activity",
                "link" => "admin/analytics"
            ],
            [
                "type" => "link",
                "label" => "Mockups",
                "icon" => "aperture",
                "link" => "admin/products/mockups-list"
            ],
            [
                "type" => "link",
                "label" => "Showcase",
                "icon" => "bookmark",
                "link" => "admin/products/showcase-list"
            ],
            [
                "type" => "category",
                "label" => "Application",
            ],
            [
                "type" => "dropdown",
                "label" => "CMS",
                "icon" => "folder",
                "submenu" => [
                    [
                        "type" => "link",
                        "label" => "Pages",
                        "link" => "admin/cms/pages-list"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "admin/cms/pages-trash"
                    ],
                ]
            ],
            [
                "type" => "dropdown",
                "label" => "User",
                "icon" => "users",
                "submenu" => [
                    [
                        "type" => "link",
                        "label" => "Users",
                        "link" => "admin/users/users-list"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "admin/users/users-trash"
                    ],
                ]
            ],
            [
                "type" => "category",
                "label" => "Products",
            ],
            [
                "type" => "dropdown",
                "label" => "Mockups",
                "icon" => "aperture",
                "submenu" => [
                    [
                        "type" => "link",
                        "label" => "Mockups",
                        "link" => "admin/products/mockups-list"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "admin/products/mockups-trash"
                    ],
                ]
            ],
            [
                "type" => "dropdown",
                "label" => "Showcase",
                "icon" => "grid",
                "submenu" => [
                    [
                        "type" => "link",
                        "label" => "Showcases",
                        "link" => "admin/products/showcase-list"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "admin/products/showcase-trash"
                    ],
                ]
            ],
            [
                "type" => "category",
                "label" => "Settings",
            ],
            [
                "type" => "link",
                "label" => "Configurations",
                "icon" => "settings",
                "link" => "admin/settings"
            ],
            [
                "type" => "link",
                "label" => "Email Templates",
                "icon" => "mail",
                "link" => "admin/emails"
            ]
        ]
    ];

    public function __construct()
    {
        // foreach ($this->data['menu'] as $key => $value) {
        //    if($value['type'] == "link"){
        //     $this->data['menu'][$key]['link'] = URL::to($value['link']);
        //    }
        // }
    }

}
