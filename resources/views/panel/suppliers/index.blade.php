@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách nhà cung cấp</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->rolename == 'admin')
        <a class="btn btn-outline-primary mb-3" href="{{route('suppliers.create')}} ">Thêm nhà cung cấp</a>
        @endif
        <div class="table-responsive ">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($suppliers as $item)
                    @if ($item->active == 1)

                    <tr >
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->supplier_name }}</td>
                        <td >{{ $item->supplier_address }}</td>
                        <td>{{ $item->supplier_phone }}</td>
                        @if (auth()->user()->rolename == 'admin')
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('suppliers.edit', $item->id) }}"><button
                                    class="badge badge-primary">Sửa</button></a>
                            <a href="{{route('suppliers.show',$item->id)}} "><button
                                class="badge badge-primary">Chi tiết</button></a>

                            @if (auth()->user()->rolename == 'admin')
                            <form method="POST" action="{{ route('suppliers.destroy',$item->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button  class="badge badge-primary">Xóa</button>
                            </form>
                            @endif
                        </td>
                        @endif
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
