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
            <li class="active">Users details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>Users Details</h2>
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
                            <h3 class="panel-title">User</h3>
                            <a href="{{ url('users_downloadExcel/xls') }}"  style="padding-left: 47px;"><button class="btn btn-success">Download Excel xls</button></a>
{{--                            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>--}}
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                            </ul>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>Refferal ID</th>
                                    <th>Username</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Ads Limit</th>
                                    <th>Join Date/Time</th>
                                    <th>Profile</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <td>{{ $item->referral_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->limt_user }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="/user_profile_detail/{{ $item->id }}"><button class="btn btn-success"> Profile</button></a>
                                        </td>
                                        <td>
                                            <a href="/user_edit/{{ $item->id }}"><button class="btn btn-info">Update</button></a>
                                            <a href="/user_delete/{{ $item->id }}"><button class="btn btn-danger">Delete</button></a>
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





