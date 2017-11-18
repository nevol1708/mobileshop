@extends('master') 
@section('content')
<!-- CSS for store page -->
<link href="source/css/style1.css" rel="stylesheet" />

<div class="clear"> </div>
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <div class="section group">
            @foreach($products as $product)   
                <div id="imgcontain" class="images_1_of_4 products-info">
                    <div id="imgbox"><img src="source/images/product/{{$product->image}}"></div>
                    <a href="{{route('detail', $product->id)}}">{{$product->name}}</a>
                    <h3>{{number_format($product->unit_price)}}đ</h3>
                    <ul>
                        <li><a class="cart" href="{{route('addtoCart', $product->id)}}"> </a></li>
                        <li><a class="i" href="{{route('detail', $product->id)}}"> </a></li>
                        <li><a class="Compar" href="{{route('addtoCompare', $product->id)}}"></a></li>
                    </ul>
                </div>
            @endforeach
            </div>
            {!! $products->render() !!}
        </div>
    </div>
    <div class="content-sidebar">
        <h4>Thương hiệu</h4>
        <ul>
            @foreach($brand as $brandname)
            <li><a href="{{route('brand', $brandname->id)}}">{{$brandname->name}}</a></li>
            @endforeach
        </ul>
        <h4>Giá</h4>
        <ul>
            <li><a href="{{route('price', [0, 6000000])}}"> < 6tr</a></li>
            <li><a href="{{route('price', [6000000, 10000000])}}"> 6tr - 10tr</a></li>
            <li><a href="{{route('price', [10000000, 15000000])}}"> 10tr - 15tr</a></li>
            <li><a href="{{route('price', [15000000, 100000000])}}"> >15tr</a></li>
        </ul>
        <h4>Sắp xếp</h4>
        <ul>
            <li><a href="{{route('priceasc')}}">Giá tăng dần</a></li>
            <li><a href="{{route('pricedesc')}}">Giá giảm dần</a></li>
        </ul>
    </div>
</div>
<div class="clear"> </div>
@endsection