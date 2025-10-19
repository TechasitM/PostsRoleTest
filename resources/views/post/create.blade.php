@extends('layouts.frontend')

@section('title', 'ยินดีต้อนรับ')

@section('content')

    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">

                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">หัวข้อ</label>
                        <input type="text" name="post_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">รายละเอียด</label>
                        <textarea type="text" class="form-control" name="post_detail" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection

@section('js_before')

@endsection
