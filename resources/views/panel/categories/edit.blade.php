@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('categories.update', ['category' => $data->id]) }}">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" placeholder="Nguyen Van A" value="{{ $data->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea name="description" type="text" class="form-control" placeholder="Description">{{ $data->description }}</textarea>
        </div>
    </div>
    @csrf
    @method('put')
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
