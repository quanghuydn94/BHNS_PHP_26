@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('users.update', ['user' => $data->id]) }}">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" placeholder="Nguyen Van A" value="{{ $data->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input name="phone" type="text" class="form-control" placeholder="+84123456789" value="{{ $data->phone }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input name="address" type="text" class="form-control" placeholder="123 Nguyen Van B" value="{{ $data->address }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input name="email" type="text" class="form-control" placeholder="email@example.com" value="{{ $data->email }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
            <input name="avatar" type="text" class="form-control" placeholder="https://laravel.com/img/logomark.min.svg" value="{{ $data->avatar }}">
        </div>
    </div>
    @csrf
    @method('put')
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
