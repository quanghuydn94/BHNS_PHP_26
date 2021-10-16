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
        <span> <i class="fas fa-chevron-right"></i>Update Information Employees</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" value="{{ $employee->employee_name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input name="phone" type="text" class="form-control" value="{{ $employee->employee_phone }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input name="address" type="text" class="form-control" value="{{ $employee->employee_address }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Identity Num</label>
            <div class="col-sm-10">
                <input name="identity" type="text" class="form-control" value="{{ $employee->employee_identity }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10">
                <input name="avatar" type="file" class="form-control">
            </div>
        </div>

        @csrf
        @method('put')
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
