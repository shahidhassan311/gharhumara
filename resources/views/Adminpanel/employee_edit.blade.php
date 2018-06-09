@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Edit Employee</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/employee_details"><h2><span class="fa fa-arrow-circle-o-left"></span>Edit Employee</h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <!-- START VALIDATIONENGINE PLUGIN -->
                    <div class="block">
                        @foreach ($employee as $key => $item)
                        <form action="{{url('/employee_edit_store',$item->id)}}" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">Refferal id:</label>
                                <div class="col-md-6">
                                    <input type="number" name="refferal_id" value="{{ $item->refferal_id }}" class="form-control">
                                    @if ($errors->has('refferal_id'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The refferal id field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Username:</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The name field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" value="{{ $item->address }}" class="form-control">
                                    @if ($errors->has('address'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The address field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact:</label>
                                <div class="col-md-6">
                                    <input type="number" name="contact" value="{{ $item->contact }}" class="form-control">
                                    @if ($errors->has('contact'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The contact field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email:</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{ $item->email }}" class="form-control">
                                    @if ($errors->has('email'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The email field is required.</strong>
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
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection






