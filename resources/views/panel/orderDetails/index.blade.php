@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Information Accounts</h6>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>TotalPrice</th>
                        <th>Order_Id</th>
                        <th>Active</th>
                        <th>Tool</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>TotalPrice</th>
                        <th>Order_Id</th>
                        <th>Active</th>
                        <th>Tool</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rau cai</td>
                        <td></td>
                        <td>3</td>
                        <td>120000</td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href=""><button>Delete</button></a>
                            <a href=""><button>status</button></a>
                        </td>
                    </tr>
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