<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>Karachi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="favicon.ico" type="{{ URL::to('/') }}/adminpanel/image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::to('/') }}/adminpanel/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
    <script>
        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        window.Laravel =<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div class="page-container">
    <div class="page-sidebar">
        @section('body-top')
            @include('layouts.admin_sidenav')
        @show
    </div>
    <div class="page-content-wrap">
        @yield('content')
    </div>
</div>
<!-- END PAGE CONTAINER -->


<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ route('logout') }}" class="btn btn-success btn-lg" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Yes</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ URL::to('/') }}/adminpanel/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="{{ URL::to('/') }}/adminpanel/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='{{ URL::to('/') }}/adminpanel/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='{{ URL::to('/') }}/adminpanel/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='{{ URL::to('/') }}/adminpanel/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='{{ URL::to('/') }}/adminpanel/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/fileinput/fileinput.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins/filetree/jqueryFileTree.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/settings.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/plugins.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/actions.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/demo_dashboard.js"></script>
<!-- END TEMPLATE -->
<script>
    $(function(){
        $("#file-simple").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });
        $("#filetree").fileTree({
            root: '/',
            script: 'assets/filetree/jqueryFileTree.php',
            expandSpeed: 100,
            collapseSpeed: 100,
            multiFolder: false
        }, function(file) {
            alert(file);
        }, function(dir){
            setTimeout(function(){
                page_content_onresize();
            },200);
        });
    });
</script>
<!-- END SCRIPTS -->
</body>
</html>