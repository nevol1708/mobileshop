<div class="header">
    <div class="search-bar">
        <form action="{{route('search')}}" method="get">
            <input type="text" name="key">
            <input type="submit" value="Search" />
        </form>
    </div>
    <div class="clear"> </div>
    <div class="header-top-nav">
        <ul>
            @if(Auth::check())
            <li><a href="#"><span>Xin chào, </span>{{Auth::user()->name}}</a></li>
            <li><a href="admin/logout">Đăng xuất</a></li>
            @else
            <li><a href="{{route('register')}}">Đăng ký</a></li>
            <li><a href="{{route('login')}}">Đăng nhập</a></li>
            @endif
            <li><a href="{{route('getCart')}}"><span>Giỏ hàng&nbsp;&nbsp;: </span></a>
                @if(Session::has('cart'))
                <label>{{Session('cart')->totalQty}}@else&nbsp;0</label>
                @endif
            </li>
        </ul>
    </div>
    <div class="clear"> </div>
</div>
</div>
<div class="clear"> </div>
<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="{{route('index')}}"><img src="source/images/logo.png" title="logo" /></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav">
            <ul>
                <li><a href="{{route('index')}}">Trang chủ</a></li>
                <li><a href="{{route('store')}}">Sản phẩm</a></li>
                <li><a href="{{route('about')}}">Về chúng tôi</a></li>
                <li><a href="{{route('contact')}}">Liên hệ</a></li>
            </ul>
        </div>
        <div class="clear"> </div>
        <!----End-top-nav---->
    </div>
</div>