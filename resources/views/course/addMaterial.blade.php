@extends("layouts.app")

@section('content')
    <div class="container" style="text-align: center;width: 50%;border: 2px solid black;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('material.add',$course_id)}}" enctype="multipart/form-data"  accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="type" class="control-label col-sm-2">type</label>
                    <div class="col-sm-8">
                        <select name="type" id="type" class="form-control">
                            {{--<option selected disabled hidden>Choose here</option>--}}
                            <option value="1" selected>Url</option>
                            <option value="2">Video</option>
                        </select>
                    </div>
                </div>



                {{--<div class="form-group" id="source">--}}
                    {{--<label for="title" class="control-label col-sm-2 " >Source</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input class="form-control" placeholder="Enter title" name="link" type="text"  id="link">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group hidden" id="url">
                    <label for="title" class="control-label col-sm-2 " >URL</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="url" type="date"  id="link">
                    </div>
                </div>

                <div class="form-group hidden" id="file">
                    <label for="title" class="control-label col-sm-2 " >File</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="file" type="file"  id="file">
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

@section('scripts')
    <script>
        $(document).ready(function(){

            var ab=$("#type").val();
            if(ab == 1){
                $("#url").removeClass("hidden");
                $("#file").addClass("hidden");
                $("#file").val(null);

            }else if(ab == 2){
                $("#file").removeClass("hidden");
                $("#url").addClass("hidden");
                $("#url").val(null);

            }
            $("#type").on('change', function() {

                if($(this).val() == 1){
                    $("#url").removeClass("hidden");
                    $("#file").addClass("hidden");
                    $("#file").val(null);

                }else if($(this).val() == 2){
                    $("#file").removeClass("hidden");
                    $("#url").addClass("hidden");
                    $("#url").val(null);
                }

            });
        });


    </script>


@stop