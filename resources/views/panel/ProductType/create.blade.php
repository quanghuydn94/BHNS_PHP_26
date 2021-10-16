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
        <a href="{{route('product-type.index')}}" class="border border-primary rounded text-decoration-none"> DataTables
            Product Types </a>
        <span> <i class="fas fa-chevron-right"></i>Add Information Product Type</span>
    </p>
</div>
<div class="card-body">
    <form method="post" action="{{ route('product-type.store') }}">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="product_type_name" type="text" class="form-control" placeholder="Product-type name">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="product_type_description" type="text" class="form-control"
                    placeholder="Description"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Group Goods Name</label>
            <div class="col-sm-10">
                <select name="group_goods_id" type="text" class="form-control" placeholder="Group goods">
                    @foreach ($groupGoods as $name )
                    <option value="{{$name->id}}">{{$name->group_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
