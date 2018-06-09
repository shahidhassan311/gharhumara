<html>
<head>
    <link rel="stylesheet" href="{{ URL::to('/') }}/pslticket/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/pslticket/css/style.css">
</head>
<body style="background-image: url(public/pslticket/hblpsl.jpg);height: 100%;
    width: 100%;background-size: auto;">
<div></div>


<div class="container">

<a href="https://api.whatsapp.com/send?text=http://gharhumara.com/WIN-PSL-FINAL-TICKET"><h1 style="text-align: center;"><img src="{{ URL::to('/') }}/pslticket/images.jpg" alt=""></h1></a>
    <h1 style="text-align: center;"><img src="{{ URL::to('/') }}/pslticket/redarrow.png" alt="" style="    width: 50px;
"></h1>
    <h3 style="color: #f50525;text-align: center;">Click on the image above to invite your friends</h3>

    <a id="download" href="https://play.google.com/store/apps/details?id=com.gharhumara.hassanshahid.estate&hl=en" style="display: none"><h1 style="text-align: center;"><img src="{{ URL::to('/') }}/pslticket/android-download.png" alt=""></h1></a>

    <div class="row main">


        <div class="main-login main-center">
            <h5 style="color: white;text-align: center">Fill up this form to win two PSL Final tickets for free</h5>
            <h2 style="color: white;text-align: center">HURRY UP!!!!</h2>
            <h3 style="color: white;text-align: center">Invite 14 friends on Whatsapp to win PSL final tickets....</h3>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <form class="" method="post" action="{{url('/psl_store')}}">
                <input type="hidden" name="_token" value="{{(csrf_token())}}" />

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                            @if ($errors->has('name'))
                                <span class="help-block alert alert-danger">
                                    <strong>The name field is required.</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                            @if ($errors->has('email'))
                                <span class="help-block alert alert-danger">
                                    <strong>The email field is required.</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="cols-sm-2 control-label">Contact Number</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="contact" id="number"  placeholder="Enter your Contact Number"/>
                            @if ($errors->has('contact'))
                                <span class="help-block alert alert-danger">
                                    <strong>The contact field is required.</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="cols-sm-2 control-label">Date of Birth</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="date" class="form-control" name="dfb" id="date"  placeholder="Enter your Date of birth"/>
                            @if ($errors->has('dfb'))
                                <span class="help-block alert alert-danger">
                                    <strong>The Date of birth field is required.</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>



                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>


<script src="{{ URL::to('/') }}/pslticket/js/jquery-2.1.4.min.js"></script>
<script src="{{ URL::to('/') }}/pslticket/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){

            $('#download').show();
    });
</script>
</body>
</html>