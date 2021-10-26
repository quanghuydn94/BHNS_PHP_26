@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách lô hàng</h6>
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
        <a class="btn btn-outline-primary mb-3" href="{{ route('warehouses.create') }}">Thêm lô hàng</a>
        <a class="badge badge-danger mb-3" href="{{ route('consignment-delete.index') }}">Lô hàng
            đã xóa</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ký hiệu</th>
                        <th>Thời hạn</th>
                        <th>Số lượng</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ký hiệu</th>
                        <th>Thời hạn</th>
                        <th>Số lượng</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    @if ($item->active == 1)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->consignment_name }}</td>
                        <td>{{ $item->consignment_symbol }}</td>
                        <td>{{ $item->consignment_expiry }}</td>
                        <td>{{ $item->consignment_quantity }}</td>
                        <td>{{ $item->consignment_purchase_price }}</td>
                        <td>{{ $item->consignment_sale_price }}</td>
                        <td>
                            <a href=" {{route('warehouses.show', $item->id)}}"><button
                                    class="btn btn-primary">Chi tiết</button></a>
                            @if (auth()->user()->rolename == 'admin')
                            <a href="{{ route('warehouses.edit', $item->id) }}"><button
                                    class="btn btn-primary">Sửa</button></a>

                            <form method="POST" action="{{ route('warehouses.destroy',  $item->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Xóa</button>
                            </form>
                            @endif
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
