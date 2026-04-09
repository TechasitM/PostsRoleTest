@extends('layouts.frontend')

@section('title', 'เรียกใช้งาน API ด้วย Laravel')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ข้อมูลดึงจาก API</h2>
            </div>
        </div>
    </div>
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jsonData as $data)
                            <tr>
                                <th scope="col">{{ $data['id'] }}</th>
                                <th scope="col">{{ $data['title'] }}</th>
                                <th>{{ $data['body'] }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
