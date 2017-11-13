@extends('master') @section('content')
<!-- CSS for store page -->
<link href="source/css/style1.css" rel="stylesheet" />
<!-- CSS for store page -->
<!-- JS for detail product -->
<script type="text/javascript">
$(document).ready(function() {
    // this is for 2nd row's li offset from top. It means how much offset you want to give them with animation
    var single_li_offset = 200;
    var current_opened_box = -1;

    $('#wrap li').click(function() {

        var thisID = $(this).attr('id');
        var $this = $(this);

        var id = $('#wrap li').index($this);

        if (current_opened_box == id) // if user click a opened box li again you close the box and return back
        {
            $('#wrap .detail-view').slideUp('slow');
            return false;
        }
        $('#cart_wrapper').slideUp('slow');
        $('#wrap .detail-view').slideUp('slow');

        // save this id. so if user click a opened box li again you close the box.
        current_opened_box = id;

        var targetOffset = 0;

        // below conditions assumes that there are four li in one row and total rows are 4. How ever if you want to increase the rows you have to increase else-if conditions and if you want to increase li in one row, then you have to increment all value below. (if(id<=3)), if(id<=7) etc

        if (id <= 3)
            targetOffset = 0;
        else if (id <= 7)
            targetOffset = single_li_offset;
        else if (id <= 11)
            targetOffset = single_li_offset * 2;
        else if (id <= 15)
            targetOffset = single_li_offset * 3;

        $("html:not(:animated),body:not(:animated)").animate({ scrollTop: targetOffset }, 800, function() {

            $('#wrap #detail-' + thisID).slideDown(500);
            return false;
        });

    });

    $('.close a').click(function() {

        $('#wrap .detail-view').slideUp('slow');

    });

    $('.closeCart').click(function() {

        $('#cart_wrapper').slideUp();

    });

    $('#show_cart').click(function() {

        $('#cart_wrapper').slideToggle('slow');

    });

});
</script>
<!-- JS for detail product -->

<div class="clear"> </div>
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <div align="left" style="min-height:800px;">
                <div id="wrap" align="center">
                    <ul>
                        @foreach($products as $new)
                        <li id="{{$new->id}}">
                            <img src="source/images/product/{{$new->image}}" class="items" alt="" style="height: 293px; width: 200px"/>
                            <br clear="all" />
                            <div><a href="{{route('detail', $new->id)}}">{{$new->name}}</a></div>
                        </li>
                        <!-- Detail Boxes for li -->
                        <div class="detail-view" id="detail-{{$new->id}}">
                            <div class="close" align="right">
                                <a href="javascript:void(0)">x</a>
                            </div>
                            <img src="source/images/product/{{$new->image}}" class="detail_images" alt="" />
                            <div class="detail_info">
                                <label class='item_name'><a href="{{route('detail', $new->id)}}">{{$new->name}}</a></label>
                                <br clear="all" />
                                <p>
                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, -->
                                    {{$new->description}}
                                    <br clear="all" />
                                    <br clear="all" />
                                    <span class="price">{{number_format($new->unit_price)}}</span>
                                </p>
                                <br clear="all" />
                                <button class="add-to-cart-button">Add to Cart</button>
                            </div>
                        </div>
                        @endforeach
                        <br clear="all" />
                    </ul>
                    <br clear="all" />
                </div>
            </div>
        </div>
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
@endsection