@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('employees.update', $nhanvien->id) }}">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control"  value="{{ $nhanvien->nhanvien_ten }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input name="phone" type="text" class="form-control"  value="{{ $nhanvien->nhanvien_sdt }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input name="address" type="text" class="form-control"   value="{{ $nhanvien->nhanvien_diachi }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Identity Num</label>
        <div class="col-sm-10">
            <input name="identity" type="text" class="form-control"   value="{{ $nhanvien->nhanvien_cmnd }}">
        </div>
    </div>

    @csrf
    @method('put')
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
