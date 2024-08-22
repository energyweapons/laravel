<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()
            ->select('id', 'title', 'body', 'published_at', 'created_at', 'updated_at')
            ->paginate(10);

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        // Article::query()->create($request->all());

        $request->user()->articles()->create($request->all());

        session()->flash('success_message', 'เพิ่มบทความสำเสร็จ');

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::query()->findOrFail($id);

        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::query()->findOrFail($id);

        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::query()->findOrFail($id);

        $article->update($request->all());

        session()->flash('success_message', 'แก้ไขบทความสำเสร็จ');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::query()->findOrFail($id);

        $article->delete();

        session()->flash('success_message', 'ลบความสำเสร็จ');

        return redirect()->route('articles.index');
    }
}
