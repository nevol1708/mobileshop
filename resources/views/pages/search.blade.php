@extends('master')
@section('content')
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <h4>Tìm thấy {{count($product)}} sản phẩm với từ khóa "{{$key}}"</h4>
            <div class="section group">
            @foreach($product as $new)   
                <div id="imgcontain" class="images_1_of_4 products-info">
                    <div id="imgbox"><img src="source/images/product/{{$new->image}}"></div>
                    <a href="{{route('detail', $new->id)}}">{{$new->name}}</a>
                    <h3>{{number_format($new->unit_price)}}đ</h3>
                    <ul>
                        <li><a class="cart" href="{{route('addtoCart', $new->id)}}"> </a></li>
                        <li><a class="i" href="{{route('detail', $new->id)}}"> </a></li>
                        <li><a class="Compar" href="{{route('addtoCompare', $new->id)}}"></a></li>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="clear"> </div>
</div>
@endsection