@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('users.store') }}">
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
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input name="address" type="text" class="form-control" placeholder="123 Nguyen Van B">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input name="email" type="text" class="form-control" placeholder="email@example.com">
        </div>
    </div>

    @csrf
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
