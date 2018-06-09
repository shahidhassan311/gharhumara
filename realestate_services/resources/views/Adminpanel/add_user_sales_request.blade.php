@extends('layouts.adminpanel_layout')

@section('content')

    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>
            <!-- END SEARCH -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            <!-- MESSAGES -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-danger">4</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                        <div class="pull-right">
                            <span class="label label-danger">4 new</span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                            <span class="contacts-title">John Doe</span>
                            <p>Praesent placerat tellus id augue condimentum</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                            <span class="contacts-title">Dmitry Ivaniuk</span>
                            <p>Donec risus sapien, sagittis et magna quis</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                            <span class="contacts-title">Nadia Ali</span>
                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-offline"></div>
                            <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                            <span class="contacts-title">Darth Vader</span>
                            <p>I want my money back!</p>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="pages-messages.html">Show all messages</a>
                    </div>
                </div>
            </li>
            <!-- END MESSAGES -->
            <!-- TASKS -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-tasks"></span></a>
                <div class="informer informer-warning">3</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>
                        <div class="pull-right">
                            <span class="label label-warning">3 active</span>
                        </div>
                    </div>
                    <div class="panel-body list-group scroll" style="height: 200px;">
                        <a class="list-group-item" href="#">
                            <strong>Phasellus augue arcu, elementum</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%
                                </div>
                            </div>
                            <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Aenean ac cursus</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%
                                </div>
                            </div>
                            <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Lorem ipsum dolor</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%
                                </div>
                            </div>
                            <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Cras suscipit ac quam at tincidunt.</strong>
                            <div class="progress progress-small">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100" style="width: 100%;">100%
                                </div>
                            </div>
                            <small class="text-muted">John Doe, 21 Sep 2014 /</small>
                            <small class="text-success"> Done</small>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="pages-tasks.html">Show all tasks</a>
                    </div>
                </div>
            </li>
            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Forms Stuff</a></li>
            <li class="active">File Handling</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> File Handling</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <!-- START VALIDATIONENGINE PLUGIN -->
                    <div class="block">
                        <h4>Validation Engine</h4>
                        <form id="validate" action="/berg_facilites_store" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tag:</label>
                                <div class="col-md-6">
                                    <input type="text" name="sale_tag" class="form-control">
                                    @if ($errors->has('sale_tag'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The sale tag field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" id="password">
                                    @if ($errors->has('address'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The address field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Amount:</label>
                                <div class="col-md-6">
                                    <input type="number" name="amount" class=" form-control">
                                    @if ($errors->has('amount'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The amount field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Location:</label>
                                <div class="col-md-6  ">
                                    <input type="text" name="location" class=" form-control">
                                    @if ($errors->has('location'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The location field is required.</strong>
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
                                <label class="col-md-3 control-label">Property Details:</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="details" ></textarea>
                                    @if ($errors->has('details'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The details field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Images:</label>
                                <div class="col-md-6">
                                    <input type="file" multiple class="file" name="image"  data-preview-file-type="any"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Published:</label>
                                <div class="col-md-3">
                                    <select class="form-control select" name="status">
                                        <option value="">Choose option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block alert alert-danger">
                                            <strong>The published field is required.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Site:</label>--}}
                                {{--<div class="col-md-6 control-label">--}}
                                    {{--<input type="file" multiple id="file-simple"/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<label class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" class="validate[required]" name="terms" value="1"> Yes, I accept your terms and conditions.--}}
                                        {{--</label>--}}
                                    {{--</label>--}}
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
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection






