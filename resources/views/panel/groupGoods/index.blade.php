@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables GroupGoods</h6>
    </div>

    <div class="card-body">
        @if (auth()->user()->rolename == 'admin')
            <a class="btn btn-outline-primary mb-3" href="{{ route('groupgoods.create') }}">New GroupGoods</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($groupGoods as $item)
                    @if ($item->active == 1)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->group_name }}</td>
                        <td><img width="50px" src="{{ url('img/groupgoods',$item->group_image) }}"></td>
                        <td>{{ $item->group_description }}</td>
                        <td>
                            <a href="{{ route('groupgoods.edit', ['groupgood' => $item->id]) }}"><button class="btn btn-primary">Edit</button></a>
                            <a href="{{ route('groupgoods.show', ['groupgood' => $item->id]) }}"><button class="btn btn-primary">Detail</button></a>
                            <form method="POST" action="{{ route('groupgoods.destroy', ['groupgood' => $item->id]) }}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Delete</button>
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
