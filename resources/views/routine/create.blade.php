@extends("layouts.app")

@section('content')
    {{--width: 50%;border: 2px solid black;--}}
    <div class="container" style="text-align: center;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide Routine data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="urlForm" action="{{route('routine.add')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                {{ csrf_field() }}

                <div class="row" style="margin-bottom: 5px">

                    <div class="col-sm-2">
                        <select name="course_id[]" id="course_id"  class=" form-control">
                            <option selected disabled hidden>Course</option>
                            @foreach($courses as $course)
                                <option value={{$course->id}} >{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <input class="form-control" placeholder="Start Time" name="start_time[]" type="time" required>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" placeholder="End Time" name="end_time[]" type="time" required>
                    </div>
                    <div class="col-sm-2">
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



                    <div class="col-sm-2">
                        <input class="form-control" placeholder="Room" name="room[]" type="text" required>
                    </div>

                </div>

                <div class="col-sm-offset-2 col-sm-8" id="urlSubmit">
                    <input class="btn btn-success" type="submit" value="submit">
                </div>

            </form>
            <i class="far fa-plus-square" onclick="appendText()" style="font-size:36px"></i>
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
@section('scripts')
    <script>
        function appendText() {
            var element='<div class="row" style="margin-bottom: 5px"> <div class="col-sm-2"> <select name="course_id[]" id="course_id" class=" form-control"> <option selected disabled hidden>Course</option> @foreach($courses as $course) <option value={{$course->id}} >{{$course->title}}</option> @endforeach </select> </div> <div class="col-sm-2"> <input class="form-control" placeholder="Start Time" name="start_time[]" type="time" required> </div> <div class="col-sm-2"> <input class="form-control" placeholder="End Time" name="end_time[]" type="time" required> </div> <div class="col-sm-2"> <select name="day[]" class=" form-control" required> <option selected disabled hidden>Day</option> <option value="Sunday" >Sunday</option> <option value="Monday" >Monday</option> <option value="Tuesday" >Tuesday</option> <option value="Wednesday" >Wednesday</option> <option value="Thursday" >Thursday</option> <option value="Friday" >Friday</option> <option value="Saturday" >Saturday</option> </select> </div> <div class="col-sm-2"> <input class="form-control" placeholder="Room" name="room[]" type="text" required> </div> </div>';
            $("#urlSubmit").before(element);     // Append new elements
        }
    </script>

@endsection