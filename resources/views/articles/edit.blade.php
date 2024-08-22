@extends('layouts.main')

@section('title', 'แก้ไข:'.$article->title)

@section('content')
    {{ html()->modelForm($article, 'PUT')->route('articles.update', ['article' => $article->id])->open() }}
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">แก้ไขบทความ</h4>
        </div>
        <div class="card-body">
            @include('alerts.alert')
            @include('articles._form')
        </div>
        <div class="card-footer text-end">
            {{ html()->button('<i class="bi bi-floppy me-1"></i>อัปเดต', 'submit')->class('btn btn-secondary') }}
        </div>
    </div>
    {{ html()->closeModelForm() }}
@endsection
