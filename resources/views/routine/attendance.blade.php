@extends('layouts.app')
@section('content')
    {{--    {{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Select Course</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                            <div class="row">

                                <div class="form-group col-sm-5">
                                    <label for="course_id" class="control-label col-sm-3">Course</label>
                                    <div class="col-sm-9">
                                        <select name="course_id" id="course_id"  class=" form-control" onChange="window.location.href=this.value">
                                            @if(count($courses))
                                                <option selected disabled hidden> Select Course</option>
                                                @foreach($courses as $course )
                                                    <option <?php if($course->id==$thiscourse_id){?> selected="selected"<?php } ?>value={{route('attendance.index',$course->id)}} >{{$course->course_code}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                            </div>

                    </div>

                </div>
            </div>
        </div>

    </div>





    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Attendance</span>
                    </div>
                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTable">
                        <thead>
                        <tr>
                            <th> Reg ID </th>
                            <th> Count </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($attendances))
                            @foreach($attendances as $attendance)
                                <tr class="odd gradeX">
                                    <td> {{ $attendance->regid}} </td>
                                    <td> {{ $attendance->total }} </td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">

                                                @if(auth()->user()->hasRole('admin'))
                                                    <li>
                                                        <a href="{{ route('attendance.increase',[$attendance->user_id,$thiscourse_id]) }}">
                                                            <i class="icon-tag"></i> Increase </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('attendance.decrease',[$attendance->user_id,$thiscourse_id]) }}">
                                                            <i class="icon-tag"></i> Decrease </a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </td>
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
                var deleteUrl = $(this).attr('deleteUrl');
                $(".deleteForm").attr("action", deleteUrl);
            });




        });
    </script>

    {{--<script>--}}
        {{--$(function(){--}}
            {{--$('#myform').on('submit', function(e){--}}
                {{--e.preventDefault();--}}
                {{--$.ajax({--}}
                    {{--url: $('#myform').attr('action'),--}}
                    {{--type: "POST",--}}
                    {{--data: $('#myform').serialize(),--}}
                    {{--dataType : 'json',--}}
                    {{--success: function(data){--}}
                        {{--var abul=data['data'];--}}
                        {{--var i=0;--}}
                        {{--var j=abul.length;--}}
                        {{--var mydata=[];--}}
                        {{--for(i=0;i<j;i++){--}}
                            {{--var k='<div class="btn-group"> <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu pull-left" role="menu"> @if(auth()->user()->hasRole("admin")) <li> <a href="/routine/update/'+abul[i].user_id+'"> <i class="icon-tag"></i> Update </a> </li> <li> <a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="/routine/update/'+abul[i].id+'"> <i class="icon-tag"></i> Delete </a> </li> @endif </ul> </div>';--}}
                            {{--var row=[abul[i].regid,abul[i].total];--}}
                            {{--mydata.push(row);--}}
                        {{--}--}}

                        {{--$('#dataTable').dataTable().fnClearTable();--}}
                        {{--if(mydata.length>0)--}}
                            {{--$('#dataTable').dataTable().fnAddData(mydata);--}}
                        {{--alert($('#course_id').val());--}}

                    {{--},--}}
                    {{--error: function(data) {--}}
                        {{--alert("fail");--}}

                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}



@endsection