@extends('master')
@section('content')
<!--start-image-slider---->
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 1
        $("#slider1").responsiveSlides({
            maxwidth: 1600,
            speed: 600
    });
});
</script>

<div class="wrap">
    <div class="image-slider">
        <!-- Slideshow 1 -->
        <ul class="rslides" id="slider1">
            <li><img src="source/images/1.png" alt=""></li>
            <li><img src="source/images/2.png" alt=""></li>
            <li><img src="source/images/1.png" alt=""></li>
        </ul>
        <!-- Slideshow 2 -->
    </div>
    <!--End-image-slider---->
</div>
<div class="clear"> </div>
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <h4>Sản phẩm mới</h4>
            <div class="section group">
            @foreach($products as $product)   
                <div class="grid_1_of_4 images_1_of_4 products-info">
                    <img src="source/images/product/{{$product->image}}" >
                    <a href="{{route('detail', $product->id)}}">{{$product->name}}</a>
                    <h3>{{number_format($product->unit_price)}}đ</h3>
                    <ul>
                        <li><a class="cart" href="{{route('addtoCart', $product->id)}}"> </a></li>
                        <li><a class="i" href="{{route('detail', $product->id)}}"> </a></li>
                    </ul>
                </div>
            @endforeach
            </div>
            {!! $products->render() !!}
        </div>
        <div class="content-sidebar">
            <h4>Hãng Sản Xuất</h4>
            <ul>
                @foreach($brand as $brandname)
                <li><a href="{{route('brand', $brandname->id)}}">{{$brandname->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="clear"> </div>
</div>
@endsection