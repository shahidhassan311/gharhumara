
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="GharHumara is a real estate website">
    <meta name="author" content="GHAR HUMARA">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/website/img/gharlogo.png">

    <title>GHARHUMARA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('/') }}/website/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
    <link href="{{ URL::to('/') }}/website/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/style.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/responsive.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body id="top">

<!-- begin:navbar -->
@include('website.header')
<!-- end:navbar -->

<!-- begin:header -->
<div id="header" class="heading" style="background-image: url({{ URL::to('/') }}/website/img/img01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">
                <div class="page-title">
                    <h2>Contact</h2>
                </div>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end:header -->

<!-- begin:content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-container">
                    <div class="blog-content">
<!--                        <div id="map"></div>-->
                        <div class="blog-title">
                            <h2>Please don't hesitate to contact us if you need our help.</h2>
                            <h3>...If you wanna like to contact us, please fill the form below.</h3>
                        </div>
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <div class="blog-text contact">
                            <div class="row">
                                <div class="col-md-8 col-sm-7">
                                    <form method="post" action="{{url('/website_form')}}">
                                        <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="sr-only">Subject</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Message</label>
                                            <textarea class="form-control" name="message" rows="5" placeholder="Enter your name"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Message</button>
                                        </div>
                                    </form><br>
                                </div>
                                <div class="col-md-4 col-sm-5">
                                    <address>
                                        <strong>Address:</strong> 6/11/2 Model Colony Karachi<br><br>
                                        <strong>Phone:</strong> +923363176178, +923218953868
                                        +923212112209<br><br>
                                        <strong>Email:</strong> Info@gharhumara.com<br><br>
                                        <strong>Email:</strong> naveed.cro@gmail.com<br>

                                    </address>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:content -->






<!-- begin:footer -->
@include('website.footer')
<!-- end:footer -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::to('/') }}/website/js/jquery.js"></script>
<script src="{{ URL::to('/') }}/website/js/bootstrap.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="{{ URL::to('/') }}/website/js/gmap3.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/jquery.easing.js"></script>
<script src="{{ URL::to('/') }}/website/js/jquery.jcarousel.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/masonry.pkgd.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/jquery.backstretch.js"></script>
<script src="{{ URL::to('/') }}/website/js/jquery.nicescroll.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/script.js"></script>
</body>
</html>
