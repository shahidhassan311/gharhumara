@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="active"> Create Agent</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Create Agent</h2>
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
                            <form action="{{url('/agent_add_store')}}" role="form" class="form-horizontal" method="post">
                                <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                <input type="hidden" value="subadmin" name="role">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Referral ID:</label>
                                    <div class="col-md-6">
                                        <input type="number" name="referral_id" class=" form-control">
                                        @if ($errors->has('referral_id'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The Referral ID field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The name field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact:</label>
                                    <div class="col-md-6">
                                        <input type="number" name="contact" class="form-control">
                                        @if ($errors->has('contact'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The contact field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email Address:</label>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class=" form-control">
                                        @if ($errors->has('email'))
                                            <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Property Limit:</label>
                                    <div class="col-md-6  ">
                                        <input type="text" name="limt_user" class="form-control">
                                        @if ($errors->has('limt_user'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The Property Limit field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control">
                                        @if ($errors->has('password'))
                                            <span class="help-block alert alert-danger">
                                                <strong>The password field is required.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label">Confirm Password:</label>--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<input type="password" name="password_confirmation" class="form-control">--}}
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






