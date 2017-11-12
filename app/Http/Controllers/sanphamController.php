<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductCategory;
use App\Product;
use Illuminate\Support\Facades\Input;

class sanphamController extends Controller
{
    //
    public function getDanhSach()
    {
    	$sanpham = Product::all();
    	return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }


    public function getThem()
    {
        $loaisanpham = ProductCategory::all();
    	return view('admin.sanpham.them',['loaisanpham'=>$loaisanpham]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'name' => 'required|unique:products,name|min:4|max:50',
                'id_type' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'fImages' => 'required',
                'unit' => 'required',
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên sản phẩm',
    			'name.unique'=>'Tên sản phẩm đã tồn tại',
    			'name.min'=>'Tên sản phẩm phải có độ dài từ 4 đến 50 ký tự',
    			'name.max'=>'Tên sản phẩm phải có độ dài từ 4 đến 50 ký tự',

                'id_type.required'=>'Bạn chưa chọn id loại sản phẩm',
                'description.required' => 'Bạn chưa mô tả sản phẩm',
                'unit_price.required' => 'Bạn chưa nhập giá tiền sản phẩm',
                'fImages.required' => 'Bạn chưa chọn hình ảnh sản phẩm',
                'unit.required' => 'Bạn chưa nhập đơn vị sản phẩm',
    		]);
        if(Input::hasFile('fImages')) {
            $file = Input::file('fImages');
            $file->move('source/images/product', $file->getClientOriginalName());
        }
    	$sanpham = new Product;
    	$sanpham->name = $request->name;
        $sanpham->cate_id = $request->id_type;
        $sanpham->description = $request->description;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->image = $file->getClientOriginalName();
        $sanpham->unit = $request->unit;
        
    	$sanpham->save();

    	return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }


    public function getSua($id)
    {
        $loaisanpham = ProductCategory::all();
    	$sanpham = Product::find($id);
    	return view('admin.sanpham.sua',['sanpham'=>$sanpham,'loaisanpham'=>$loaisanpham]);
    }

    public function postSua(Request $request,$id)
    {
        $loaisanpham = ProductCategory::all();
        $sanpham = Product::find($id);
    	$this->validate($request,
            [
                'name' => 'required|unique:products,name|min:4|max:50',
                'id_type' => 'required',
                'unit_price' => 'required',
                'unit' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.unique'=>'Tên sản phẩm đã tồn tại',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 4 đến 50 ký tự',
                'name.max'=>'Tên sản phẩm phải có độ dài từ 4 đến 50 ký tự',

                'id_type.required'=>'Bạn chưa chọn id loại sản phẩm',
                'unit_price.required' => 'Bạn chưa nhập giá tiền sản phẩm',
                'unit.required' => 'Bạn chưa nhập đơn vị sản phẩm',
            ]
            );
        if(Input::hasFile('fImages')) {
            $file = Input::file('fImages');
            $file->move('source/images/product', $file->getClientOriginalName());
        }
        $sanpham->name = $request->name;
        $sanpham->cate_id = $request->id_type;
        $sanpham->description = $request->description;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->image = $file->getClientOriginalName();
        $sanpham->unit = $request->unit;
        
        $sanpham->save();

        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id)
    {
    	$sanpham = Product::find($id);
    	$sanpham->delete();

    	return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }

}
