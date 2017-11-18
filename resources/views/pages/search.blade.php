@extends('master')
@section('content')
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <h4>Found {{count($product)}} products</h4>
            @foreach($product as $new)
            <div class="section group">    
                <div class="grid_1_of_4 images_1_of_4 products-info">
                    <img src="source/images/product/{{$new->image}}">
                    <a href="{{route('detail', $new->id)}}">{{$new->name}}</a>
                    <h3>{{number_format($new->unit_price)}}đ</h3>
                    <ul>
                        <li><a class="cart" href="{{route('addtoCart', $new->id)}}"> </a></li>
                        <li><a class="i" href="{{route('detail', $new->id)}}"> </a></li>
                        <li><a class="Compar" href="{{route('addtoCompare', $new->id)}}"></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="clear"> </div>
</div>
@endsection