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
        <span> <i class="fas fa-chevron-right"></i>Add Information Products</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Name Product</label>
            <div class="col-sm-10">
                <input name="product_name" type="text" class="form-control" placeholder="Name product">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Symbol Product</label>
            <div class="col-sm-10">
                <input name="product_symbol" type="text" class="form-control" placeholder="Symbol product">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10 d-flex">
                <input name="product_price" type="text" class="form-control" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">VND</span>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input name="product_image" type="file" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input name="product_description" type="text" class="form-control" placeholder="Description of product">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Product Type</label>
            <div class="col-sm-10">
                <select name="product_type_id" class="form-control">
                    @foreach($productTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->product_type_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
