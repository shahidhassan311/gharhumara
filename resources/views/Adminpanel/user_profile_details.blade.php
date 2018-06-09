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
            @foreach ($users_detail as $key => $item)
                <h2><span class="fa fa-arrow-circle-o-left"></span>  {{ $item->name }}</h2>
            @endforeach

        </div>
        <!-- END PAGE TITLE -->




        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Sale</a></li>
                        <li><a data-toggle="tab" href="#menu1">Purchase</a></li>
                        <li><a data-toggle="tab" href="#menu2">Rent</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Property ID</th>
                                        <th>Sales Tag</th>
                                        <th>Address</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>More</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $key => $item)
                                        <tr>
                                            <td>{{ $item->property_id }}</td>
                                            <td>{{ $item->sale_tag }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>@if($item->status == 'active')
                                                    <span class="label label-success">  {{ $item->status }}  </span>
                                                @else
                                                    <span class="label label-danger">  {{ $item->status }}  </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/user_profile_sale_full_details/{{ $item->sale_id }}"><button class="btn btn-success"> More Details</button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Property ID</th>
                                        <th>Purchase Tag</th>
                                        <th>Address</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        {{--<th>Published</th>--}}
                                        <th>More</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users_purchase as $key => $item)
                                        <tr>
                                            <td>{{ $item->property_id }}</td>
                                            <td>{{ $item->purchase_tag }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>@if($item->status == 'active')
                                                    <span class="label label-success">  {{ $item->status }}  </span>
                                                @else
                                                    <span class="label label-danger">  {{ $item->status }}  </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/user_profile_purchase_full_details/{{ $item->purchase_id }}"><button class="btn btn-success"> More Details</button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Property ID</th>
                                        <th>Rent Tag</th>
                                        <th>Address</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>status</th>
                                        <th>More</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users_rent as $key => $item)
                                        <tr>
                                            <td>{{ $item->property_id }}</td>
                                            <td>{{ $item->rent_tag }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>@if($item->status == 'active')
                                               <span class="label label-success">  {{ $item->status }}  </span>
                                                @else
                                                <span class="label label-danger">  {{ $item->status }}  </span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="/user_profile_rent_full_details/{{ $item->rent_id }}"><button class="btn btn-success"> More Details</button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection





