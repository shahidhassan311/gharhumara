
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
                <div class="quick-search">
                    <div class="row">
                        <form method="post" action="{{url('/search_filter')}}" role="form">
                            <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label for="bedroom">Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Enter Location">
                                </div>
                                <div class="form-group">
                                    <label for="bedroom">Bedroom</label>
                                    <select class="form-control" name="no_of_bedrooms">
                                        <option>Select Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <!-- break -->
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label for="status">Type</label>
                                    <select class="form-control" name="type">
                                        <option value="sales">On Sale</option>
                                        <option value="rent">For Rent</option>
                                        <option value="purchase">For Bye</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bedroom">Min Price</label>
                                    <input type="text" class="form-control" name="min_price" placeholder="Enter Max Price">
                                </div>
                            </div>
                            <!-- break -->
                            <div class="col-md-3 col-sm-3 col-xs-6">

                                <div class="form-group">
                                    <label for="minprice">Floor</label>
                                    <select class="form-control" name="property_floor">
                                        <option>Select Floors</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bedroom">Max Price</label>
                                    <input type="text" class="form-control" name="max_price" placeholder="Enter Min Price">
                                </div>
                            </div>
                            <!-- break -->
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label for="bathroom">Bathroom</label>
                                    <select class="form-control" name="no_of_bathrooms">
                                        <option>Select Bathrooms</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="submit" name="submit" value="Search" class="btn btn-primary btn-block">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end:header -->

<!-- begin:content -->
<div id="content">
    <div class="container">
        <div class="row">
            <!-- begin:article -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-title heading-title-alt">
                            <h3>Property Search Filter</h3>
                        </div>
                    </div>
                </div>

                <!-- begin:product -->
                <div class="row container-realestate">

                    @foreach ($result as $key => $item)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="property-container">
                                <div class="property-image">
                                    @if($item->sale_id)
                                    <a href="/sale_info/{{ $item->sale_id }}">
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 244px;" alt="">
                                        <div class="property-price">
                                            <h4>HOUSE</h4>
                                            <span>{{ $item->amount }}/Rs</span>
                                        </div>
                                        <div class="property-status">
                                            <span>For Purchase</span>
                                        </div>
                                    </a>
                                    @elseif ($item->purchase_id)
                                    <a href="/purchase_info/{{ $item->purchase_id }}">
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 244px;" alt="">
                                        <div class="property-price">
                                            <h4>HOUSE</h4>
                                            <span>{{ $item->amount }}/Rs</span>
                                        </div>
                                        <div class="property-status">
                                            <span>For Purchase</span>
                                        </div>
                                    </a>
                                    @elseif ($item->rent_id)
                                    <a href="/rent_info/{{ $item->rent_id }}">
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" style="height: 244px;" alt="">
                                        <div class="property-price">
                                            <h4>HOUSE</h4>
                                            <span>{{ $item->amount }}/Rs</span>
                                        </div>
                                        <div class="property-status">
                                            <span>For Purchase</span>
                                        </div>
                                    </a>
                                    @else
                                            I don't have any records!
                                        @endif
                                </div>
                                <div class="property-features">
                                    <span><i class="fa fa-home"></i>{{ $item->property_area }}/Area</span>
                                    <span><i class="fa fa-hdd-o"></i>{{ $item->no_of_bedrooms }}/Bed</span>
                                    <span><i class="fa fa-male"></i>{{ $item->no_of_bathrooms }}/Bath</span>
                                </div>
                                <div class="property-content">
                                    <h3><a href="/single">Office</a> <small>{{ $item->address  }}</small></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end:product -->

                <!-- begin:pagination -->
                <div class="row">
                    <div class="col-md-12">
                        {{--<ul class="pagination">--}}
                            {{--{!! $purchase->links('website.pagination') !!}--}}
                        {{--</ul>--}}
                    </div>
                </div>
                <!-- end:pagination -->
            </div>
            <!-- end:article -->

            <!-- begin:sidebar -->

            <!-- end:sidebar -->

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
