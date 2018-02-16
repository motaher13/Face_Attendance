@extends("layouts.app")

@section('content')
    <div class="container" style="text-align: center;width: 50%;border: 2px solid black;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('course.create')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="type" class="control-label col-sm-2">type</label>
                    <div class="col-sm-8">
                        <select name="type" id="type">
                            @foreach($categories as $category)
                                <option value={{$category->id}} >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="control-label col-sm-2">Title</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="title" type="text"  id="title">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-sm-2">Description</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="description" name="description" type="text"  id="description">
                    </div>
                </div>

                <div class="form-group">
                    <label for="length" class="control-label col-sm-2">Length</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="length" name="length" type="text"  id="length">
                    </div>
                </div>

                <div class="form-group">
                    <label for="type" class="control-label col-sm-2">type</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter type" name="type" type="text"  id="type">
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