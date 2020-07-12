<!-- <div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div> -->
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{('/')}}" ><img src="{{asset('frontEnd/images/logo3.png')}}" width="150" height="100"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                </div>
                
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                @if(Session::get('customerId'))
                <form action="{{url('customer/logout')}} " method="POST" id = "customerLogoutForm">
                    @csrf
                    <li><a href="#" onclick="document.getElementById('customerLogoutForm').submit();">Log Out</a></li>   
                </form>
                @else
                <li><a href="{{url('new/customer/login')}}" >Login</a></li>
                <br/>
                @endif
                <li><a href="{{url('new/customer/login')}}" >Register</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>