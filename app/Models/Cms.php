<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    public function pages()
    {
        $pages = [
            "mockups",
            "showcase",
            "full access"
        ];
        return $pages;
    }
}
