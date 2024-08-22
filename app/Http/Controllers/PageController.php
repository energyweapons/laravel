<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->published()
            ->with([
                'user:id,name'
            ])
            ->paginate(10);

        return view('pages.index', [
            'articles' => $articles,
        ]);
    }

    public function news(string $id)
    {
        $article = Article::query()->findOrFail($id);

        return view('pages.news', [
            'article' => $article,
        ]);
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
