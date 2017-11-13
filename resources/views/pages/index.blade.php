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
        <div class="top-3-grids">
            <div class="section group">
                <div class="grid_1_of_3 images_1_of_3">
                    <a href="single.html"><img src="source/images/grid-img1.jpg"></a>
                    <h3>Lorem Ipsum is simply dummy text </h3>
                </div>
                <div class="grid_1_of_3 images_1_of_3 second">
                    <a href="single.html"><img src="source/images/grid-img2.jpg"></a>
                    <h3>Lorem Ipsum is simply dummy text </h3>
                </div>
                <div class="grid_1_of_3 images_1_of_3 theree">
                    <a href="single.html"><img src="source/images/grid-img3.jpg"></a>
                    <h3>Lorem Ipsum is simply dummy text </h3>
                </div>
            </div>
        </div>
        <div class="content-grids">
            <h4>All Products</h4>
            <div class="section group">
            @foreach($products as $product)   
                <div class="grid_1_of_4 images_1_of_4 products-info">
                    <img src="source/images/product/{{$product->image}}" style="height: 293px; width: 200px">
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
            <h4>Brand</h4>
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