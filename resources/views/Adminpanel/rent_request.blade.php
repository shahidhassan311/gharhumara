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
            <li class="active">Rent details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>Rent Details</h2>
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
                            <h3 class="panel-title">Rent</h3>
                            <a href="/user_rent_req"><button class="btn btn-success" style="margin-left: 26px;">  Add Rent Property </button></a>
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
                                    <th>Property ID</th>
                                    <th>Rent Tag</th>
                                    <th>Property Name</th>
                                    <th>Rent Amount</th>
                                    <th>Advanced Amount</th>
                                    <th>Contact</th>
                                    <th>Date/Time</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($rent as $key => $item)
                                    <tr>
                                        <td>
                                            <a href="/find_rent_users_profile/{{ $item->property_id }}" title="Click to User Profile" style="color: black;"><b>{{ $item->property_id }}</b></a>
                                        </td>
                                        <td>{{ $item->rent_tag }}</td>
                                        <td>{{ $item->property_name }}</td>
                                        <td>{{ $item->rent_amount }}</td>
                                        <td>{{ $item->advanced_amount }}</td>
                                        <?php $val = explode(',',$item->contact);
                                        $i = 0;
                                        ?>
                                        <td>
                                            @foreach($val as $value)
                                                @if(!empty($value))
                                                    <b>({{ $i+1 }}) </b>
                                                    {{ $value }}
                                                @endif
                                                <?php $i++ ; ?>
                                            @endforeach
                                        </td>
                                        <td>{{ $item->created_at->format('d-m-Y') }} / {{ $item->created_at->format('h:i:s') }}</td>
                                        <td>@if($item->status == 'active')
                                                <a href="/admin_rent_status/{{$item->rent_id}}/{{$item->status}}" class="button1 sideviewtoggle myButton btn btn-success" style="width:78%;">Active</a>
                                            @else
                                                <a  href="/admin_rent_status/{{$item->rent_id}}/{{$item->status}}" class="button2 sideviewtoggle myButton btn btn-danger">Deactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin_rent_details_show/{{ $item->rent_id }}"><button class="btn btn-primary">Show</button></a>
                                            <a href="/admin_rent_edit_get/{{ $item->rent_id }}"><button class="btn btn-info">Update</button></a>
                                            <a href="/admin_rent_delete/{{ $item->rent_id }}"><button class="btn btn-danger"  onclick="add({{ $item->rent_id}})">Delete</button></a>
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
    <script type="text/javascript">
        function add(id) {
            var txt;
            if (confirm("Are You Sure Want To Delete!") == true) {
//                alert (id)
            } else {

            }
            document.getElementById("demo").innerHTML = txt;
        }
    </script>

@endsection





