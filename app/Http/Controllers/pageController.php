<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductCategory;
use App\Cart;
use App\User;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex() {
        $products = Product::orderBy('updated_at', 'DESC')->paginate(4);
        $brand = ProductCategory::all();
        return view('pages.index', compact('products', 'brand'));
    }

    public function getDetail(Request $req) {
        $product = Product::where('id', $req->id)->first();
    	return view('pages.detail', compact('product'));
    }

    public function getStore() {
        $products = Product::paginate(12);
        $brand = ProductCategory::all();
        return view('pages.store', compact('products', 'brand'));
    }

    public function getBrandfind($id) {
        $brand = ProductCategory::all();
        $products = Product::where('cate_id', '=', $id)->get();
        return view('pages.store', compact('products', 'brand'));
    }

    public function getPricefind($min_price, $max_price) {
        $brand = ProductCategory::all();
        $products = Product::whereBetween('unit_price', [$min_price, $max_price])->get();
        return view('pages.price', compact('products', 'brand'));
    }

    public function getPriceDESC() {
        $products = Product::orderBy('unit_price', 'DESC')->paginate(12);
        $brand = ProductCategory::all();
        return view('pages.price', compact('products', 'brand'));
    }

    public function getPriceASC() {
        $products = Product::orderBy('unit_price', 'ASC')->paginate(12);
        $brand = ProductCategory::all();
        return view('pages.price', compact('products', 'brand'));
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCart() {
        return view('pages.cart');
    }
    
    public function getContact() {
        return view('pages.contact');
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getRegister() {
        return view('pages.register');
    }
    public function getSearch(Request $req) {
        $product = Product::where('name', 'like', '%'.$req->key.'%')->get();
        return view('pages.search', compact('product'));
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function postRegister(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu nhiều nhất 20 kí tự',
            ]);
        $user = new User();
        $user->name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->admin_user = 0;
        $user->remember_token = $req->remember_token;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
}
