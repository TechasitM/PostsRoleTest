@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">

                <form action="{{ route('category.update', $category->id) }}" method="post">

                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ชื่อประเภท</label>
                        <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">แก้ไขข้อมูล</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection

@section('js_before')

@endsection
