@extends('employee.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Thêm mới nhân viên</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('employee') }}"> Quay lại</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Mã nhân viên</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id">
        </div>
        <div class="form-group">
            <label for="classification">Chọn nhóm nhân viên</label>
            <select class="form-control" name="classification" id="classification">
                <option value="Quản trị hệ thống">Quản trị hệ thống</option>
                <option value="Quản lý nhân sự">Quản lý nhân sự</option>
                <option value="Lễ tân">Lễ tân</option>
                <option value="Quản lý phòng">Quản lý phòng</option>
                <option value="Quản lý dịch vụ">Quản lý dịch vụ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fullname">Họ tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
        </div>
        <div class="form-group">
            <label for="fullname">Ngày sinh</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
        </div>
        <div class="form-group">
            <label for="gender">Giới tính</label>
            <input type="radio" id="gender" name="gender" value="Nam"> Nam
            <input type="radio" id="gender" name="gender" value="Nữ"> Nữ
        </div>
        <div class="form-group">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
        <div class="form-group">
            <label for="id_card">Số CMND</label>
            <input type="text" class="form-control" id="id_card" name="id_card">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <button type="submit" class="btn btn-default">Thêm</button>
    </form>
@endsection
