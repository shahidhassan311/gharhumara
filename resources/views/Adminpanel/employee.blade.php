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
            <li class="active">Employee details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <a href="/dashboard"><h2><span class="fa fa-arrow-circle-o-left"></span>Employee Details</h2></a>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Employee</h3>
                            <a href="/employee_add_get"><button class="btn btn-success" style="margin-left: 26px;">Add Employees </button></a>
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
                                    <th>Refferal id</th>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($employee as $key => $item)
                                    <tr>
                                        <td>{{ $item->refferal_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="/employee_edit/{{ $item->id }}"><button class="btn btn-info">Edit</button></a>
                                            <a href="/employee_delete/{{ $item->id }}"><button class="btn btn-danger" onclick="add({{ $item->sid}})">Delete</button></a>
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





