@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Edit Services</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/services_details"><h2><span class="fa fa-arrow-circle-o-left"></span>Edit Services</h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <!-- START VALIDATIONENGINE PLUGIN -->
                    <div class="block">
                        @foreach ($services as $key => $item)
                        <form action="{{url('/services_edit_store',$item->id)}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                            @if($item->image == "null")
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Images:</label>
                                    <input type="file" name="image" value="upload">
                                    {{--<div class="col-md-6">--}}
                                        {{--<input type="file" class="file" name="image"  data-preview-file-type="any"/>--}}
                                    {{--</div>--}}
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <img src="{{ URL::to('/') }}/uploads/{{ $item->image }}" width="200"
                                             height="200" alt="">
                                        <a href="/services_delete_null/{{$item->id}}/null"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>

                                    </div>
                                </div>

                            @endif
                            <div class="form-group">
                                <label class="col-md-3 control-label">Services Name:</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $item->name }}" name="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The sale tag field is required.</strong>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Published:</label>
                                <div class="col-md-3">
                                    <select class="form-control select"  name="status">
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
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection






