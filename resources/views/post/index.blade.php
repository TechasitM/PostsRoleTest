@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $PostName }}</h1>
                <p class="lead text-muted">{{ $CountPost }}</p>
            </div>
        </div>
    </section>
    
@endsection

@section('js_before')

@endsection
