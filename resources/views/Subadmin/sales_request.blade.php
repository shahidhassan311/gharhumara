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
            <li class="active">Sales details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>Sales Details</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <h3 class="panel-title">Sales</h3>
                        <a href="/add_sales_sa"><button class="btn btn-success" style="margin-left: 26px;">Add Sales </button></a>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                        </ul>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>Sales Tag</th>
                                    <th>Amount</th>
                                    <th>Contact</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sales as $key => $item)
                                    <tr>
                                        <td>{{ $item->sale_tag }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->contact }}</td>
                                        @if($item->status == 'active')
                                            <td><span class="label label-success">Approved</span></td>
                                        @else
                                            <td><span class="label label-danger">Pending</span></td>
                                        @endif

                                        <td>
                                            <a href="/rent_all_data_sa/{{ $item->sale_id }}"><button class="btn btn-primary">Show</button></a>
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





