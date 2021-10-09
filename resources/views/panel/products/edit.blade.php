@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('products.update', ['product' => $data->id]) }}">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" placeholder="Tivi" value="{{ $data->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input name="price" type="text" class="form-control" placeholder="0" value="{{ $data->price }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input name="image" type="text" class="form-control" placeholder="https://laravel.com/img/logotype.min.svg" value="{{ $data->image }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input name="description" type="text" class="form-control" placeholder="Description of product" value="{{ $data->description }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if ($data->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @method('put')
    @csrf
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
