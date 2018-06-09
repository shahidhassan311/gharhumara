@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="active">Update Property</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Update Property</h2>
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
                            <div class="form-group">
                                @foreach ($bahria as $key => $items)
                                    <?php $main_id = $items->id  ; ?>
                                <label class="col-md-3 control-label"></label>
                                @foreach ($bahria_images as $key => $item)
                                    <img src="{{ URL::to('/') }}/uploads/{{ $item->images }}" height="200" width="200" alt="">
                                    <a href="/website_bahria_images_delete/{{$item->id}}/{{ $main_id }}"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                                @endforeach
                                @endforeach
                            </div>

                            @foreach ($bahria as $key => $items)
                                <?php $main_id = $items->id  ; ?>
                            <form action="{{url('/bahria_update_store',$items->id)}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                <input type="hidden" value="{{url()->current()}}" name="type">
                                <input type="hidden" value="{{ $main_id }}" name="in_id">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tag:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tag" value="{{ $items->tag }}"  placeholder="Enter Property Tag" class="form-control">
                                        @if ($errors->has('tag'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The Property tag field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Property Name:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="property_name" value="{{ $items->property_name }}" placeholder="Enter Property Name" class="form-control">
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
                                        <input type="text" name="property_area"  value="{{ $items->property_area }}" placeholder="Enter Property Area"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Property Floor:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="property_floor" value="{{ $items->property_floor }}" placeholder="Enter Property Floor"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Number of Bedrooms:</label>
                                    <div class="col-md-6">
                                        <input type="number" name="no_of_bedrooms" value="{{ $items->no_of_bedrooms }}" placeholder="Enter Number of Bedrooms" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Number of Bathrooms:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="no_of_bathrooms" value="{{ $items->no_of_bathrooms }}" placeholder="Enter Number of Bathrooms" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address"  value="{{ $items->address }}" placeholder="Enter Property Address" class="form-control">
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
                                        <input type="number" name="amount" value="{{ $items->amount }}" placeholder="Enter Property Amount"  class=" form-control">
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
                                        <input type="text" name="location" value="{{ $items->location }}" placeholder="Enter Property City" class="form-control">
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
                                        <input type="number" name="contact" value="{{ $items->contact }}"  placeholder="Enter Contact Number" class="form-control">
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
                                        <textarea class="form-control" rows="10" placeholder="Enter Property Details" name="details" >{{ $items->details }}</textarea>
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
                                        <input type="file" multiple class="file" name="images[]"  data-preview-file-type="any"/>
                                    </div>
                                </div>

                                <div class="btn-group pull-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
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
@endsection






