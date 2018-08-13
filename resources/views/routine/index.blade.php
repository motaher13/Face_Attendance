@extends("layouts.app")

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                {{--<div class="portlet-title">--}}
                    {{--<div class="caption font-dark">--}}
                        {{--<span class="caption-subject bold uppercase"> Routine</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="portlet-body">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Choose Session & Day</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <form method="POST" id="myform" action="{{route('routine.indexUpdate')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form" >
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="form-group col-sm-5">
                                    <label for="session" class="control-label col-sm-3">Session</label>
                                    <div class="col-sm-9">
                                        <select name="batch_session" id="session"  class=" form-control">
                                            @if(count($routines))
                                                <option selected value={{$sessions[0]}} >{{$sessions[0]}}</option>
                                                @for($i=1;$i<sizeof($sessions);$i++)
                                                <option value={{$sessions[$i]}} >{{$sessions[$i]}}</option>
                                                @endfor
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="day" class="control-label col-sm-3">Day</label>
                                    <div class="col-sm-9">
                                        <select name="day" id="day"  class=" form-control">
                                            <option selected value="Sunday" >Sunday</option>
                                            <option value="Monday" >Monday</option>
                                            <option value="Tuesday" >Tuesday</option>
                                            <option value="Wednesday" >Wednesday</option>
                                            <option value="Thursday" >Thursday</option>
                                            <option value="Friday" >Friday</option>
                                            <option value="Saturday" >Saturday</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-1"><input type="submit" class="btn btn-success" value="submit"></div>
                            </div>

                        </form>

                    </div>

                </div>
                {{--{{ auth()->user()s->render() }}--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Routine</span>
                    </div>

                    @if(auth()->user()->hasRole('admin'))
                            <div class="btn-group pull-right">
                                <a style="margin-right: 10px;" class="btn sbold red deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('routine.delete',10000000) }}" >Delete All <i class="fa fa-remove"></i></a>
                                <a class="btn sbold green" id="sample_editable_1_new" href="{{ route('routine.create') }}" >Add New <i class="fa fa-plus"></i></a>

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

                    @endif

                </div>
                <div class="portlet-body">

                    {{--<div class="table-toolbar">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-2">--}}
                                {{--<div class="caption font-red-sunglo">--}}
                                    {{--<span class="caption-subject bold uppercase"> Choose CSV File</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTable">
                        <thead>
                        <tr>
                            <th> Course code </th>
                            <th> Title </th>
                            {{--<th> day </th>--}}
                            <th> Start Time</th>
                            <th> End Time </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($routines))
                            @foreach($routines as $routine)
                                <tr class="odd gradeX">
                                    <td> {{ $routine->course_code }} </td>
                                    <td> {{ $routine->title }} </td>
                                    {{--<td> {{ $routine->day }} </td>--}}
                                    <td> {{ date("g:i A", strtotime($routine->start_time )) }} </td>
                                    <td> {{ date("g:i A", strtotime($routine->end_time )) }} </td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                @if(auth()->user()->hasRole("admin"))
                                                <li>
                                                    <a href="{{ route('routine.update',$routine->id) }}">
                                                        <i class="icon-tag"></i> Update </a>
                                                </li>
                                                <li>
                                                    <a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('routine.delete', $routine->id) }}">
                                                        <i class="icon-tag"></i> Delete </a>
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

    {{--width: 50%;border: 2px solid black;--}}

@stop

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">


@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>


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

    <script>
        $(function(){
            $('#myform').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: $('#myform').attr('action'),
                    type: "POST",
                    data: $('#myform').serialize(),
                    dataType : 'json',
                    success: function(data){
                        var abul=JSON.parse(data['data']);

                        var i=0;
                        var j=abul.length;

                        var mydata=[];
                        for(i=0;i<j;i++){
                            var k='<div class="btn-group"> <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu pull-left" role="menu"> @if(auth()->user()->hasRole("admin")) <li> <a href="/routine/update/'+abul[i].id+'"> <i class="icon-tag"></i> Update </a> </li> <li> <a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="/routine/update/'+abul[i].id+'"> <i class="icon-tag"></i> Delete </a> </li> @endif </ul> </div>';
                            var row=[abul[i].course_code,abul[i].title,abul[i].start_time,abul[i].end_time,k];
                            mydata.push(row);
                        }

                        $('#dataTable').dataTable().fnClearTable();
                        if(mydata.length>0)
                            $('#dataTable').dataTable().fnAddData(mydata);

                    },
                    error: function(data) {
                        alert("fail");

                    }
                });
            });
        });
    </script>

@endsection