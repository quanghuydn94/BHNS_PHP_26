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
    <div class="p-2">
        <a href="{{ route('employees.create') }}"><button class="btn btn-primary">Thêm Nhân Viên</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Identity Num</th>
                        <th>Address</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Identity Num</th>
                        <th>Address</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($nhanvien as $em)
                    @if ($em->active == 1)

                    <tr>
                        <td>{{ $em->id }}</td>
                        <td>{{ $em->nhanvien_ten }}</td>
                        <td>{{ $em->nhanvien_sdt }}</td>
                        <td>{{ $em->nhanvien_cmnd }}</td>
                        <td>{{ $em->nhanvien_diachi }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $em->id) }}"><button
                                    class="btn btn-primary">Edit</button></a>
                            <a href="{{route('employees.show',$em->id)}}"><button
                                    class="btn btn-primary">Details</button></a>
                            <form method="POST" action="{{ route('employees.destroy', ['employee' => $em->id]) }}"
                                class="d-inline-block">
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
