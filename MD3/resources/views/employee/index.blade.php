@extends('employee.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11 text-center">
            <h2>Danh sách nhân viên</h2>
        </div>
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('employee.create') }}">Thêm mới</a>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center">Mã nhân viên</th>
            <th class="text-center">Nhóm nhân viên</th>
            <th class="text-center">Họ tên</th>
            <th class="text-center">Giới tính</th>
            <th class="text-center">Số điện thoại</th>
            <th class="text-center" width="280px">Chức năng</th>
        </tr>

        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->classification }}</td>
                <td>{{ $employee->fullname }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->phone_number }}</td>
                <td>
                    <form class="text-center" action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Chỉnh sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
