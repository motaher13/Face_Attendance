@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('user') }}
    {{--Route::currentRouteName()--}}


    @if(Route::currentRouteName()=="course.scheduled")
        <div class="container" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="text-align: center">
                    <div class="panel panel-default">
                        <div class="panel-heading">Calendar</div>
                        <div class="panel-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <table id="legend" >

                    </table>
                </div>
            </div>

        </div>

    @endif

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
                                    <span class="caption-subject bold uppercase"> List of Courses </span>
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('tutor'))
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <a class="btn sbold green" id="sample_editable_1_new" href="{{ route('course.create') }}" >Add New <i class="fa fa-plus"></i></a>

                                        <!-- <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                           <li>
                                              <a href="javascript:;">
                                              <i class="fa fa-print"></i> Print </a>
                                           </li>
                                           <li>
                                              <a href="javascript:;">
                                              <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                           </li>
                                           <li>
                                              <a href="javascript:;">
                                              <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                           </li>
                                        </ul> -->
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTable">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th> Category Name</th>
                            <th> Length </th>
                            {{--<th> Details </th>--}}
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($courses))
                            @foreach($courses as $course)
                                <tr class="odd gradeX">
                                    <td> {{ $course->id }} </td>
                                    <td> {{ $course->title }} </td>
                                    <td> {{ $course->course_category->name }} </td>
                                    <td> {{ $course->length }}</td>

                                    {{--<td class="center"> {{ auth()->user()->created_at->toFormattedDateString() }} </td>--}}
                                    {{--<td> <a href="{{ route('user.show', auth()->user()->id) }}" class="btn btn-xs btn-success">Details</a> </td>--}}
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{!! route('course.details', $course->id) !!}">
                                                        <i class="icon-docs"></i> Details </a>
                                                </li>
                                                @if(auth()->user()->hasRole('selfteach'))
                                                    <li>
                                                        <a href="{!! route('course.enrol', $course->id) !!}">
                                                            <i class="icon-docs"></i> Enrol </a>
                                                    </li>
                                                @endif

                                                @if(auth()->user()->hasRole('admin'))
                                                    <li>
                                                        <a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('course.delete', $course->id) }}">
                                                            <i class="icon-tag"></i> Delete </a>
                                                    </li>
                                                @endif
                                                @if(auth()->user()->hasRole('business'))
                                                    <li>
                                                        <a href="{!! route('course.enrol_employee', [$course->id] )!!}">
                                                            <i class="icon-docs"></i> Enrol Employees</a>
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




    {{--details modal--}}

    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="details_header">abul</h4>
                </div>
                <div class="modal-body" id="details_body">

                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') !!}">
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
    <script type="text/javascript" src="{!! asset('assets/global/plugins/fullcalendar/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>
    <!-- for Datatable -->


    {{--@if(Route::currentRouteName()=="course.scheduled")--}}
    {{--{!! $calendar->script() !!}--}}
    {{--@endif--}}


    <script type="text/javascript">
        @php
            $background=["0073e6","003399","0099ff","6666ff","0000b3","9966ff","cc00cc","660066","3d5c5c","267326","03300","cc9900","cc3300","990000"];
            $txt=[];
        @endphp

        $(document).ready(function() {
            $('#dataTable').dataTable({
                "order": [[ 1, "asc" ]]
            });


            $(document).on("click", ".deleteBtn", function() {
                console.log('pppp');
                var deleteUrl = $(this).attr('deleteUrl');
                $(".deleteForm").attr("action", deleteUrl);
            });



            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                weekMode: 'liquid',
                weekends: true,

                eventSources: [
                    @php
                        $i=0;
                    @endphp
                    // your event source
                    {
                        events: [ // put the array in the `events` property

                                @if(Route::currentRouteName()=="course.scheduled")
                                @foreach ($courses as $course)
                            {
                                title  : '{{$course->title}}',
                                start  : '{{$course->running_course->start_date}}',
                                end    : '{{$course->running_course->end_date}}',
                                id    : '{{$course->id}}',
                                description: '{!! $course->short_description !!}',
                                color: '#'+'{{$background[$i%14]}}',
                            },
                            @php
                                $txt[$i]=$course->title;
                                $i++;
                            @endphp
                            @endforeach
                            @endif
                        ],
                        // color: '#f05050',

                    },

                ],

                eventClick: function(event) {

                    $("#details_header").text(event.title);
                    $("#details_body").html(event.description);
                    $("#details").modal('show');

                },
            });
            @for($x=0;$x<$i;$x++)
                var element='<tr><td bgcolor="{{$background[$x]}}"></td><td>{{$txt[$x]}}</td></tr>';
                $("#legend").append(element);
            @endfor
        });
    </script>

    <script>


    </script>
@endsection