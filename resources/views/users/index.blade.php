@extends('layouts.main')

@section('title', 'รายการผู้ใช้')

@section('content')
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">รายการผู้ใช้</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('users.create') }}" class="btn btn-secondary">
                    <i class="bi bi-plus me-1"></i>เพิ่มผู้ใช้
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('alerts.alert')
            <div class="table-responsive">
                <table class="table table-striped table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">ชื่อ - นามสกุล</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">สร้าง</th>
                            <th scope="col">อัปเดต</th>
                            <th scope="col" class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-end">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->locale('th')->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->locale('th')->diffForHumans() }}</td>
                                <td class="p-0 text-center align-middle">
                                    <div class="btn-group">
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="btn btn-outline-secondary">
                                            <i class="bi bi-eye"></i>
                                            <span class="visually-hidden">ดู</span>
                                        </a>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                            <span class="visually-hidden">แก้ไข</span>
                                        </a>
                                        <a href="{{ route('users.destroy', ['user' => $user->id]) }}"
                                            class="btn btn-outline-danger"
                                            onclick="event.preventDefault();
                                                if (confirm('ยืนยันการลบ') === true) document.getElementById('delete-item-{{ $user->id }}-form').submit();">
                                            <i class="bi bi-trash"></i>
                                            <span class="visually-hidden">ลบ</span>
                                        </a>
                                    </div>
                                    {{ html()->form('DELETE')->route('users.destroy', ['user' => $user->id])->id("delete-item-".$user->id."-form")->open() }}
                                    {{ html()->form()->close() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
