@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Get Attendance</span>
                    </div>

                </div>
                <div class="portlet-body" style="overflow: hidden">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="caption font-red-sunglo">
                                    <span style="margin-left: 15px;" class="caption-subject bold uppercase"> Camera</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="caption font-red-sunglo">
                                    <span style="margin-left: 47px;" class="caption-subject bold uppercase"> preview</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" >
                        <div class="row">
                            <div class="col-md-4"  ><div id="my_camera"></div></div>
                            <div class="col-md-4"  ><div id="results"></div></div>

                        </div>


                        <form action="{{route('detectWebcam',331)}}" method="post" id="myform" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="namafoto"  name="namafoto" value="">
                            <input style="margin-top: 20px;"  class="btn btn-primary" id="submit" type="submit" value="Capture">
                        </form>
                        {{--<button style="margin-top: 20px;" id="mybutton" class="btn btn-primary">Capture</button>--}}
                    </div>


                </div>
                {{--{{ auth()->user()s->render() }}--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>






    {{--<h1 align="center">--}}
        {{--Admin Dashboard--}}
    {{--</h1>--}}
    {{--<div id="results"></div>--}}


    {{--<div id="my_camera"></div>--}}

    {{--<form action="{{route('detectWebcam',331)}}" method="post" id="myform" enctype="multipart/form-data">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="hidden" id="namafoto"  name="namafoto" value="">--}}
        {{--<input type="submit" value="submit">--}}
    {{--</form>--}}


@endsection

@section('styles')
    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        /*form > input { margin-right: 15px; }*/
        /*#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }*/
    </style>

@endsection


@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/global/plugins/webcam/webcam.min.js') !!}"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'png',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
    </script>

    <!-- A button for taking snaps -->
    <form>
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
    </form>

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                document.getElementById('namafoto').value = raw_image_data;
                document.getElementById('results').innerHTML =
                    '<img src="'+data_uri+'"/>';
                // document.getElementById('myform').submit();


            } );
        }
    </script>
    <script>
        $(function(){
            $('#myform').on('submit', function(e){
                e.preventDefault();
                take_snapshot();
                $.ajax({
                    url: $('#myform').attr('action'),
                    type: "POST",
                    data: $('#myform').serialize(),
                    dataType : 'json',
                    success: function(data){
                        alert(data['data']);
                    },
                    error: function(data) {
                        alert("fail");

                    }
                });
            });
        });
    </script>
@endsection