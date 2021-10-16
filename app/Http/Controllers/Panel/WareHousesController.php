<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Suppliers;
use App\Models\WareHouse;
use Illuminate\Http\Request;

class WareHousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = WareHouse::all();

        return view('panel.warehouse.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        $suppliers = Suppliers::all();

        return view('panel.warehouse.create', compact('products', 'suppliers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'consignment_symbol' => 'required|string',
            'consignment_name' => 'required|string',
            'consignment_expiry' => 'required|date:m/d/Y',
            'consignment_purchase_price' => 'required|numeric',
            'consignment_sale_price' => 'required|numeric',
            'consignment_quantity' => 'required|integer',
            'consignment_saled' => 'required|integer',
            'consignment_return' => 'required|integer',
            'consignment_currently' => 'required|integer',
            'product_id' => 'required|integer',
            'supplier_id' => 'required|integer',
        ];
        $request->validate($rules);

        WareHouse::create([
            'consignment_symbol' => $request->consignment_symbol,
            'consignment_name' => $request->consignment_name,
            'consignment_expiry' => $request->consignment_expiry,
            'consignment_purchase_price' => $request->consignment_purchase_price,
            'consignment_sale_price' => $request->consignment_sale_price,
            'consignment_quantity' => $request->consignment_quantity,
            'consignment_saled' => $request->consignment_saled,
            'consignment_return' => $request->consignment_return,
            'consignment_currently' => $request->consignment_currently,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'active' => 1,

        ]);

        return redirect(route('warehouses.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanpham = SanPham::all();
        $nhacungcap = NhaCungCap::all();
        $data = KhoHang::findOrFail($id);

        return view('panel.khohang.edit', compact('sanpham', 'nhacungcap', 'data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'lohang_ky_hieu' => 'required|string',
            'lohang_han_su_dung' => 'required|string',
            'lohang_gia_mua_vao' => 'required|numeric',
            'lohang_gia_ban_ra' => 'required|numeric',
            'lohang_so_luong_nhap' => 'required|integer',
            'lohang_so_luong_da_ban' => 'required|integer',
            'lohang_so_luong_doi_tra' => 'required|integer',
            'lohang_so_luong_hien_tai' => 'required|integer',
            'lohang_tinh_trang' => 'required|integer',
            'sanpham_id' => 'required|integer',
            'nhacungcap_id' => 'required|integer',
        ];
        $request->validate($rules);

        $data = KhoHang::findOrFail($id);
        $data->update([
            'lohang_ky_hieu' => $request->lohang_ky_hieu,
            'lohang_han_su_dung' => $request->lohang_han_su_dung,
            'lohang_gia_mua_vao' => $request->lohang_gia_mua_vao,
            'lohang_gia_ban_ra' => $request->lohang_gia_ban_ra,
            'lohang_so_luong_nhap' => $request->lohang_so_luong_nhap,
            'lohang_so_luong_da_ban' => $request->lohang_so_luong_da_ban,
            'lohang_so_luong_doi_tra' => $request->lohang_so_luong_doi_tra,
            'lohang_so_luong_hien_tai' => $request->lohang_so_luong_hien_tai,
            'lohang_tinh_trang' => $request->lohang_tinh_trang,
            'sanpham_id' => $request->sanpham_id,
            'nhacungcap_id' => $request->nhacungcap_id,
        ]);

        return redirect(route('khohang.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KhoHang::findOrFail($id);
        $data->lohang_tinh_trang = 0;
        $data->save();

        return redirect()->back();

    }
}
