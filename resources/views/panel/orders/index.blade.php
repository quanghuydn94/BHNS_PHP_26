@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
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
        <a class="btn btn-outline-primary mb-3" href="{{ route('order.create') }}">Thêm đơn hàng</a>
        @if (auth()->user()->rolename == 'admin')
        <a href="{{route('order.tableDelete')}}" class="badge badge-danger mb-3">Đơn hàng đã xóa</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Ngày</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    @if ($item->active == 1 && $item->order_customer_phone !== null)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order_customer_name }}</td>
                        <td>{{ $item->order_customer_address }}</td>
                        <td>{{ $item->order_customer_phone }}</td>

                        <td>
                            <a href="{{ route('order.edit', ['id' => $item->id]) }}"><button
                                    class="btn btn-primary">Sửa</button></a>
                            <a href="{{route('order.show',['id'=>$item->id])}} "><button
                                    class="btn btn-primary">Chi tiết</button></a>
                            @if (auth()->user()->rolename == 'admin')

                            <form method="POST" action="{{ route('order.delete', ['id' => $item->id]) }}"
                                class="d-inline-block">
                                @csrf
                                @method('post')
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
