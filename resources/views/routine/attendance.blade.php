@extends('layouts.app')
@section('content')
    {{--    {{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <!-- <div class="portlet-title">
                   <div class="caption font-dark">
                      <i class="icon-settings font-dark"></i>
                      <span class="caption-subject bold uppercase"> Managed Table</span>
                   </div>
                   <div class="actions">
                      <div class="btn-group btn-group-devided" data-toggle="buttons">
                         <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                         <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                         <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                         <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                      </div>
                   </div>
                </div> -->
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="caption font-red-sunglo">
                                    {{--<i class="icon-settings font-red-sunglo"></i>--}}
                                    <span class="caption-subject bold uppercase"> Attendance </span>
                                </div>
                            </div>
                            {{--@if(auth()->user()->hasRole('admin'))--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="btn-group pull-right">--}}
                                        {{--<a class="btn sbold green" id="sample_editable_1_new" href="{{ route('attendance.create') }}" >Add New <i class="fa fa-plus"></i></a>--}}

                                        {{--<!-- <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools--}}
                                        {{--<i class="fa fa-angle-down"></i>--}}
                                        {{--</button>--}}
                                        {{--<ul class="dropdown-menu pull-right">--}}
                                           {{--<li>--}}
                                              {{--<a href="javascript:;">--}}
                                              {{--<i class="fa fa-print"></i> Print </a>--}}
                                           {{--</li>--}}
                                           {{--<li>--}}
                                              {{--<a href="javascript:;">--}}
                                              {{--<i class="fa fa-file-pdf-o"></i> Save as PDF </a>--}}
                                           {{--</li>--}}
                                           {{--<li>--}}
                                              {{--<a href="javascript:;">--}}
                                              {{--<i class="fa fa-file-excel-o"></i> Export to Excel </a>--}}
                                           {{--</li>--}}
                                        {{--</ul> -->--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTable">
                        <thead>
                        <tr>
                            <th> Course </th>
                            <th> Student </th>
                            <th> Session</th>
                            <th> Semester </th>
                            <th> Count </th>
                            {{--<th> Details </th>--}}
                            {{--<th> Actions </th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($attendances))
                            @foreach($attendances as $attendance)
                                <tr class="odd gradeX">
                                    <td> {{ $attendance->course->course_code     }} </td>
                                    <td> {{ $attendance->user->userInfo->name }} </td>
                                    <td> {{ $attendance->course->session }} </td>
                                    <td> {{ $attendance->course->semester }} </td>
                                    <td> {{ $attendance->total }} </td>

                                    {{--<td class="center"> {{ auth()->user()->created_at->toFormattedDateString() }} </td>--}}
                                    {{--<td> <a href="{{ route('user.show', auth()->user()->id) }}" class="btn btn-xs btn-success">Details</a> </td>--}}
                                    {{--<td>--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions--}}
                                                {{--<i class="fa fa-angle-down"></i>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu pull-left" role="menu">--}}

                                                {{--@if(auth()->user()->hasRole('admin'))--}}
                                                    {{--<li>--}}
                                                        {{--<a href="{{ route('attendance.update',$attendance->id) }}">--}}
                                                            {{--<i class="icon-tag"></i> Update </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('attendance.delete', $attendance->id) }}">--}}
                                                            {{--<i class="icon-tag"></i> Delete </a>--}}
                                                    {{--</li>--}}
                                                {{--@endif--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>
                {{--{{ auth()->user()s->render() }}--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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



@endsection

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">
    <style>
        #legend {
            margin-left: 25%;
            width: 50%;
            margin-bottom: 10px;
        }
        #legend table,
        #legend tr,
        #legend td{
            border: 1px solid black;
            border-collapse: collapse;
        }

        #legend td{
            width: 50%;
        }
    </style>
@endsection

@section('scripts')

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>--}}
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>
    <!-- for Datatable -->


    {{--@if(Route::currentRouteName()=="attendance.scheduled")--}}
    {{--{!! $calendar->script() !!}--}}
    {{--@endif--}}


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

    <script>


    </script>
@endsection