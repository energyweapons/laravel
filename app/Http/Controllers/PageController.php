<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function about()
    {
        $skills = ['HTML', 'Laravel', 'Bootstrap', 'PHP', 'MySQL'];

        return view('pages.about')
            ->with('first', 'Adam')
            ->withLast('Smith')
            ->withSkills($skills);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
