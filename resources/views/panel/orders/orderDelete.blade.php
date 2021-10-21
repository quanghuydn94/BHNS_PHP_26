@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('order.index')}}" class="border border-primary rounded text-decoration-none">
                DataTables Orders</a>
            <span> <i class="fas fa-chevron-right"></i> Information Orders Deleted</span>
        </p>

    </div>
    @if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{session()->get('success')}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    @if ($item->active == 0 && $item->order_customer_phone !== null)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order_customer_name }}</td>
                        <td>{{ $item->order_customer_address }}</td>
                        <td>{{ $item->order_customer_phone }}</td>
                        <td>
                            <form method="POST" action="{{ route('order.getBack', ['id' => $item->id]) }}"
                                class="d-inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-primary">Active</button>
                            </form>

                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
