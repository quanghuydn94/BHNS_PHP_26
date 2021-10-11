@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('employees.update', $data->id) }}">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control"  value="{{ $data->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input name="phone" type="text" class="form-control"  value="{{ $data->phone }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input name="address" type="text" class="form-control"   value="{{ $data->address }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
            <input name="avatar" type="text" class="form-control"   value="{{ $data->avatar}}">
        </div>
    </div>

    @csrf
    @method('put')
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
