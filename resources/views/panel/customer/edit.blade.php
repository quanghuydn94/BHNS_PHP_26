@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
    <button type="button" class="close" data-miss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
       <a href="{{route('customers.index')}}" class="border border-primary rounded text-decoration-none"> DataTables Customers  </a>
        <span> <i class="fas fa-chevron-right"></i>Update Information Customer</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('customers.update',$customer->id) }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="customer_name" type="text" class="form-control" value="{{$customer->customer_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input name="customer_phone" type="text" class="form-control" value="{{$customer->customer_phone}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="customer_email" type="text" class="form-control" value="{{$customer->customer_email}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input name="customer_address" type="text" class="form-control"
                    value="{{$customer->customer_address}} ">
            </div>
        </div>
        @csrf
        @method('put')
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
