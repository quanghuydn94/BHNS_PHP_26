@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
        @if (auth()->user()->rolename == 'admin')
            <a class="btn btn-outline-primary mb-3" href="{{ route('product-type.create') }}">New Product Types</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Tools</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Tools</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_type_name }}</td>
                        <td>{{ $item->product_type_description }}</td>
                        @if (auth()->user()->rolename == 'admin')
                        <td>
                            <a href="{{ route('product-type.edit', $item->id) }}"><button class="btn btn-primary">Edit</button></a>
                            <a href=" {{route('product-type.show', $item->id)}}"><button class="btn btn-primary">Details</button></a>

                            <form method="POST" action="{{ route('product-type.destroy',  $item->id) }}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
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
