@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>จัดการบทบาทหน้าที่</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> สร้างบทบาทใหม่ </a>
                @endcan
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
            <th>รายการ</th>
            <th width="280px">จัดการ</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">ดู</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">แก้ไข</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->links() !!}
@endsection
