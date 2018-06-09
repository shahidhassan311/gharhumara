@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Purchase Sale Edit</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/user_purchase_request"><h2><span class="fa fa-arrow-circle-o-left"></span> User Purchase Edit</h2></a>
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
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                @foreach ($purchase1 as $key => $items)
                                    <img src="{{ URL::to('/') }}/uploads/{{ $items->images }}" height="200" width="200" alt="">
                                    {{--                                <a href="{{$items->sales_id}}"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>--}}
                                @endforeach
                            </div>
                            @foreach ($purchase as $key => $item)
                                <form action="{{url('/user_purchase_request_store',$item->purchase_id)}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                    <input type="hidden" name="property_id" value="{{ $item->property_id }}">
                                    <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                    <input type="hidden" name="purchase_id" value="{{ $item->purchase_id }}">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tag:</label>
                                        <div class="col-md-6">
                                            <select class="form-control select" name="purchase_tag" value="{{ $item->purchase_tag }}" {{ $item->purchase_tag == '' ? 'selected="selected"' : '' }}>
                                                <option value="">Choose Tag</option>
                                                <option value="Hot" {{ $item->purchase_tag == 'Hot' ? 'selected="selected"' : '' }}>Hot</option>
                                                <option value="Super Hot"  {{ $item->purchase_tag == 'Super Hot' ? 'selected="selected"' : '' }}>Super Hot</option>
                                                <option value="Features"  {{ $item->purchase_tag == 'Features' ? 'selected="selected"' : '' }}>Features</option>
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
                                        <label class="col-md-3 control-label">Amount:</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="{{ $item->amount }}" name="amount" class=" form-control">
                                            @if ($errors->has('amount'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The amount field is required.</strong>
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
                                            <textarea class="form-control"  name="details" >{{ $item->details }}</textarea>
                                            @if ($errors->has('details'))
                                                <span class="help-block alert alert-danger">
                                                <strong>The details field is required.</strong>
                                            </span>
                                            @endif
                                        </div>z
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Images:</label>

                                        @foreach ($purchase1 as $key => $items)
                                            <input type="hidden" name="image1[]"  value="{{$items->images}}">
                                        @endforeach
                                        <div class="col-md-6">
                                            <input type="file" multiple class="file" name="image[]"  data-preview-file-type="any"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Published:</label>
                                        <div class="col-md-3">
                                            <select class="form-control select"  name="status">
                                                <option value="" >Choose option</option>
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

                                    @endforeach
                                    <a href="/user_sale_request"><button class="btn btn-danger btn-group pull-right">Cancel</button></a>
                                    <div class="btn-group pull-right" style="padding-right: 4px;">
                                        <button class="btn btn-primary"  type="submit">Update</button>
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






