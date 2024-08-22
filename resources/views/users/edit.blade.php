@extends('layouts.main')

@section('title', 'แก้ไขผู้ใช้งาน')

@section('content')
    {{ html()->modelForm($user, 'PUT')->route('users.update', ['user' => $user->id])->open() }}
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">แก้ไขบทความ</h4>
        </div>
        <div class="card-body">
            @include('alerts.alert')
            @include('users._form', ['isEdit' => true])
        </div>
        <div class="card-footer text-end">
            {{ html()->button('<i class="bi bi-floppy me-1"></i>อัปเดต', 'submit')->class('btn btn-secondary') }}
        </div>
    </div>
    {{ html()->closeModelForm() }}
@endsection
