@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="active">Add Purchase Property</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Purchase Property</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-12">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))

                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>
                            <form action="{{url('/user_purchase_req_store')}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tag:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" name="purchase_tag">
                                            <option value="">Choose Tag</option>
                                            <option value="Hot">Hot</option>
                                            <option value="Super Hot">Super Hot</option>
                                            <option value="Features">Features</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Property Name:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="property_name" placeholder="Enter Property Name" class="form-control">
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
                                        <input type="text" name="property_area"  placeholder="Enter Property Area"  class="form-control">
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
                                        <input type="text" name="property_floor" placeholder="Enter Property Floor"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Number of Bedrooms:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="no_of_bedrooms" placeholder="Enter Number of Bedrooms" class="form-control">
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
                                        <input type="text" name="no_of_bathrooms" placeholder="Enter Number of Bathrooms" class="form-control">
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
                                        <input type="text" name="address" placeholder="Enter Property Address" class="form-control">
                                        @if ($errors->has('address'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The address field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Amount:</label>
                                    <div class="col-md-6">
                                        <input type="tetx" name="amount" placeholder="Enter Property Amount"  class=" form-control">
                                        @if ($errors->has('amount'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The amount field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City:</label>
                                    <div class="col-md-6  ">
                                        <input type="text" name="location" placeholder="Enter Property City" class="form-control">
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
                                        <input type="number" name="contact[]" placeholder="Enter Contact Number" class="form-control">
                                        <div class="form-group add_more"></div>
                                        {{--@if ($errors->has('contact'))--}}
                                        {{--<span class="help-block alert alert-danger">--}}
                                        {{--<strong>The contact field is required.</strong>--}}
                                        {{--</span>--}}
                                        {{--@endif--}}
                                    </div>
                                    <div class="col-md-3">
                                        <button id="btn_in" type="button" class="btn btn-success">Add more</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Property Details:</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="10" placeholder="Enter Property Details" name="details" ></textarea>
                                        @if ($errors->has('details'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The details field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Images:</label>
                                    <div class="col-md-6">
                                        <input type="file" multiple class="file" name="image[]"  data-preview-file-type="any"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Published:</label>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="status">
                                            <option value="">Choose option</option>
                                            <option value="active">Yes</option>
                                            <option value="deactive">No</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The published field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Site:</label>--}}
                                {{--<div class="col-md-6 control-label">--}}
                                {{--<input type="file" multiple id="file-simple"/>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<label class="checkbox">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" class="validate[required]" name="terms" value="1"> Yes, I accept your terms and conditions.--}}
                                {{--</label>--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                <div class="btn-group pull-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->

                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection






