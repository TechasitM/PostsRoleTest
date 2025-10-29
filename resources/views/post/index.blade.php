@extends('layouts.frontend')
@section('title', 'หน้าแรกบทความ')
@section('content')
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
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
                                    <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ
                                    </a>
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