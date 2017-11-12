@extends('master')
@section('content')
<link href="cartsource/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="cartsource/js/jquery-1.11.1.min.js"></script>
<form action="{{route('postCheckout')}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-lg-6">
			<div class="content">	
				@if(Session::has('cart'))
				<div class="content2">
					<div class="line1">
						<h2>Placing Order</h2>
					</div>
					@foreach($product_cart as $product)
					<div class="line2">
						<div class="line-info">
							<img src="source/images/product/{{$product['item']['image']}}" alt="shirts" class="item">
						</div>
						<div class="line-info">
							<p>{{$product['item']['name']}}</p>
						</div>
						<div class="line-info">
							<p>{{$product['qty']}} &times; {{number_format($product['item']['unit_price'])}}đ</p>
						</div>
						<a class="alert-close1" href="{{route('delfromCart',$product['item']['id'])}}"><img src="cartsource/images/close.png" alt="close"></a>
						<div class="clear"></div>
					</div>
					@endforeach
				</div>
				@else
				<p>Giỏ hàng trống</p>
				@endif
			</div>
		</div>
		<div class="col-lg-6">
			<div class="content">
				<div class="content2">
					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
									
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="notes"></textarea>
					</div>
					<ul class="payment_methods methods">
						<li class="payment_method_bacs">
							<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
							<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>						
						</li>

						<li class="payment_method_cheque">
							<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
							<label for="payment_method_cheque">Chuyển khoản </label>					
						</li>	
					</ul>
					<p>Total: @if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đ</p>
					<input type="submit" value="Place Order">
				</div>
			</div>
		</div>
	</div>
</form>
@endsection