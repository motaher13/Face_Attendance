@extends("layouts.app")

@section('content')
    {{--width: 50%;border: 2px solid black;--}}
    <div class="container" style="text-align: center;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('routine.update',$routine->id)}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form" >
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="course_code" class="control-label col-sm-2">Course Code</label>
                    <div class="col-sm-8">
                        <select name="course_id" id="course_id"  class=" form-control">
                            {{--<option selected disabled hidden value="{{$routine->course_id}}">{{$routine->course->course_code}}</option>--}}
                            @foreach($courses as $course)
                                <option <?php if ($course->id==$routine->course_id) { ?>selected="selected"<?php } ?> value={{$course->id}} >{{$course->course_code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--Course Category--}}
                <div class="form-group">
                    <label for="start_time" class="control-label col-sm-2">Start Time</label>
                    <div class="col-sm-8">
                        <div class='input-group date datetimepicker3'>
                            <input type='text' class="form-control" name="start_time" value="{{ date("g:i A", strtotime($routine->start_time )) }}" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_time" class="control-label col-sm-2">End Time</label>
                    <div class="col-sm-8">
                        <div class='input-group date datetimepicker3'>
                            <input type='text' class="form-control" name="end_time" value="{{ date("g:i A", strtotime($routine->end_time )) }}" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="teacher_id" class="control-label col-sm-2">Day</label>
                    <div class="col-sm-8">
                        <select name="day"  class=" form-control" required>
                            <option selected disabled hidden value="{{$routine->day}}">{{$routine->day}}</option>
                            <option value="Sunday" >Sunday</option>
                            <option value="Monday" >Monday</option>
                            <option value="Tuesday" >Tuesday</option>
                            <option value="Wednesday" >Wednesday</option>
                            <option value="Thursday" >Thursday</option>
                            <option value="Friday" >Friday</option>
                            <option value="Saturday" >Saturday</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="room" class="control-label col-sm-2">Room</label>
                    <div class="col-sm-8">
                        <input class="form-control" value="{{$routine->room}}" name="room" type="text"  id="room">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input class="btn btn-success" type="submit" value="submit">
                    </div>
                </div>

            </form>
        </div>

        <div class="container" style="display: inline;">
            @if(count($errors))
                <div >
                    <div class="alert alert-danger alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif()
        </div>

    </div>

@stop



@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

@endsection





@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function () {
            $('.datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });

    </script>
@endsection


