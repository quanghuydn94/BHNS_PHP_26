@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
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
        <a class="btn btn-outline-primary mb-3" href="{{ route('products.create') }}">Sản phẩm mới</a>
        <a href="{{route('product.listDeleted')}}" class="badge badge-danger">Sản phẩm đã xóa</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    @if ($item->active == 1)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td><img src="{{url('img/products', $item->product_image )}}" width="100px" alt=""></td>
                        <td>{{ $item->product_price }}</td>
                        <td>{{ $item->productType->product_type_name }}</td>
                        <td>
                            @if (auth()->user()->rolename == 'admin')
                            <a href="{{ route('products.edit', ['product' => $item->id]) }}"><button
                                    class="btn btn-primary">Sửa</button></a>
                            <a href="{{ route('products.show', ['product' => $item->id]) }} "><button
                                    class="btn btn-primary">Chi tiết</button></a>

                            @if (auth()->user()->rolename == 'admin')
                            <form method="POST" action="{{ route('products.destroy', ['product' => $item->id]) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Xóa</button>
                            </form>
                            @endif
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
