@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('product-type.update',  $productType->id) }}">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="product_type_name" type="text" class="form-control" value="{{ $productType->product_type_name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea name="product_type_description" type="text" class="form-control" value="{{ $productType->product_type_description }}">{{ $productType->product_type_description }}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Group Goods Name</label>
        <div class="col-sm-10">
            <select name="group_goods_id" type="text" class="form-control" >
                <option value="{{$group_goods_id->id}}" selected>{{$group_goods_id->group_name}}</option>
                @foreach ($groupGoods as $name )
                <option value="{{$name->id}}">{{$name->group_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @csrf
    @method('put')
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
