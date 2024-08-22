@extends('layouts.main')

@section('title', 'เพิ่มบทความ')

@section('content')
    {{ html()->form('POST')->route('articles.store')->open() }}
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">เขียนบทความใหม่</h4>
        </div>
        <div class="card-body">
            @include('alerts.alert')
            @include('articles._form', ['publishedAt' => now()])
        </div>
        <div class="card-footer text-end">
            {{ html()->button('<i class="bi bi-floppy me-1"></i>บันทึก', 'submit')->class('btn btn-secondary') }}
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
