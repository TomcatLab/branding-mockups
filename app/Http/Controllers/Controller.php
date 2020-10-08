<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data = [
        'menu' => [
            [
                "type" => "category",
                "label" => "Main",
            ],
            [
                "type" => "link",
                "label" => "Analytics",
                "icon" => "activity",
                "link" => "analytics"
            ],
            [
                "type" => "link",
                "label" => "Mockups",
                "icon" => "aperture",
                "link" => "mockups"
            ],
            [
                "type" => "link",
                "label" => "Showcase",
                "icon" => "bookmark",
                "link" => "showcase"
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
                        "link" => "pages"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "pages/trash"
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
                        "link" => "users"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "users/trash"
                    ],
                ]
            ],
            [
                "type" => "category",
                "label" => "Mockups",
            ],
            [
                "type" => "dropdown",
                "label" => "Mockups",
                "icon" => "aperture",
                "submenu" => [
                    [
                        "type" => "link",
                        "label" => "Mockups",
                        "link" => "mockups"
                    ],
                    [
                        "type" => "link",
                        "label" => "Trash",
                        "link" => "mockups/trash"
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
                "link" => "settings"
            ],
            [
                "type" => "link",
                "label" => "Email Templates",
                "icon" => "mail",
                "link" => "emails"
            ]
        ]
    ];
}
