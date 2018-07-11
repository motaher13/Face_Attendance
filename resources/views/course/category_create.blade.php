@extends("layouts.app")

@section('content')
    <div class="container" style="text-align: center;width: 50%;border: 2px solid black;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course category data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('course.category_create')}}"  accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                {{ csrf_field() }}


                <div class="form-group" id="url">
                    <label for="title" class="control-label col-sm-2 " >Name</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="name" type="text"  id="name">
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

