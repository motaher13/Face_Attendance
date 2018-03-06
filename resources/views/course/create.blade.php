@extends("layouts.app")

@section('content')
    {{--width: 50%;border: 2px solid black;--}}
    <div class="container" style="text-align: center;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('course.create')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="title" class="control-label col-sm-2">Title</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter title" name="title" type="text"  id="title">
                    </div>
                </div>


                <div class="form-group">
                    <label for="length" class="control-label col-sm-2">Length</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="length" name="length" type="text"  id="length">
                    </div>
                </div>

                {{--Course Category--}}
                <div class="form-group">
                    <label for="type" class="control-label col-sm-2">category</label>
                    <div class="col-sm-8">
                        {{--js-example-basic-single--}}
                        <select name="category_id" id="category"  class=" form-control">
                            <option selected disabled hidden>Choose here</option>
                            @foreach($categories as $category)
                                <option value={{$category->id}} >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--Course Type--}}
                <div class="form-group">
                    <label for="type" class="control-label col-sm-2">type</label>
                    <div class="col-sm-8">
                        <select name="type" id="type"  class="form-control">
                            <option selected disabled hidden>Choose here</option>
                            <option value="static" >static course</option>
                            <option value="time_frame">course with time_frame</option>
                        </select>
                    </div>
                </div>

                <div class="form-group hidden hid">
                    <label for="type" class="control-label col-sm-2">Start Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter type" name="start_date" type="date"  id="start_date">
                    </div>
                </div>

                <div class="form-group hidden hid">
                    <label for="type" class="control-label col-sm-2">End Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Enter type" name="end_date" type="date"  id="end_date">
                    </div>
                </div>
                {{--Course Type End--}}

                {{--Material Type--}}
                <div class="form-group">
                    <label for="material" class="control-label col-sm-2">Course Material</label>
                    <div class="col-sm-8">
                        <select name="material" id="material" class="form-control">
                            <option selected disabled hidden>Choose here</option>
                            <option value="1">Url</option>
                            <option value="2">Video</option>
                        </select>
                    </div>
                </div>


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
                {{--Material Type End--}}



                <div class="form-group">
                    <label for="description" class="control-label col-sm-2">Description</label>
                    <div class="col-sm-8">
                        {{--<input class="form-control" placeholder="description" name="description" type="text"  id="description">--}}
                        <textarea class="form-control" placeholder="description" name="description" id="description"></textarea>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <script>
        $(document).ready(function(){

            $(".js-example-basic-single").select2();

            $("#type").on('change', function() {

                if($(this).val() == "static"){
                    console.log('1');
                    $(".hid").addClass("hidden");
                    $(".hid").val(null);

                }else if($(this).val() == "time_frame"){
                    console.log('2');
                    $(".hid").removeClass("hidden");

                }else {
                    console.log('3');
                    $(".hid").addClass("hidden");
                }


            });

            $("#material").on('change', function() {

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

            $(function(){
                if (!Modernizr.inputtypes.date) {
                    $('input[type=date]').datepicker({
                            dateFormat : 'yy-mm-dd'
                        }
                    );
                }
            });
        });




    </script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description',{
            toolbar : 'Basic',
                uiColor : '#9AB8F3'
        } );
    </script>

@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection