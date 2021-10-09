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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User id</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Tools</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User id</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Tools</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->user_id }}</td>
                        @if (auth()->user()->rolename == 'admin')
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $item->id]) }}"><button class="btn btn-primary">Edit</button></a>
                            <a href=" "><button class="btn btn-primary">Details</button></a>

                            <form method="POST" action="{{ route('categories.destroy', ['category' => $item->id]) }}" class="d-inline-block">
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
