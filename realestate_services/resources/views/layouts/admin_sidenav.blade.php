<!-- START X-NAVIGATION -->
<ul class="x-navigation">
    <li class="xn-logo">
        <a href="index.html">Esate Admin</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
        <a href="#" class="profile-mini">
            <img src="{{ URL::to('/') }}/adminpanel/assets/images/users/avatar.jpg" alt="John Doe"/>
        </a>
        <div class="profile">
            <div class="profile-image">
                <img src="{{ URL::to('/') }}/adminpanel/assets/images/users/avatar.jpg" alt="John Doe"/>
            </div>
            <div class="profile-data">
                <div class="profile-data-name">Admin</div>
                {{--<div class="profile-data-title">Web Developer/Designer</div>--}}
            </div>
            <div class="profile-controls">
                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
            </div>
        </div>
    </li>
    <li class="active">
        <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">User Request</span></a>
        <ul>
            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Sales</a></li>
            <li><a href="pages-profile.html"><span class="fa fa-user"></span> Purchase</a></li>
            <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Rent</a></li>

        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Admin Upload</span></a>
        <ul>
            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Sales</a></li>
            <li><a href="pages-profile.html"><span class="fa fa-user"></span> Purchase</a></li>
            <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Rent</a></li>

        </ul>
    </li>
    <li class="xn-title">Services</li>
    <li>
        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Web Servive</span></a>
    </li>


</ul>
<!-- END X-NAVIGATION -->