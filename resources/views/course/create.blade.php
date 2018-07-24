@extends("layouts.app")

@section('content')
    {{--width: 50%;border: 2px solid black;--}}
    <div class="container" style="text-align: center;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('course.create')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form" >
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="title" class="control-label col-sm-2">Title</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="title" type="text"  id="title">
                    </div>
                </div>


                <div class="form-group">
                    <label for="course_code" class="control-label col-sm-2">Course Code</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="course_code" name="course_code"text"  id="course_code">
                    </div>
                </div>

                {{--Course Category--}}
                <div class="form-group">
                    <label for="session" class="control-label col-sm-2">Session</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="session" name="session" type="text"  id="session">
                    </div>
                </div>

                <div class="form-group">
                    <label for="semester" class="control-label col-sm-2">Semester</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="semester" name="semester" type="text"  id="semester">
                    </div>
                </div>

                <div class="form-group">
                    <label for="teacher_id" class="control-label col-sm-2">Teacher</label>
                    <div class="col-sm-8">
                        {{--js-example-basic-single--}}
                        <select name="teacher_id" id="teacher"  class=" form-control">
                            <option selected disabled hidden>Choose here</option>
                            @foreach($user_infos as $info)
                                <option value={{$info->user->id}} >{{$info->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="start_date" class="control-label col-sm-2">Start date</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="start_date" name="length" type="date"  id="start_date">
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_date" class="control-label col-sm-2">End date</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="end_date" name="length" type="date"  id="end_date">
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
