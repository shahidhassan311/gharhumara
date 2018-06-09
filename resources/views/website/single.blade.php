
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
            <div class="col-md-9 col-md-push-3">
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
                                        <h2>The Urban Life</h2>
                                        <div id="slider-property" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#slider-property" data-slide-to="0" class="">
                                                    <img src="{{ URL::to('/') }}/website/img/img02.jpg" alt="">
                                                </li>
                                                <li data-target="#slider-property" data-slide-to="1" class="">
                                                    <img src="{{ URL::to('/') }}/website/img/img03.jpg" alt="">
                                                </li>
                                                <li data-target="#slider-property" data-slide-to="2" class="active">
                                                    <img src="{{ URL::to('/') }}/website/img/img04.jpg" alt="">
                                                </li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="item">
                                                    <img src="{{ URL::to('/') }}/website/img/img02.jpg" alt="">
                                                </div>
                                                <div class="item">
                                                    <img src="{{ URL::to('/') }}/website/img/img03.jpg" alt="">
                                                </div>
                                                <div class="item active">
                                                    <img src="{{ URL::to('/') }}/website/img/img04.jpg" alt="">
                                                </div>
                                            </div>
                                            <a class="left carousel-control" href="#slider-property" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#slider-property" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                        <h3>Property Overview</h3>
                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                <td width="20%"><strong>ID</strong></td>
                                                <td>#121</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Price</strong></td>
                                                <td>$800,000</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Type</strong></td>
                                                <td>Residential</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Contract</strong></td>
                                                <td>Sale</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location</strong></td>
                                                <td>JJ Road, Yogyakarta, INA</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bathrooms</strong></td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bedrooms</strong></td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Area</strong></td>
                                                <td>800m<sup>2</sup> </td>
                                            </tr>
                                            </tbody></table>
                                        <h3>Property Features</h3>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <ul>
                                                    <li><i class="fa fa-check"></i> Air conditioning</li>
                                                    <li><i class="fa fa-check"></i> Balcony</li>
                                                    <li><i class="fa fa-times"></i> Bedding</li>
                                                    <li><i class="fa fa-check"></i> Cable TV</li>
                                                    <li><i class="fa fa-times"></i> Cleaning after exit</li>
                                                    <li><i class="fa fa-check"></i> Cofee pot</li>
                                                    <li><i class="fa fa-check"></i> Computer</li>
                                                    <li><i class="fa fa-times"></i> Cot</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <ul>
                                                    <li><i class="fa fa-check"></i> Internet</li>
                                                    <li><i class="fa fa-times"></i> Iron</li>
                                                    <li><i class="fa fa-check"></i> Juicer</li>
                                                    <li><i class="fa fa-times"></i> Lift</li>
                                                    <li><i class="fa fa-times"></i> Microwave</li>
                                                    <li><i class="fa fa-check"></i> Oven</li>
                                                    <li><i class="fa fa-times"></i> Parking</li>
                                                    <li><i class="fa fa-times"></i> Parquet</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <ul>
                                                    <li><i class="fa fa-times"></i> Radio</li>
                                                    <li><i class="fa fa-check"></i> Roof terrace</li>
                                                    <li><i class="fa fa-times"></i> Smoking allowed</li>
                                                    <li><i class="fa fa-check"></i> Terrace</li>
                                                    <li><i class="fa fa-times"></i> Toaster</li>
                                                    <li><i class="fa fa-check"></i> Towelwes</li>
                                                    <li><i class="fa fa-check"></i> Use of pool</li>
                                                    <li><i class="fa fa-check"></i> Video</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <h3>Property Description</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>


                            </div>
                            <!-- break -->
                            <div class="tab-pane fade" id="location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map-property"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Contact Agent</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="team-container team-dark">
                                            <div class="team-image">
                                                <img src="{{ URL::to('/') }}/website/img/team01.jpg" alt="the team - mikha realestate theme">
                                            </div>
                                            <div class="team-description">
                                                <h3>Katty Sharon</h3>
                                                <p><i class="fa fa-phone"></i> Office : 021-234-5678<br>
                                                    <i class="fa fa-mobile"></i> Mobile : +62-3456-78910<br>
                                                    <i class="fa fa-print"></i> Fax : 021-234-5679</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="team-social">
                                                    <span><a href="#" title="" rel="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></span>
                                                    <span><a href="#" title="" rel="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></span>
                                                    <span><a href="#" title="" rel="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></span>
                                                    <span><a href="#" title="" rel="tooltip" data-placement="top" data-original-title="Email"><i class="fa fa-envelope"></i></a></span>
                                                    <span><a href="#" title="" rel="tooltip" data-placement="top" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <form>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control input-lg" placeholder="Enter name : ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control input-lg" placeholder="Enter email : ">
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">Telp.</label>
                                                <input type="text" class="form-control input-lg" placeholder="Enter phone number : ">
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control input-lg" rows="7" placeholder="Type a message : "></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-lg">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:article -->

            <!-- begin:sidebar -->
            <div class="col-md-3 col-md-pull-9 sidebar">
                <div class="widget-white favorite">
                    <a href="#"><i class="fa fa-heart"></i> Add to favorite</a>
                </div>
                <!-- break -->
                <div class="widget widget-sidebar widget-white">
                    <div class="widget-header">
                        <h3>Recent Property</h3>
                    </div>
                    <ul>
                        <li><a href="#">Luxury Villa</a></li>
                        <li><a href="#">Land In Central Park</a></li>
                        <li><a href="#">The Urban Life</a></li>
                        <li><a href="#">Luxury Office</a></li>
                        <li><a href="">Luxury Villa In Rego Park</a></li>
                    </ul>
                </div>
                <!-- break -->

            </div>
            <!-- end:sidebar -->

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
