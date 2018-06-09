@extends('layouts.adminpanel_layout')

@section('content')


    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            {{--<li><a href="#">Sales details</a></li>--}}
            <li class="active">Services Message</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/dashboard"><h2><span class="fa fa-arrow-circle-o-left"></span></h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Services Message</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date/Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($services as $key => $item)
                                        <tr>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->service_type }}</td>
                                            <td><p>{{ $item->message }}</p></td>
                                            <td>{{ $item->created_at }}</td>

                                            <td>
                                                <a href="/services_message_delete/{{ $item->id }}"><button class="btn btn-danger" onclick="add({{ $item->id}})">Delete</button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

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





