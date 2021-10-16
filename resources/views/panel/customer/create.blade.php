@extends('layouts.panel')
@section('styles')
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
    <button type="button" class="close" data-miss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
       <a href="{{route('customers.index')}}" class="border border-primary rounded text-decoration-none"> DataTables Customers  </a>
        <span> <i class="fas fa-chevron-right"></i>Add Information Customer</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="customer_name" type="text" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input name="customer_phone" type="text" class="form-control" placeholder="+84123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="customer_email" type="text" class="form-control" placeholder="example@gmail.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input name="customer_address" type="text" class="form-control"
                    placeholder="Block A, Nguyen Van Cu, Da Nang">
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
{{-- @section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection --}}
