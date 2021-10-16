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
        <a href="{{route('products.index')}}" class="border border-primary rounded text-decoration-none">
            DataTables Products</a>
        <span> <i class="fas fa-chevron-right"></i>Update Information Products</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('products.update', ['product' => $data->id]) }}">
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Name Product</label>
            <div class="col-sm-10">
                <input name="product_name" type="text" class="form-control" value="{{ $data->product_name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Symbol Product</label>
            <div class="col-sm-10">
                <input name="product_symbol" type="text" class="form-control" value="{{ $data->product_symbol }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10 d-flex">
                <input name="product_price" type="text" class="form-control" value="{{ $data->product_price }}">
                <div class="input-group-append">
                    <span class="input-group-text">VND</span>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input name="product_image" type="file" class="form-control" value="{{ $data->product_image }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="product_description" type="text" class="form-control"
                    value="{{ $data->product_description }}">{{ $data->product_description }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="product_type_id" class="form-control">
                    @foreach($productTypes as $type)
                    <option value="{{ $type->id }}" @if ($data->product_type_id == $type->id) selected
                        @endif>{{ $type->product_type_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @method('put')
        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
