@extends('layouts.adminpanel_layout')

@section('content')


    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">dashboard</a></li>
            {{--<li><a href="#">Sales details</a></li>--}}
            <li class="active">Purchase details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>Purchase Details</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Purchase</h3>
                            <ul class="panel-controls">
                                {{--<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>--}}
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                            </ul>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>Property ID</th>
                                    <th>Purchase Tag</th>
                                    <th>Property Name</th>
                                    <th>Amount</th>
                                    <th>Contact</th>
                                    <th>Date/Time</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($purchase as $key => $item)
                                    <tr>
                                        <td>{{ $item->property_id }}</td>
                                        <td>{{ $item->purchase_tag }}</td>
                                        <td>{{ $item->property_name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->created_at->format('d-mY') }} / {{ $item->created_at->format('h:i:s') }}</td>
                                        @if($item->status == 'active')
                                            <td><span class="label label-success">Active</span></td>
                                        @else
                                            <td><span class="label label-danger">Pending</span></td>
                                        @endif
                                        <td>
                                            <a href="/user_purchase_show/{{ $item->purchase_id }}"><button class="btn btn-primary">Show</button></a>
                                            <a href="/user_purchase_request_edit/{{ $item->purchase_id }}"><button class="btn btn-info">Update</button></a>
                                            <a href="/user_purchase_delete/{{ $item->purchase_id }}"><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->

                </div>
            </div>

        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection





