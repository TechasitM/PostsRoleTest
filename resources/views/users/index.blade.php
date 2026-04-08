@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>จัดการสมาชิก</h2>
            </div>
            <div class="pull-right"><a class="btn btn-success" href="{{ route('users.create') }}"> สร้างสมาชิกใหม่ </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ลําดับ</th>
            <th>ชื่อ</th>
            <th>อีเมล</th>
            <th>บทบาทหน้าที่</th>
            <th width="280px">จัดการ</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">ดู</a>
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">แก้ไข</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
