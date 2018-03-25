@extends('layouts.app')
@section('content')


    {{--{{ Breadcrumbs::render(Route::currentRouteName()) }}--}}

    <!-- BEGIN PAGE TITLE-->

    <div class="row">
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Created Courses</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active">

                                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                           id="dataTable">


                                        <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th> Title</th>
                                            <th> Category Name</th>
                                            <th> Length</th>
                                            <th> Type</th>
                                            {{--<th> Details </th>--}}
                                            <th> Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr class="odd gradeX">
                                                <td> {{ $course->id }} </td>
                                                <td> {{ $course->title }} </td>
                                                <td> {{ $course->course_category->name }} </td>
                                                <td> {{ $course->length }}</td>
                                                <td> {{ $course-> type}}</td>

                                                {{--<td class="center"> {{ $user->created_at->toFormattedDateString() }} </td>--}}
                                                {{--<td> <a href="{{ route('user.show', $user->id) }}" class="btn btn-xs btn-success">Details</a> </td>--}}
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button"
                                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="{!! route('course.details', $course->id) !!}">
                                                                    <i class="icon-docs"></i> Details </a>
                                                            </li>

                                                            <li>
                                                                <a class="deleteBtn" href="#" data-toggle="modal"
                                                                   data-target="#deleteConfirm"
                                                                   deleteUrl="{{ route('course.delete', $course->id) }}">
                                                                    <i class="icon-tag"></i> Delete </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <!-- END PERSONAL INFO TAB -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet"
          href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript"
            src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>
    <!-- for Datatable -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').dataTable({
                "order": [[1, "asc"]]
            });
            $(document).on("click", ".deleteBtn", function () {
                console.log('pppp');
                var deleteUrl = $(this).attr('deleteUrl');
                $(".deleteForm").attr("action", deleteUrl);
            });
        });
    </script>

@endsection