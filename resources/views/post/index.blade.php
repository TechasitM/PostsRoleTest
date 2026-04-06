@extends('layouts.frontend')
@section('title', 'หน้าแรกบทความ')
@section('content')
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <br />
                
                {{-- ส่วนของปุ่มด้านบน --}}
                <div class="float-end">
                    @auth
                        @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                            @if (request()->has('trashed'))
                                <a href="{{ route('posts.index') }}" class="btn btn-info">ดูบทความทั้งหมด</a>
                                {{-- เฉพาะ Role 1 (Admin) เท่านั้นที่เห็นปุ่มกู้คืนทั้งหมด --}}
                                @if (Auth::user()->role === 1)
                                    <a href="{{ route('posts.restoreAll') }}" class="btn btn-success">กู้คืนทั้งหมด</a>
                                @endif
                            @else
                                <a href="{{ route('create', ['trashed' => 'post']) }}" class="btn btn-danger">เพิ่มบทความใหม่</a>
                                <a href="{{ route('posts.index', ['trashed' => 'post']) }}" class="btn btn-primary">บทความที่ถูกลบ</a>
                            @endif
                        @endif
                    @endauth
                </div>

                {{-- ส่วนของตารางแสดงข้อมูล --}}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลําดับ</th>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->post_title }}</td>
                                <td style="width: 50%">{{ $post->post_detail }}</td>
                                <td>
                                    <a href="{{ route('show', $post->id) }}" class="btn btn-success btn-sm">ดู</a>
                                    
                                    @auth
                                        {{-- สิทธิ์สำหรับ Role 1 และ Role 2 ในการจัดการแถวข้อมูล --}}
                                        @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                            <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">แก้ไข</a> |
                                            
                                            @if (request()->has('trashed'))
                                                {{-- เฉพาะ Role 1 ที่กู้คืนรายอันได้ --}}
                                                @if (Auth::user()->role === 1)
                                                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-success btn-sm">กู้คืน</a>
                                                @endif
                                            @else
                                                <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                                   onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                            @endif
                                        @endif
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination Links --}}
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection