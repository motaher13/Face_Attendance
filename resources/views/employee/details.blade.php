@extends('layouts.app')
@section('content')
    {{--{{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Employee's Profile</span>
                    </div>
                    {{--<div class="pull-right">--}}
                    {{--@if(auth()->user()->hasRole('selfteach'))--}}
                    {{--<a class="btn btn-success" href="{{route('course.enrol',$course->id)}}">Enrol</a>--}}
                    {{--@elseif(auth()->user()->hasRole('business'))--}}
                    {{--<a class="btn btn-success" href="{{route('course.enrol_employee',$course->id)}}">Enrol Employees</a>--}}
                    {{--@endif--}}
                    {{--</div>--}}


                </div>

                <div class="portlet-body">
                    <div class="row">
                        <p class="col-md-1">Name</p>
                        <p class="col-lg-6">{{$user->userInfo->name}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-1">Email</p>
                        <p class="col-lg-6">{{$user->email}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-1">Phone</p>
                        <p class="col-lg-6">{{$user->userInfo->phone}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-1">Address</p>
                        <p class="col-lg-6">{{$user->userInfo->address}}</p>
                    </div>
                </div>

            </div>


            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-asterisk" id="icon"></i>
                        <span class="caption-subject bold uppercase"> Educational Details</span>
                    </div>
                </div>

                <div class="portlet-body hidden" id="edu">
                    <div class="row">
                        <p class="col-md-1">Institution</p>
                        @if(isset($user->education->institution))
                            <p class="col-lg-6">{{$user->education->institution}}</p>
                        @else
                            <p class="col-lg-6">not provided</p>
                        @endif
                    </div>

                    <div class="row">
                        <p class="col-md-1">Degree</p>
                        @if(isset($user->education->degree_name))
                            <p class="col-lg-6">{{$user->education->degree_name}}</p>
                        @else
                            <p class="col-lg-6">not provided</p>
                        @endif
                    </div>

                    <div class="row">
                        <p class="col-md-1">Session</p>
                        @if(isset($user->education->session))
                            <p class="col-lg-6">{{$user->education->session}}</p>
                        @else
                            <p class="col-lg-6">not provided</p>
                        @endif
                    </div>

                </div>

            </div>


            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'Past')">Finished Courses</button>
                        <button class="tablinks" onclick="openCity(event, 'Present')">Running Courses</button>
                        <button class="tablinks" onclick="openCity(event, 'Future')">Future Courses</button>
                    </div>

                </div>

                <div class="portlet-body">
                    <div id="Past" class="tabcontent" style="display: block">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="dataTable">
                            <thead>
                            <tr>
                                <th> Course Name</th>
                                <th> Course Category</th>
                                <th> Length</th>
                                <th> Result</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                @if($course->status==true)
                                    <tr class="odd gradeX">
                                        <td> {{ $course->title }} </td>
                                        <td> {{ $course->name }} </td>
                                        <td> {{ $course->length }}</td>
                                        <td> {{ $course->result }} </td>

                                    </tr>
                                @endif

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="Present" class="tabcontent">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="dataTable">
                        <thead>
                        <tr>
                            <th> Course Name</th>
                            <th> Course Category</th>
                            <th> Length</th>
                            <th> Start Date</th>
                            <th> End Date</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            @if($course->status==false)
                                <tr class="odd gradeX">
                                    <td> {{ $course->title }} </td>
                                    <td> {{ $course->name }} </td>
                                    <td> {{ $course->length }}</td>
                                    <td> {{ $course->start_date }}</td>
                                    <td> {{ $course->end_date }}</td></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                {{--<li>--}}
                                                    {{--<a href="{!! route('course.details', $course->id) !!}">--}}
                                                        {{--<i class="icon-docs"></i> Details </a>--}}
                                                {{--</li>--}}

                                                    <li>
                                                        <a class="deleteBtn" href="#" data-toggle="modal"
                                                           data-target="#deleteConfirm"
                                                           deleteUrl="{{ route('course.enrolled_remove', $course->id) }}">
                                                            <i class="icon-tag"></i> Remove </a>
                                                    </li>


                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                        </tbody>
                    </table>
                </div>

                <div id="Future" class="tabcontent">
                    <p>lkdsfj ldsk fjad;sl kfja dslkfj s;dlak jsl kajdsl aj sd;l</p>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete?
                    </div>
                    <div class="modal-footer">
                        <form class="deleteForm" method="POST" action="/" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <input class="btn btn-primary" type="submit" value="Yes, Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        $(document).ready(function () {
            $("#icon").click(function () {
                console.log("sldf");
                if ($("#edu").hasClass("hidden")) {
                    $("#edu").removeClass("hidden");
                }
                else {
                    $("#edu").addClass("hidden");
                }

            });
        });

    </script>

    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>
    <!-- for Datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').dataTable({
                "order": [[ 1, "asc" ]]
            });
            $(document).on("click", ".deleteBtn", function() {
                console.log('pppp');
                var deleteUrl = $(this).attr('deleteUrl');
                $(".deleteForm").attr("action", deleteUrl);
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">

@endsection

