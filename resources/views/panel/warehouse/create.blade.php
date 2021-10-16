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
        <a href="{{route('warehouses.index')}}" class="border border-primary rounded text-decoration-none">
            DataTables Consignments</a>
        <span> <i class="fas fa-chevron-right"></i>Add Information Consignment</span>
    </p>
</div>
<div class="card-body  justify-content-center">
    <form method="POST" action="{{ route('warehouses.store') }}" class="w-50">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ký hiệu lô hàng</label>
            <div class="col-sm-10">
                <input name="consignment_symbol" type="text" class="form-control" placeholder="Ký hiệu lô hàng">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ten lô hàng</label>
            <div class="col-sm-10">
                <input name="consignment_name" type="text" class="form-control" placeholder="Ký hiệu lô hàng">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Hạn sử dụng</label>
            <div class="col-sm-10">
                <input name="consignment_expiry" type="date" class="form-control" placeholder="Hạn sử dụng">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Giá mua vào</label>
            <div class="col-sm-10 input-group ">
                <input name="consignment_purchase_price" type="text" class="form-control"
                    placeholder="Giá mua vào  ">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Giá bán ra</label>
            <div class="col-sm-10">
                <input name="consignment_sale_price" type="number" class="form-control" placeholder="Giá bán ra  ">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng nhập</label>
            <div class="col-sm-10">
                <input name="consignment_quantity" type="number" class="form-control" placeholder="Số lượng nhập">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng đã bán</label>
            <div class="col-sm-10">
                <input name="consignment_saled" type="number" class="form-control" placeholder="Số lượng đã bán">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng đổi trả</label>
            <div class="col-sm-10">
                <input name="consignment_return" type="number" class="form-control" placeholder="Số lượng đổi trả">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng hiện tại</label>
            <div class="col-sm-10">
                <input name="consignment_currently" type="number" class="form-control" placeholder="Số lượng hiện tại">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-10">
                <select name="product_id" class="form-control">
                    <option value="">---</option>
                    @foreach($products as $pro)
                    <option value="{{ $pro->id }}">{{ $pro->product_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nhà cung cấp</label>
            <div class="col-sm-10">
                <select name="supplier_id" class="form-control">
                    <option value="">---</option>
                    @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}">{{ $sup->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
