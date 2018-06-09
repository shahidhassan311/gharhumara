@extends('layouts.adminpanel_layout')

@section('content')
    <!-- START PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('layouts.admin_topbar')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Address Book</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-users"></span> Address Book
                <small>139 contacts</small>
            </h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Use search to find contacts. You can search by: name, address, phone. Or use the advanced
                                search.</p>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-search"></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                   placeholder="Who are you looking for?"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Add
                                            new contact
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                @foreach ($services as $key => $item)
                    <div class="col-md-3">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <img src="{{ URL::to('/') }}/uploads/{{ $item->image }}" style="width: 80%;height: 135px;" alt="{{ $item->name }}"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ $item->name }}</div>
                                <div class="profile-data-title">
                                    <button class="btn btn-success">Active</button>
                                </div>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="contact-info">
                                <p>
                                    <small>Details</small>
                                    <br/>{{ $item->details }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTACT ITEM -->
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection






