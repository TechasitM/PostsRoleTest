@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
           
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        หัวข้อ : {{ $posts->post_title}}
                        <hr />
                        {{ $posts->post_detail }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js_before')

@endsection
