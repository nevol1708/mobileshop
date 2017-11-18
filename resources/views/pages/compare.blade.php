@extends('master') 
@section('content')

<table>
	<tr>
		<th>Tên sản phẩm</th>
		<th>Giá sản phẩm</th>
		<th>Mô tả</th>
		<th>Hình ảnh</th>
	</tr>
	@foreach($product_compare as $com)
		<tr>
			<td>{{$com['item']['name']}}</td>
			<td>{{number_format($com['item']['unit_price'])}}</td>
			<td>{{$com['item']['description']}}</td>
			<td><img src="source/images/product/{{$com['item']['image']}}"></td>
		</tr>
	@endforeach
</table>
@endsection