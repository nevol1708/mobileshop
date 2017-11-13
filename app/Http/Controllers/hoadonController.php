<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bill;
use App\BillDetail;
use App\Customer;

class hoadonController extends Controller
{
    //
    public function getDanhSach()
    {
    	$hoadon = Bill::with('customer')->get();
    	return view('admin.hoadon.danhsach', compact('hoadon'));
    }


    public function getXoa($id)
    {
    	$hoadon = Bill::find($id);
    	$hoadon->delete();

    	return redirect('admin/hoadon/danhsach')->with('thongbao','Xóa thành công');
    }


    public function getChiTiet($id)
    {
        $hoadonchitiet = BillDetail::where('id_bill','=', $id)->join('products', 'bill_details.id_product', '=', 'products.id')->get();
        return view('admin/hoadon/chitiet', compact('hoadonchitiet'));
    }


    public function getXoaChiTiet($id)
    {
        $hoadonchitiet = BillDetail::find($id);
        $hoadonchitiet->delete();

        return redirect('admin/hoadon/chitiet')->with('thongbao','Xóa thành công');
    }
}
