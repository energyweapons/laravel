@extends('layouts.main')

@section('title', 'เพิ่มผู้ใช้')

@section('content')
    {{ html()->form('POST')->route('users.store')->open() }}
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">เพิ่มผู้ใช้</h4>
        </div>
        <div class="card-body">
            @include('alerts.alert')
            @include('users._form', ['isEdit' => false])
        </div>
        <div class="card-footer text-end">
            {{ html()->button('<i class="bi bi-floppy me-1"></i>บันทึก', 'submit')->class('btn btn-secondary') }}
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
