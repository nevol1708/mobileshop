<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductCategory;

class loaisanphamController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loaisanpham = ProductCategory::all();
    	return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }


    public function getThem()
    {
    	return view('admin.loaisanpham.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'name' => 'required|min:4|max:50'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên loại sản phẩm',
    			'name.unique'=>'Tên loại sản phẩm đã tồn tại',
    			'name.min'=>'Tên loại sản phẩm phải có độ dài từ 4 đến 50 ký tự',
    			'name.max'=>'Tên loại sản phẩm phải có độ dài từ 4 đến 50 ký tự',
    		]
    		);

    	$loaisanpham = new ProductCategory;
    	$loaisanpham->name = $request->name;
    	$loaisanpham->save();

    	return redirect('admin/loaisanpham/them')->with('thongbao','Thêm thành công');
    }


    public function getSua($id)
    {
    	$loaisanpham = ProductCategory::find($id);
    	return view('admin.loaisanpham.sua',['loaisanpham'=>$loaisanpham]);
    }

    public function postSua(Request $request,$id)
    {
    	$loaisanpham = ProductCategory::find($id);
    	$this->validate($request,
    		[
    			//name="name" placeholder... (sua.blade.php)
    			'name' => 'required|unique:type_products,name|min:4|max:50'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên loại sản phẩm',
    			'name.unique'=>'Tên loại sản phẩm đã tồn tại',
    			'name.min'=>'Tên loại sản phẩm phải có độ dài từ 4 đến 50 ký tự',
    			'name.max'=>'Tên loại sản phẩm phải có độ dài từ 4 đến 50 ký tự',
    		]
    		);
    	
    	$loaisanpham->name = $request->name;
    	$loaisanpham->save();

    	return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id)
    {
    	$loaisanpham = ProductCategory::find($id);
    	$loaisanpham->delete();

    	return redirect('admin/loaisanpham/danhsach')->with('thongbao','Xóa thành công');
    }

}
