@extends('master') 
@section('content')
<style type="text/css">
	#tablecmp{
		border: 1px solid black;
	}
	#tablecmp tr{
		background-color: transparent;
	}
	#tablecmp tr:hover{
		background-color: white;
		color: #b30000;
	}
	.tdcmp{
		border: 1px solid grey;
		text-align: center;
		width: 300px;
	}
	.tdcmp img{
		width: 100%;
		height: 330px;
		margin-top: 10px;
	}
	.tdcmp1{
		border: 1px solid grey;
		color: #990000;
		background-color: #f5f5f0;
		width: 150px;
		text-align: center;
	}
</style>
<table id="tablecmp">
	<tr>
		<td style="border: none" class="tdcmp1" ></td>
		@foreach($product_compare as $com)
		<td style="border: none" class="tdcmp" style="height: 330px"><img src="source/images/product/{{$com['item']['image']}}"></td>
		@endforeach
	<tr>
	<tr>
		<td class="tdcmp1">TÊN SẢN PHẨM</td>
		@foreach($product_compare as $com)
		<td class="tdcmp">{{$com['item']['name']}}</td>
		@endforeach
	</tr>
	<tr>
		<td class="tdcmp1">GIÁ SẢN PHẨM</td>
		@foreach($product_compare as $com)
		<td class="tdcmp">{{number_format($com['item']['unit_price'])}}</td>
		@endforeach
	</tr>
	<tr>
		<td class="tdcmp1">MÔ TẢ</td>
		@foreach($product_compare as $com)
		<td class="tdcmp">{{$com['item']['description']}}</td>
		@endforeach
	</tr>
	<tr>
		<td class="tdcmp1">XÓA</td>
		@foreach($product_compare as $com)
		<td><a class="tdcmp btn btn-danger" href="{{route('delfromCompare',$com['item']['id'])}}">Xóa</a></td>
		@endforeach
	</tr>		
</table>
@endsection