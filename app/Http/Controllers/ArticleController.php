<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return 'This is the article page from controller';
    }

    public function show(string $id)
    {
        return 'This is the article page for id: ' . $id;
    }
}
