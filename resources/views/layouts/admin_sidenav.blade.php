<!-- START X-NAVIGATION -->
<ul class="x-navigation">
    <li class="xn-logo">
        <a href="/dashboard">Ghar Humara</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    {{--<li class="xn-profile">--}}
        {{--<a href="#" class="profile-mini">--}}
            {{--<img src="{{ URL::to('/') }}/adminpanel/logo.png" alt="John Doe"/>--}}
        {{--</a>--}}
        {{--<div class="profile">--}}
            {{--<div class="profile-image">--}}
                {{--<img src="{{ URL::to('/') }}/adminpanel/logo.png" style="width: 90%;height: 119px;" alt="John Doe"/>--}}
            {{--</div>--}}
            {{--<div class="profile-data">--}}
                {{--<div class="profile-data-name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>--}}
                {{--<div class="profile-data-title">Web Developer/Designer</div>--}}
            {{--</div>--}}
            {{--<div class="profile-controls">--}}
                {{--<a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>--}}
                {{--<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}
    @if(\Illuminate\Support\Facades\Auth::user()->role == "subadmin")
    <li class="">
        <a href="/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>
    <li>
        <a href="/sales_data_sa"><span class="fa fa-sun-o"></span> <span class="xn-text">Sale</span></a>
    </li>
    <li>
        <a href="/purchase_data_sa"><span class="fa fa-money"></span> <span class="xn-text">Purchase</span></a>
    </li>
    <li>
        <a href="/rent_data_sa"><span class="fa fa-plane"></span> <span class="xn-text">Rent</span></a>
    </li>
    @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
        <li class="">
            <a href=""><span class=""></span> <span class="xn-text"></span></a>
        </li>
    <li class="">
        <a href="/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>
    <li>
        <a href="/users_details"><span class="fa fa-users"></span> <span class="xn-text">Users</span></a>
    </li>
        <li>
            <a href="/agent_details"><span class="fa fa-users"></span> <span class="xn-text">Agent</span></a>
        </li>
    <li>
        <a href="/employee_details"><span class="fa fa-empire"></span> <span class="xn-text">Employees</span></a>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">User Request</span></a>
        <ul>
            <li><a href="/user_sale_request"><span class="fa fa-image"></span> Sales</a></li>
            <li><a href="/user_purchase_request"><span class="fa fa-user"></span> Purchase</a></li>
            <li><a href="/user_rent_request"><span class="fa fa-users"></span> Rent</a></li>

        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Admin Upload</span></a>
        <ul>
            <li><a href="/user_sales_details"><span class="fa fa-image"></span> Sales</a></li>
            <li><a href="/user_purchase_details"><span class="fa fa-user"></span> Purchase</a></li>
            <li><a href="/user_rent_details"><span class="fa fa-users"></span> Rent</a></li>

        </ul>
    </li>
    <li class="xn-title">Website</li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Home Listing</span></a>
        <ul>
            <li><a href="/bahria_property"><span class="fa fa-users"></span> Bahria Property</a></li>
            <li><a href="/latest_property"><span class="fa fa-image"></span> Latest Property</a></li>
            <li><a href="/popular_property"><span class="fa fa-user"></span> Popular Property</a></li>

        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Services</span></a>
        <ul>
            <li><a href="/services_details"><span class="fa fa-cloud"></span> Services</a></li>
            <li><a href="/services_message"><span class="fa fa-cloud"></span> Services Message</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Property Message</span></a>
        <ul>
            <li><a href="/sales_property_message_info"><span class="fa fa-cloud"></span> Sell</a></li>
            <li><a href="/rent_property_message_info"><span class="fa fa-cloud"></span> Rent</a></li>
            <li><a href="/purchase_property_message_info"><span class="fa fa-cloud"></span> Purchase</a></li>
        </ul>
    </li>

@endif

</ul>
<!-- END X-NAVIGATION -->