<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <!-- END TOGGLE NAVIGATION -->
    <!-- SEARCH -->
{{--<li class="xn-search">--}}
{{--<form role="form">--}}
{{--<input type="text" name="search" placeholder="Search..."/>--}}
{{--</form>--}}
{{--</li>--}}
<!-- END SEARCH -->
    <!-- SIGN OUT -->
    <li class="xn-icon-button pull-right">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
    </li>
    <!-- END SIGN OUT -->
    <!-- MESSAGES -->
    @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
        <li class="xn-icon-button pull-right" id="notification">
            <a href="#"><span class="fa fa-comments"></span></a>
            <div class="informer informer-danger">4</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Notification</h3>
                    <div class="pull-right">
                        <span class="label label-danger">4 new</span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                    <div id="noti">

                    </div>
                    {{--<a href="#" id="noti" class="list-group-item">--}}
                    {{--<div class="list-group-status status-online"></div>--}}
                    {{--<img src="{{ URL::to('/') }}/adminpanel/assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>--}}
                    {{--<span class="contacts-title">John Doe</span>--}}
                    {{--<p>Praesent placerat tellus id augue condimentum</p>--}}
                    {{--</a>--}}
                </div>
                <div class="panel-footer text-center">
                    {{--<a href="pages-messages.html">Show all messages</a>--}}
                </div>
            </div>
        </li>
        <!-- END MESSAGES -->

@endif
<!-- END TASKS -->
</ul>