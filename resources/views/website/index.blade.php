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

<div class="loadingContent loadingCentre"> <img src="{{ URL::to('/') }}/website/img/loading_white.gif" style="width: 100%">
</div>

<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Services</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('/website_form')}}">
                    <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                    <div class="form-group">
                        <input type="name" class="form-control input-lg" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <select class="form-control input-lg" name='type'>
                            @foreach ($all_services as $key => $items)
                                <option value="{{ $items->name }}">{{ $items->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control input-lg" name="contact" placeholder="Contact">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-lg" name="message" cols="5" rows="3" placeholder="Message"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Send">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- begin:navbar -->
@include('website.header')
<!-- end:navbar -->

<!-- begin:header -->
<div id="header" class="header-slide">

</div>
<!-- end:header -->

{{--buttons start--}}
<ul class="bannerbtns" >
    <p class="btnabovetext renttext">List a rental for free on the largest network in Karachi.</p>
    <p class="btnabovetext purchasetext">Find an agent View thousands of local, active, reviewed agents.</p>
    <p class="btnabovetext saletext">Want to Sell? Add your property..</p>
    {{--<h3 style="color: white;font-size: 40px;padding-bottom: 10px">Hai Ghar Humara</h3>--}}
    <li class="bannerlibtns rentbtn">
        <a class="bannerabtns ">Rent</a>
    </li>
    <li class="bannerlibtns purbtn">
        <a class="bannerabtns ">Purchase</a></li>
    <li class="bannerlibtns salebtn">
        <a class="bannerabtns ">Sell</a></li>
</ul>

{{--buttons end--}}


<!-- begin:service -->
<div id="service" style="    padding-top: 0px !important;
    margin-top: -80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>SERVICES
                    <small>Avail our unique and amazing services to make your work easy</small>
                </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $key => $item)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-container">
                        <div class="service-icon">
                            <a href="#modal-signup" data-toggle="modal" data-target="#modal-signup">
                                <img src="{{ URL::to('/') }}/uploads/{{ $item->image }}" alt="" style="width: 83px;height: 83px"></a>
                        </div>
                        <div class="service-content">
                            <h3 style="height: 20px;">{{ $item->name }}</h3>
                            <p>{{ $item->details }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end:service -->

<!-- begin:content -->
<div id="content">
    <div class="container">
        <!-- begin:latest -->
        <div class="row">
            <div class="col-md-12">
                <div class="heading-title">
                    <h2>Latest Real Estate</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($latest as $key => $item)
                <a href="/property_info/{{$item->id}}">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="property-container">
                            <div class="property-image">
                                <td>@if($item->images == "")
                                        <img src="{{ URL::to('/') }}/website/default_img.jpg" style="height: 244px;" alt="">
                                    @else
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 244px;" alt="">
                                    @endif
                                </td>
                                <div class="property-price">
                                    <h4>Demand</h4>
                                    <span>{{ $item->amount }}/ Rs</span>
                                </div>
                                @if($item->tag  == "")
                                @else
                                    <div class="property-status">
                                        <span>{{ $item->tag }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="property-features">
                                {{--<span><i class="fa fa-home"></i> 5,000 m<sup>2</sup></span>--}}
                                <span><i class="fa fa-hdd-o"></i>  {{ $item->no_of_bedrooms }}</span>
                                <span><i class="fa fa-male"></i>  {{ $item->no_of_bathrooms }}</span>
                            </div>
                            <div class="property-content">
                                <h3><a href="#">  {{ $item->property_name }}</a>
                                    <small>  {{ $item->address }}</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
        <!-- break -->
            <!-- break -->
        </div>
        <!-- end:latest -->

        <!-- begin:for-sale -->
        <div class="row">
            <div class="col-md-12">
                <div class="heading-title">
                    <h2>Popular Real Estate</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($popular as $key => $item)
                <a href="/property_info/{{$item->id}}">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="property-container">
                            <div class="property-image">
                                <td>@if($item->images == "")
                                        <img src="{{ URL::to('/') }}/website/default_img.jpg" style="height: 244px;" alt="">
                                    @else
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 244px;" alt="">
                                    @endif
                                </td>
                                <div class="property-price">
                                    <h4>Demand</h4>
                                    <span>{{ $item->amount }}/Rs</span>
                                </div>
                            </div>
                            <div class="property-content">
                                <h3><a href="#">{{ $item->property_name }}</a>
                                    <small>{{ $item->address }}</small>
                                </h3>
                                <p>{{ str_limit( $item->details, $words = 100, $end = '...')  }}</p>
                            </div>
                            <div class="property-features">
                                <span><i class="fa fa-home"></i> {{ $item->property_area }}</span>
                                <span><i class="fa fa-hdd-o"></i> {{ $item->no_of_bedrooms }}</span>
                                <span><i class="fa fa-male"></i> {{ $item->no_of_bathrooms }}</span>
                                <span><i class="fa fa-car"></i> 2 Garages</span>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
        <!-- break -->

        </div>
        <!-- end:for-sale -->

        <!-- begin:for-corporate -->
        <div class="row">
            <div class="col-md-12">
                <div class="heading-title">
                    <h2>Corporate Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="property-container">

                    <div class="property-features">
                        <span style="font-size: 16px;font-weight: bold;">HR Consultancy</span>
                    </div>
                    <div class="property-content">
                        <h3>
                            <small>We are providing Hr Consultancy services. You can simply contact us for more information.</small>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- break -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="property-container">

                    <div class="property-features">
                        <span style="font-size: 16px;font-weight: bold;">Textile Dying</span>

                    </div>
                    <div class="property-content">
                        <h3>
                            <small>We are providing Textile dying services. You can simply contact us for more information.</small>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- break -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="property-container">

                    <div class="property-features">
                        <span style="font-size: 16px;font-weight: bold;">Dying Machinery </span>
                    </div>
                    <div class="property-content">
                        <h3>
                            <small>We are providing Dying Machineries for your work. You can simply contact us for more information.</small>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- break -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="property-container">

                    <div class="property-features">
                        <span style="font-size: 16px;font-weight: bold;">Textile Real Estate</span>
                    </div>
                    <div class="property-content">
                        <h3>
                            <small>We are providing Textile Real Estate services. You can simply contact us for more information.</small>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- break -->
        </div>
        <!-- end:for-rent -->
    </div>
</div>
<!-- end:content -->

<!-- begin:testimony -->
<div id="testimony" style="background-image: url(img/img17.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div id="testislider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="testimony-container">

                                <div class="testimony-content">
                                    <h3>Hassan Shahid</h3>

                                    <p>Ghar Humara helped me get a house on rent. Amazing team, keep up the good work. Will
                                        surely recommend you people to others.</p>

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-container">

                                <div class="testimony-content">
                                    <h3>Sameer Shamim</h3>

                                    <p>Providing amazing services. Bought 4 services from them to help me shifting at my new house.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-container">

                                <div class="testimony-content">
                                    <h3>Faraz Ahmed</h3>

                                    <p>They have one of the best customer service I have ever come across.
                                        amazing expirence.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#testislider" data-slide="prev">
                        <span class="fa fa-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#testislider" data-slide="next">
                        <span class="fa fa-chevron-right"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end:testimony -->



<!-- begin:subscribe -->
<div id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2 col-sm-8 col-xs-12">
                <h3>Email us For Information</h3>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <h3>Info@gharhumara.com</h3>
            </div>
        </div>
    </div>
</div>
<!-- end:subscribe -->

<!-- begin:partner -->
<div id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-title bg-white">

                    <h2 style="padding-bottom: 27px;padding-top: 27px ;">
                        <img src="{{ URL::to('/') }}/website/img/bahria.png" alt="" style="width: 72px;padding-right: 4px;">Bahria Projects
                    </h2>
                </div>
            </div>
        </div>
        <!-- break -->

        <div class="row">
            <div class="col-md-12">
                <div class="jcarousel-wrapper">
                    <div class="jcarousel">
                        <ul>
                            @foreach ($bahria as $key => $item)
                                <li>
                                    <a href="/property_info/{{$item->id}}">
                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                            <div class="property-container">
                                                <div class="property-image">
                                                    <td>@if($item->images == "")
                                                            <img src="{{ URL::to('/') }}/website/default_img.jpg" style="    height: 180px !important;;" alt="">
                                                        @else
                                                            <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="    height: 180px !important;" alt="">
                                                        @endif
                                                    </td>
                                                    <div class="property-price">
                                                        <h4>Demand</h4>
                                                        <span>{{ $item->amount }}/Rs</span>
                                                    </div>
                                                    @if($item->tag  == "")
                                                    @else
                                                        <div class="property-status">
                                                            <span>{{ $item->tag }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="property-features">
                                                    <span><i class="fa fa-home"></i> {{ $item->property_area }}</span>
                                                    <span><i class="fa fa-hdd-o"></i> {{ $item->no_of_bedrooms }}</span>
                                                    <span><i class="fa fa-male"></i> {{ $item->no_of_bathrooms }}</span>
                                                </div>
                                                <div class="property-content">
                                                    <h3><a href="#">{{ $item->property_name }}</a>
                                                        <small>{{ $item->address }}</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#" class="jcarousel-control-next"><i class="fa fa-angle-right"></i></a>
                    <!-- <p class="jcarousel-pagination"></p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:partner -->

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
<script type="text/javascript" src="{{ URL::to('/') }}/website/js/prefixfree.min.js"></script><!-- prefixFree from -->
<script type="text/javascript" src={{ URL::to('/') }}/website/js/jquery.preload-1.2.0.js"></script>


<script>
    $(document).ready(function(){
        $(".rentbtn").click(function(){
            $(".saletext").hide();
            $(".purchasetext").hide();
            $(".renttext").show();
        });
        $(".purbtn").click(function(){
            $(".renttext").hide();
            $(".saletext").hide();
            $(".purchasetext").show();
        });

        $(".salebtn").click(function(){
            $(".renttext").hide();
            $(".saletext").show();
            $(".purchasetext").hide();
        });

    });
</script>
<script type="text/javascript">

    //An example progress function - just a console log in this case
    function progress(x, total)
    {
        var p1 = parseInt(100/total*x);
        var p2 = p1 + 1;
        console.log(p1 + "," + p2);
        $("#loadingBar").css("background","linear-gradient(90deg, #3498db " + p1 + "%, #FFF " + p2 + "%)");
    }

    //An example completion function
    function complete()
    {
        //Could put something in here to do after load (this replaces the default action)

        //This would do the same as the default function if it's wanted as well
        //$(".loadingContent").fadeOut(200, function(){$(".loadedContent").fadeIn(200);});
    }


    //jQuery call to the module
    $(".toLoad").preload({loadingClass: 'loadingContent',									// Class of elements to show while loading
        loadedClass: 'loadedContent',										// Class of elements to show once loaded
        progressFunction: progress											// Optional function to call per element loaded (passing in index,totalCount)
        //										onComplete: complete														// Optional function to call once all are loaded
    });
</script>
<script type="text/javascript">
    $(document).ready( function() {
        $('.loadingCentre').delay(10000).fadeOut();
    });
</script>


</body>
</html>
