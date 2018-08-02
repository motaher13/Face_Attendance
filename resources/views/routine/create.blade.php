@extends("layouts.app")

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                   <div class="caption font-dark">
                      <span class="caption-subject bold uppercase"> provide Routine data</span>
                   </div>

                </div>
                <div class="portlet-body">

                    <div style="margin: 0 auto;">

                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Courses code</span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Start Time </span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> End Time </span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Day </span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Classroom </span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="container" style="margin-top: 20px; display: inline;">
                        <form method="POST" id="urlForm" action="{{route('routine.add')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                            {{ csrf_field() }}

                            <div class="row" style="margin-bottom: 10px">

                                <div class="col-md-2">
                                    <select name="course_id[]" id="course_id"  class=" form-control">
                                        <option selected disabled hidden>Course</option>
                                        @foreach($courses as $course)
                                            <option value={{$course->id}} >{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <div class='input-group date datetimepicker3'>
                                        <input type='text' class="form-control" name="start_time[]" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class='input-group date datetimepicker3'>
                                        <input type='text' class="form-control" name="end_time[]" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <select name="day[]"  class=" form-control" required>
                                        <option selected disabled hidden>Day</option>
                                        <option value="Sunday" >Sunday</option>
                                        <option value="Monday" >Monday</option>
                                        <option value="Tuesday" >Tuesday</option>
                                        <option value="Wednesday" >Wednesday</option>
                                        <option value="Thursday" >Thursday</option>
                                        <option value="Friday" >Friday</option>
                                        <option value="Saturday" >Saturday</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" placeholder="Room" name="room[]" type="text" required>
                                </div>
                            </div>

                            <div style="margin-top: 20px;" id="urlSubmit">
                                <i class="fas fa-plus-square" onclick="appendText()" style="font-size:36px; float: right;"></i>

                                <input class="btn btn-success" type="submit" value="submit">
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
                        <span class="caption-subject bold uppercase"> Upload Routine</span>
                    </div>

                </div>
                <div class="portlet-body">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> Choose CSV File</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-4">
                            <form method="post" action="/testupload" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="upload-btn-wrapper">
                                    <button class="btnp">Select a File</button>
                                    <input type="file" name="file" />
                                </div>
                                <p style="text-align: left; margin-top: 20px;">
                                    <input type="submit" value="Upload" class="btn btn-success" />
                                </p>
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>


                </div>
                {{--{{ auth()->user()s->render() }}--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>




    {{--width: 50%;border: 2px solid black;--}}

@stop

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/dropzone/dropzone.min.css') !!}">
    {{--<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btnp {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 40px;
            border-radius: 8px;
            font-size: 15px;
            font-width: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/global/plugins/dropzone/dropzone.min.js') !!}"></script>
    {{--<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function () {
            $('.datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });

        function appendText() {
            var element='<div class="row" style="margin-bottom: 10px"> <div class="col-sm-2"> <select name="course_id[]" id="course_id" class=" form-control"> <option selected disabled hidden>Course</option> @foreach($courses as $course) <option value={{$course->id}} >{{$course->title}}</option> @endforeach </select> </div> <div class="col-sm-2"> <input class="form-control" placeholder="Start Time" name="start_time[]" type="time" required> </div> <div class="col-sm-2"> <input class="form-control" placeholder="End Time" name="end_time[]" type="time" required> </div> <div class="col-sm-2"> <select name="day[]" class=" form-control" required> <option selected disabled hidden>Day</option> <option value="Sunday" >Sunday</option> <option value="Monday" >Monday</option> <option value="Tuesday" >Tuesday</option> <option value="Wednesday" >Wednesday</option> <option value="Thursday" >Thursday</option> <option value="Friday" >Friday</option> <option value="Saturday" >Saturday</option> </select> </div> <div class="col-sm-2"> <input class="form-control" placeholder="Room" name="room[]" type="text" required> </div> </div>';
            $("#urlSubmit").before(element);     // Append new elements
        }
    </script>

    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.btnp').text(fileName);
            });
        });
    </script>

    {{--<script type="text/javascript">--}}
        {{--jQuery(function ($) {--}}
            {{--$("#files").shieldUpload();--}}
        {{--});--}}
    {{--</script>--}}


@endsection