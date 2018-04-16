@extends("layouts.app")



@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')
    {{--width: 50%;border: 2px solid black;--}}
    <div class="container" style="text-align: center;margin-top: 30px;">
        <div class="container" style="text-align: left;">
            <h2>provide course data</h2>
        </div>

        <div class="container" style="margin-top: 20px; display: inline;">
            <form method="POST" id="updateProfile" action="{{route('course.create')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form" enctype="multipart/form-data">
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
                            <option value="basic" >Basic Course</option>
                            <option value="scheduled">Scheduled Course</option>
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
                {{--<div class="form-group">--}}
                    {{--<label for="material" class="control-label col-sm-2">Course Material</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<select name="material" id="material" class="form-control">--}}
                            {{--<option selected disabled hidden>Choose here</option>--}}
                            {{--<option value="1">Url</option>--}}
                            {{--<option value="2">Video</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group hidden" id="url">--}}
                    {{--<label for="title" class="control-label col-sm-2 " >URL</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input class="form-control" placeholder="Enter title" name="url" type="text"  id="link">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group hidden" id="file">--}}
                    {{--<label for="title" class="control-label col-sm-2 " >File</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input class="form-control"  type="file"  id="fileupload" name="photos[]" data-url="{{route('material.add',1)}}" multiple>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<br />--}}
                {{--<div id="files_list"></div>--}}
                {{--<p id="loading"></p>--}}
                {{--<input type="hidden" name="file_ids" id="file_ids" value="" />--}}

                <div class="form-group">
                    <label for="material" class="control-label col-sm-2">Add Material</label>
                    <div class="col-sm-8">
                        <a class="btn btn-default" data-toggle="modal" data-target="#materialModal">Add Course Material</a>
                    </div>
                </div>


                {{--Material Type End--}}



                <div class="form-group">
                    <label for="description" class="control-label col-sm-2">Short Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" placeholder="description" name="short_description" id="short_description"></textarea>
                    </div>
                </div>



                <div class="form-group">
                    <label for="description" class="control-label col-sm-2">Long Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" placeholder="description" name="long_description" id="long_description"></textarea>
                    </div>
                </div>

                <input type="hidden" name="code" value="{{$code}}">

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


    {{--materialModal--}}
    <div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'url')">Add URL</button>
                        <button class="tablinks" onclick="openCity(event, 'video')">Add Video</button>
                    </div>
                </div>


                <div class="modal-body">

                    {{--url div--}}
                    <div id="url" class="tabcontent" style="display: block">

                        <form method="POST" id="urlForm" action="{{route('course.url')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <div class="row" style="margin-bottom: 5px">

                                <div class="col-sm-8">
                                    <input class="form-control" placeholder="Enter url" name="url[]" type="text" required>
                                </div>

                                <div class="col-sm-3">
                                    <select name="source[]"  class=" form-control" required>
                                        <option selected disabled hidden>Source</option>
                                        <option value="youtube" >Youtube</option>
                                        <option value="other" >Other</option>
                                    </select>
                                </div>

                            </div>

                            <input type="hidden" name="code" value="{{$code}}">


                            <div class="col-sm-offset-2 col-sm-8" id="urlSubmit">
                                <input class="btn btn-success" type="submit" value="submit">
                            </div>

                        </form>
                        <i class="far fa-plus-square" onclick="appendText()" style="font-size:36px"></i>

                        <p id="modalalert"></p>
                    </div>

                    {{--url div end--}}

                    {{--file div--}}

                    <div id="video" class="tabcontent" >
                        @include('course.includes.blueimp')
                    </div>

                    {{--file div end--}}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @include('course.includes.scripts_create')



@endsection

@section('styles')

    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }


            #blueimpdiv {
                width: auto !important;

        }


    </style>

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.27.1/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.min.css">

@endsection