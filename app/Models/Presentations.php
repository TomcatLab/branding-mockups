<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presentations extends Model
{
    use HasFactory;

    public function is_exist($id)
    {
        //$user = User::where('presentations', '=', Input::get('email'))->first();
        $presentations =  DB::table("presentations")
                            ->where('mockup_id', $id)
                            ->count();
        return $presentations ? true : false;
    }

    public function structure()
    {
        return [
            "Images" => [
                [
                    "Name" => "Single",
                    "Id" => 1,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 2,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ],
                        [
                            "ImgColId" => 2,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 3,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 4,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ],
                        [
                            "ImgColId" => 2,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 5,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 6,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ],
                        [
                            "ImgColId" => 2,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 7,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
                [
                    "Name" => "Image 1",
                    "Id" => 8,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ],
                        [
                            "ImgColId" => 2,
                            "Title" => "Image",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ],
            ],
            "Slider" => [
                [
                    "Name" => "Slider",
                    "Id" => 9,
                    "Cols" => [
                        [
                            "ImgColId" => 1,
                            "Title" => "Slider",
                            "Num" => 1,
                            "Hover" => true
                        ]
                    ],
                ]
            ]
        ];
    }
}
