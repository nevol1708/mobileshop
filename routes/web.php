<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home page
Route::get('/',[
	'as'=>'index',
	'uses'=>'pageController@getIndex'
]);

// detail page
Route::get('detail/{id}',[
	'as'=>'detail',
	'uses'=>'PageController@getDetail'
]);

// all product
Route::get('store',[
	'as'=>'store',
	'uses'=>'pageController@getStore'
]);

// brand find
Route::get('store/{id}',[
	'as'=>'brand',
	'uses'=>'PageController@getBrandfind'
]);

// price find
Route::get('price/{min}-to-{max}',[
	'as'=>'price',
	'uses'=>'PageController@getPricefind'
]);

// login
Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

// register
Route::get('register',[
	'as'=>'register',
	'uses'=>'PageController@getRegister'
]);

Route::post('register',[
	'as'=>'register',
	'uses'=>'PageController@postRegister'
]);

// sign out
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

// search
Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

// contact
Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@getContact'
]);

// about
Route::get('about',[
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'addtoCart',
	'uses'=>'PageController@getAddtoCart'
]);

// del from Cart
Route::get('del-cart/{id}',[
	'as'=>'delfromCart',
	'uses'=>'PageController@getDelItemCart'
]);

// get Cart
Route::get('cart',[
	'as'=>'getCart',
	'uses'=>'PageController@getCart'
]);

// check out cart
Route::post('cart',[
	'as'=>'postCheckout',
	'uses'=>'PageController@postCheckout'
]);


// admin
Route::get('admin/dangnhap',[
	'as'=>'login',
	'uses'=>'userController@getDangnhapAdmin'
]);
Route::post('admin/dangnhap','userController@postDangnhapAdmin');

Route::get('admin/logout','userController@getDangxuatAdmin');

//Tạo group admin vì khi đăng nhập chỉ cần gán vào trang admin mà không phải gán các trang con của nó
//=>Bảo mật admin => Bảo mật trang con

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::group(['prefix'=>'loaisanpham'],function(){
		// admin/loaisanpham/danhsach || sua || them
		Route::get('danhsach','loaisanphamController@getDanhSach');

		Route::get('sua/{id}','loaisanphamController@getSua');
		Route::post('sua/{id}','loaisanphamController@postSua');

		Route::get('xoa/{id}','loaisanphamController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','loaisanphamController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','loaisanphamController@postThem');
	});


	Route::group(['prefix'=>'sanpham'],function(){
		// admin/sanpham/danhsach || sua || them
		Route::get('danhsach','sanphamController@getDanhSach');

		Route::get('sua/{id}','sanphamController@getSua');
		Route::post('sua/{id}','sanphamController@postSua');

		Route::get('xoa/{id}','sanphamController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','sanphamController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','sanphamController@postThem');
	});


	Route::group(['prefix'=>'hoadon'],function(){
		// admin/hoadon/danhsach || sua || them
		Route::get('danhsach','hoadonController@getDanhSach');

		Route::get('xoa/{id}','hoadonController@getXoa');

		Route::get('chitiet/{id}','hoadonController@getChiTiet');

		Route::get('xoachitiet/{id}','hoadonController@getXoaChiTiet');

		Route::get('xuly/{id}', 'hoadonController@getDaXuLy');

		Route::get('chuaxuly/{id}', 'hoadonController@getChuaXuLy');
	});


	Route::group(['prefix'=>'khachhang'],function(){
		// admin/khachhang/danhsach || sua 
		Route::get('danhsach','khachhangController@getDanhSach');

		Route::get('xoa/{id}','khachhangController@getXoa');

		Route::get('chitiet/{id}', 'khachhangController@findCustomer');
	});


	Route::group(['prefix'=>'users'],function(){
		// admin/users/danhsach || sua || them
		Route::get('danhsach','userController@getDanhSach');

		Route::get('sua/{id}','userController@getSua');
		Route::post('sua/{id}','userController@postSua');

		Route::get('xoa/{id}','userController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','userController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','userController@postThem');
	});

	
});
