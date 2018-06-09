@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Sales Record</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href=""><h2><span class="fa fa-arrow-circle-o-left"></span>Sales Record</h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-12">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block">
                            {{--<h4>Validation Engine</h4>--}}
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                @foreach ($users1 as $key => $items)
                                    <img src="{{ URL::to('/') }}/uploads/{{ $items->images }}" height="200" width="200" alt="">
                                    {{--                                <a href="{{$items->sales_id}}"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>--}}
                                @endforeach
                            </div>

                            @foreach ($users as $key => $item)
                                <form  role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tag:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->sale_tag }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->address }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Amount:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->amount }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->location }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->contact }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Property Details:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->details }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Published:</label>
                                        <div class="col-md-6" style="padding-top: 6px;">
                                            <span >{{ $item->status }}</span>
                                        </div>
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






