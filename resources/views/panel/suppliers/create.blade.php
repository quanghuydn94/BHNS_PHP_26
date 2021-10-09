@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action=" ">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" placeholder="Tivi">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input name="price" type="text" class="form-control" placeholder="place">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input name="description" type="text" class="form-control" placeholder="Contact">
        </div>
    </div>
    {{-- <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div> --}}
    @csrf
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
