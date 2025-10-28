@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                @forelse ($category as $cat)
                    <ul>
                        <li>Title : <b>{{ $cat->category_name }}</b> <br />
                            <div class="col">
                                <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-info btn-sm">แก้ไข</a>
                                <a href="{{ route('category.destroy', $cat->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('ยืนยันการลบหรือไม่')">ลบข้อมูล
                                </a>                   
                            </div>
                        </li>
                    </ul>
                @empty
                    <span class="text-danger">ไม่พบข้อมูล</span>
                @endforelse
            </div>
        </div>
    </section>

@endsection

@section('js_before')

@endsection