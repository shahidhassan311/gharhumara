@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">User Sale Edit</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/user_sale_request"><h2><span class="fa fa-arrow-circle-o-left"></span> User Sale Edit</h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-12">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block">
                            {{--<h4>Validation Engine</h4>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label"></label>--}}
                                {{--<div id="rent_images"></div>--}}
                            {{--</div>--}}
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))

                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                @foreach ($rent as $key => $items)
                                    <?php $main_id = $items->rent_id  ; ?>
                                    <label class="col-md-3 control-label"></label>
                                    @foreach ($rent1 as $key => $item)
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" height="200" width="200" alt="">
                                        <a href="/admin_rent_images_delete/{{$item->id}}/{{ $main_id }}"><i class="fa fa-times fa-2x" aria-hidden="true" style="    position: absolute;margin-left: -21px;color: black;"></i></a>
                                    @endforeach
                                @endforeach
                            </div>
                            @foreach ($rent as $key => $item)
                                <?php $rent_id = $item->rent_id ; ?>
                                <form action="{{url('/admin_rent_store',$item->rent_id)}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tag:</label>
                                        <div class="col-md-6">
                                            <select class="form-control select" name="rent_tag" value="{{ $item->rent_tag }}" {{ $item->rent_tag == '' ? 'selected="selected"' : '' }}>
                                                <option value="">Choose Tag</option>
                                                <option value="Hot" {{ $item->rent_tag == 'Hot' ? 'selected="selected"' : '' }}>Hot</option>
                                                <option value="Super Hot"  {{ $item->rent_tag == 'Super Hot' ? 'selected="selected"' : '' }}>Super Hot</option>
                                                <option value="Features"  {{ $item->rent_tag == 'Features' ? 'selected="selected"' : '' }}>Features</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Property Name:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->property_name }}" name="property_name" class="form-control">
                                            @if ($errors->has('property_name'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>The Property Name field is required.</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Property Area:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->property_area }}" name="property_area" class="form-control">
                                            @if ($errors->has('property_area'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>The Property Area field is required.</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Property Floor:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->property_floor }}" name="property_floor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number of Bedrooms:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->no_of_bedrooms }}" name="no_of_bedrooms" class="form-control">
                                            @if ($errors->has('no_of_bedrooms'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>The Number of Bedrooms field is required.</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number of Bathrooms:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->no_of_bathrooms }}" name="no_of_bathrooms" class="form-control">
                                            @if ($errors->has('no_of_bathrooms'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>The Number of Bathrooms field is required.</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $item->address }}" name="address" class="form-control">
                                            @if ($errors->has('address'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>The address field is required.</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Rent Amount:</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="{{ $item->rent_amount }}" name="rent_amount" class=" form-control">
                                            @if ($errors->has('rent_amount'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The Rent amount field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Advanced Amount:</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="{{ $item->advanced_amount }}" name="advanced_amount" class=" form-control">
                                            @if ($errors->has('advanced_amount'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The Advanced amount field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>
                                        <div class="col-md-6  ">
                                            <input type="text" value="{{ $item->location }}" name="location" class="form-control">
                                            @if ($errors->has('location'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The location field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact:</label>
                                        <div class="col-md-6">
                                            <input type="number" value="{{ $item->contact }}" name="contact" class="form-control">
                                            @if ($errors->has('contact'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The contact field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Property Details:</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="10" name="details" >{{ $item->details }}</textarea>
                                            @if ($errors->has('details'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The details field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Images:</label>
                                        {{--@foreach ($users1 as $key => $items)--}}
                                        {{--<input type="hidden" name="image[]"  value="{{$items->images}}">--}}
                                        {{--@endforeach--}}
                                        <div class="col-md-6">
                                            <input type="file" multiple class="file" name="image[]"  data-preview-file-type="any"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Published:</label>
                                        <div class="col-md-3">
                                            <select class="form-control select" value="{{ $item->status }}" {{ $item->status == '' ? 'selected="selected"' : '' }} name="status">
                                                <option value="">Choose option</option>
                                                <option value="active" {{ $item->status == 'active' ? 'selected="selected"' : '' }}>Yes</option>
                                                <option value="deactive" {{ $item->status == 'deactive' ? 'selected="selected"' : '' }}>No</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The published field is required.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <a href="/user_rent_request"><button class="btn btn-danger btn-group pull-right">Cancel</button></a>
                                    <div class="btn-group pull-right" style="padding-right: 4px;">
                                        <button class="btn btn-primary"  type="submit">Update</button>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->

    <script>
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rent_images").innerHTML = this.responseText;
            }
        };
        xhttp1.open("GET","/admin_rent_display_images_ajax?rent_id=<?php echo $rent_id; ?>",true);
        xhttp1.send();
    </script>
@endsection





