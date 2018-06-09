@extends('layouts.adminpanel_layout')

@section('content')

    <!-- PAGE CONTENT -->
    <div class="page-content">
        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START WIDGETS -->
            <div class="row">
                @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                <div class="col-md-3">

                    <!-- START WIDGET SLIDER -->

                        <div class="widget widget-default widget-carousel">
                            <div class="owl-carousel" id="owl-example">
                                <div>
                                    <div class="widget-title">Users</div>
                                    <div class="widget-int">{{ $users }}</div>
                                </div>
                                <div>
                                    <div class="widget-title">Employee</div>
                                    <div class="widget-int">{{ $employee }}</div>
                                </div>
                                <div>
                                    <div class="widget-title">Services</div>
                                    <div class="widget-int">{{ $services }}</div>
                                </div>
                                <div>
                                    <div class="widget-title">Agent</div>
                                    <div class="widget-int">{{ $agent }}</div>
                                </div>
                            </div>
                        </div>
                    <!-- END WIDGET SLIDER -->

                </div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                <div class="col-md-3">
                    <!-- START WIDGET MESSAGES -->
                    <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                        <div class="widget-item-left">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{ $sales }}</div>
                            <div class="widget-title">Sale Request</div>
                            {{--<div class="widget-subtitle"></div>--}}
                        </div>

                    </div>
                    <!-- END WIDGET MESSAGES -->
                </div>
                <div class="col-md-3">
                    <!-- START WIDGET REGISTRED -->
                    <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{ $purchase }}</div>
                            <div class="widget-title">Purchase Request</div>
                        </div>

                    </div>
                    <!-- END WIDGET REGISTRED -->

                </div>
                <div class="col-md-3">
                    <!-- START WIDGET REGISTRED -->
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{ $rent }}</div>
                            <div class="widget-title">Rent Request</div>
                        </div>

                    </div>
                    <!-- END WIDGET REGISTRED -->

                </div>
                {{--<div class="col-md-3">--}}
                    {{--<!-- START WIDGET REGISTRED -->--}}
                    {{--<div class="widget widget-default widget-item-icon">--}}
                        {{--<div class="widget-item-left">--}}
                            {{--<span class="fa fa-home"></span>--}}
                        {{--</div>--}}
                        {{--<div class="widget-data">--}}
                            {{--<div class="widget-int num-count">{{ $admin_sale_active }}</div>--}}
                            {{--<div class="widget-title">Active Sale Property</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!-- END WIDGET REGISTRED -->--}}

                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<!-- START WIDGET REGISTRED -->--}}
                    {{--<div class="widget widget-default widget-item-icon">--}}
                        {{--<div class="widget-item-left">--}}
                            {{--<span class="fa fa-home"></span>--}}
                        {{--</div>--}}
                        {{--<div class="widget-data">--}}
                            {{--<div class="widget-int num-count">{{ $admin_rent_active }}</div>--}}
                            {{--<div class="widget-title">Active Rent Property</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!-- END WIDGET REGISTRED -->--}}

                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<!-- START WIDGET REGISTRED -->--}}
                    {{--<div class="widget widget-default widget-item-icon">--}}
                        {{--<div class="widget-item-left">--}}
                            {{--<span class="fa fa-home"></span>--}}
                        {{--</div>--}}
                        {{--<div class="widget-data">--}}
                            {{--<div class="widget-int num-count">{{ $admin_purchase_active }}</div>--}}
                            {{--<div class="widget-title">Active Purchase Property</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!-- END WIDGET REGISTRED -->--}}

                {{--</div>--}}
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == "subadmin")
                    <div class="col-md-3">
                        <!-- START WIDGET MESSAGES -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">sales</div>
                                <div class="widget-title"><h2>{{ $sales }}</h2></div>
                                {{--<div class="widget-subtitle"></div>--}}
                            </div>

                        </div>
                        <!-- END WIDGET MESSAGES -->
                    </div>
                    <div class="col-md-3">
                        <!-- START WIDGET MESSAGES -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">Purchase</div>
                                <div class="widget-subtitle"><h2>{{ $purchase }}</h2></div>
                            </div>

                        </div>
                        <!-- END WIDGET MESSAGES -->
                    </div>
                    <div class="col-md-3">
                        <!-- START WIDGET MESSAGES -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">Rent</div>
                                <div class="widget-subtitle"><h2>{{ $rent }}</h2></div>
                            </div>

                        </div>
                        <!-- END WIDGET MESSAGES -->
                    </div>
                @endif
            </div>
            <!-- END WIDGETS -->
            @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
            <div class="row">
                <div class="col-md-12">

                    <!-- START PROJECTS BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Request</h3>
                                {{--<span>Projects activity</span>--}}
                            </div>
                            <ul class="panel-controls" style="margin-top: 2px;">
                                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body panel-body-table">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <th width="20%">Status</th>
                                        <th width="30%">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><strong>Sales</strong></td>
                                        <td><span class="label label-danger">Pending</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $sale_pending }}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sales</strong></td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $sale_active }}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Purchase</strong></td>
                                        <td><span class="label label-danger">Pending</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $purchase_pending }}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Purchase</strong></td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $purchase_active }}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rent</strong></td>
                                        <td><span class="label label-danger">Pending</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $rent_pending }}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rent</strong></td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>
                                            <div class="">
                                                <b>{{ $rent_active }}</b>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- END PROJECTS BLOCK -->


                </div>
            </div>
        @endif

            <!-- START DASHBOARD CHART -->
            <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
            <div class="block-full-width">

            </div>
            <!-- END DASHBOARD CHART -->

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->// documuent wegra styart toh nahi karna ? or bolo :p
@endsection







