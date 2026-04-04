@extends('layouts.frontend')
@section('title', 'หน้าแรกบทความ')
@section('content')
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <br />
                <div class="float-end">
                    @if (request()->has('trashed'))
                        <a href="{{ route('posts.index') }}" class="btn btn-info">ดูบทความทั้งหมด</a>
                        <a href="{{ route('posts.restoreAll') }}" class="btn btn-success">กู้คืนทั้งหมด</a>
                    @else
                        <a href="{{ route('posts.index', ['trashed' => 'post']) }}" class="btn btn-primary">บทความที่ถูกลบ</a>
                    @endif
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลําดับ</th>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <th scope="col">{{ $post->id }}</th>
                                <td scope="col">{{ $post->post_title }}</td>
                                <td scope="col" style="width: 50%">{{ $post->post_detail }}</td>
                                <td scope="col">
                                    <a href="{{ route('show', $post->id) }}" class="btn btn-success btn-sm">ดู</a>|
                                    <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">แก้ไข</a>|
                                    @if (request()->has('trashed'))
                                        <a href="{{ route('posts.restore', $post->id) }}"
                                            class="btn btn-success btn-sm">กู้คืน</a>
                                    @else
                                        <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
