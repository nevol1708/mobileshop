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
            <li><a href="#">Xin chào, {{Auth::user()->name}}</a></li>
            <li><a href="admin/logout">Đăng xuất</a></li>
            @else
            <li><a href="{{route('register')}}">Register</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
            @endif
            <li><a href="{{route('getCart')}}"><span>shopping cart&nbsp;&nbsp;: </span></a>
                @if(Session::has('cart'))
                <label>{{Session('cart')->totalQty}}@else&nbsp;noitems</label>
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
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('store')}}">Store</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        <div class="clear"> </div>
        <!----End-top-nav---->
    </div>
</div>