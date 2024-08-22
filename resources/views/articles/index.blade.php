@extends('layouts.main')

@section('title', 'รายการบทความ')

@section('content')
    <div class="card mt-5">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">รายการบทความ</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('articles.create') }}" class="btn btn-secondary">
                    <i class="bi bi-plus me-1"></i>เพิ่มบทความ
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
                            <th scope="col">เรื่อง</th>
                            <th scope="col">เผยแพร่</th>
                            <th scope="col">สร้าง</th>
                            <th scope="col">อัปเดต</th>
                            <th scope="col" class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td class="text-end">{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->published_at }}</td>
                                <td>{{ $article->created_at->locale('th')->translatedFormat('d M y') }}</td>
                                <td>{{ $article->updated_at->locale('th')->diffForHumans() }}</td>
                                <td class="p-0 text-center align-middle">
                                    <div class="btn-group">
                                        <a href="{{ route('articles.show', ['article' => $article->id]) }}"
                                            class="btn btn-outline-secondary">
                                            <i class="bi bi-eye"></i>
                                            <span class="visually-hidden">ดู</span>
                                        </a>
                                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                                            class="btn btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                            <span class="visually-hidden">แก้ไข</span>
                                        </a>
                                        <a href="{{ route('articles.destroy', ['article' => $article->id]) }}"
                                            class="btn btn-outline-danger"
                                            onclick="event.preventDefault();
                                                if (confirm('ยืนยันการลบ') === true) document.getElementById('delete-item-{{ $article->id }}-form').submit();">
                                            <i class="bi bi-trash"></i>
                                            <span class="visually-hidden">ลบ</span>
                                        </a>
                                    </div>
                                    {{ html()->form('DELETE')->route('articles.destroy', ['article' => $article->id])->id("delete-item-".$article->id."-form")->open() }}
                                    {{ html()->form()->close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
