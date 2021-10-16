@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
       <a href="{{route('employees.index')}}" class="border border-primary rounded text-decoration-none"> DataTables Employees  </a>
        <span> <i class="fas fa-chevron-right"></i>Add Information Employees</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input name="phone" type="text" class="form-control" placeholder="+84123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" class="form-control" placeholder="example@gmail.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" value="123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password Confirm</label>
            <div class="col-sm-10">
                <input name="password_confirmation" type="password" class="form-control" value="123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10">
                <input name="avatar" type="file" class="form-control" placeholder="Choosen file">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input name="address" type="text" class="form-control" placeholder="123 Nguyen Van B">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Identity Num</label>
            <div class="col-sm-10">
                <input name="identity" type="text" class="form-control" placeholder="identity">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Role Name</label>
            <div class="col-sm-10">
                <select name="rolename" type="text" class="form-control" placeholder="identity">
                    <option value="employee" selected>employee</option>
                    <option value="admin">admin</option>
                </select>
            </div>
        </div>


        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
