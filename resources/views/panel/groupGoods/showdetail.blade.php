@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details GroupGoods</h6>
    </div>

    <div class="card-body  w-50 mx-auto">
        <div class="card-header">
            Featured
        </div>
        <ul class="list-group list-group-flush  ">
            <li class="list-group-item">
                <h5>Id</h5>
                <span>{{ $groupgood->id }}</span>
            </li>
            <li class="list-group-item">
                <h5>Name Groupgoods</h5>
                <span>{{ $groupgood->group_name }}</span>
            </li>
            <li class="list-group-item">
                <h5>Image</h5>
                <span class="border rounded"><img src="{{url('img/groupgoods', $groupgood->group_image) }}" width="150px" alt=""> </span>
            </li>
            <li class="list-group-item">
                <h5>Description</h5>
                <span>{{ $groupgood->group_description }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection
{{-- @section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection --}}
