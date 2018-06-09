
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


<!--main content start-->
<div id="content">
    <div class="container">
        <div class="row">
            <!-- begin:article -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 single-post">
                        <ul id="myTab" class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#detail" data-toggle="tab"><i class="fa fa-university"></i> Property Detail</a></li>
                            <li><a href="#location" data-toggle="tab"><i class="fa fa-paper-plane-o"></i> Property Location</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="detail">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($purchase as $key => $item)
                                            <h2>Property # {{ $item->property_id }}</h2>
                                        @endforeach
                                        <div class="flash-message">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))

                                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div id="slider-property" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($purchase_img as $key => $item)
                                                    @if($key == 0)
                                                        <div class="item active">
                                                            <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 550px;" alt="">
                                                        </div>
                                                    @else
                                                        <div class="item">
                                                            <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 550px;" alt="">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <a class="left carousel-control" href="#slider-property" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#slider-property" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                        <h3>Property Overview</h3>
                                        @foreach ($purchase as $key => $item)
                                            <table class="table table-bordered">
                                                <tbody><tr>
                                                    <td width="20%"><strong>Property # </strong></td>
                                                    <td>{{ $item->property_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Price</strong></td>
                                                    <td>{{ $item->amount }}/ Rs</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Type</strong></td>
                                                    <td>Purchase</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Location</strong></td>
                                                    <td>{{ $item->location }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Area</strong></td>
                                                    <td>{{ $item->address }}</td>
                                                </tr>
                                                </tbody></table>
                                        @endforeach

                                        <h3>Property Description</h3>
                                        @foreach ($purchase as $key => $item)
                                            <p>{{ $item->details }}</p>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                            <!-- break -->
                            <div class="tab-pane fade" id="location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id=""></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Contact Agent</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @foreach($user as $key => $user_item)
                                            <div class="team-container team-dark">
                                                <div class="team-image">
                                                    {{--                                                <img src="{{ URL::to('/') }}/website/img/team01.jpg" alt="the team - mikha realestate theme">--}}
                                                </div>
                                                <div class="team-description">
                                                    <h3>{{ $user_item->name }}</h3>
                                                    <p>
                                                        {{--<i class="fa fa-phone"></i> Office : 021-234-5678<br>--}}
                                                        <i class="fa fa-mobile"></i> Mobile : {{$user_item->contact}}<br>
                                                        {{--<i class="fa fa-print"></i> Fax : 021-234-5679--}}
                                                    </p>
                                                    <p><i class="fa fa-mail-reply-all"></i> Email : {{$user_item->email}}</p>
                                                    <div class="team-social">
                                                        <span><a href="" title="" rel="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></span>
                                                        <span><a href="" title="" rel="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></span>
                                                        <span><a href="" title="" rel="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></span>
                                                        <span><a href="" title="" rel="tooltip" data-placement="top" data-original-title="Email"><i class="fa fa-envelope"></i></a></span>
                                                        <span><a href="" title="" rel="tooltip" data-placement="top" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($purchase as $key => $item)
                                            <form method="post" action="{{url('/purchase_property_message')}}">
                                                <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                                <input type="hidden" class="form-control input-lg" name="pro_id" value="{{ $item->purchase_id }}">
                                                <input type="hidden" class="form-control input-lg" name="type" value="purchase">
                                                <input type="hidden" class="form-control input-lg" name="property_id" value="{{ $item->property_id }}">
                                                <div class="form-group">
                                                    <label for="name">Property #</label>
                                                    <input disabled class="form-control input-lg" value="{{ $item->property_id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control input-lg" name="name" placeholder="Enter name : ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control input-lg" name="email" placeholder="Enter email : ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp">Telp.</label>
                                                    <input type="number" class="form-control input-lg" name="contact" placeholder="Enter phone number : ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control input-lg" rows="7" name="message" placeholder="Type a message : "></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-lg">
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:article -->



        </div>
    </div>
</div>
<!--main content end-->



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
