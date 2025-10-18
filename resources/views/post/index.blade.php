@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                @forelse ($post as $post)
                    <ul>
                        <li>Title : <b>{{ $post->post_title }}</b> <br />
                            Detail : {{ $post->post_detail }}
                            <hr />
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
