@extends('layouts.main')

@section('title', $article->title)

@section('content')
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">{{ $article->title }}</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="btn btnsecondary">
                    <i class="bi bi-pencil me-1"></i>แก้ไข
                </a>
            </div>
        </div>
        <div class="card-body">
            {{ $article->body }}
        </div>
        <div class="card-footer">
            <div class="text-mute">{{ $article->published_at }}</div>
        </div>
    </div>
@endsection
