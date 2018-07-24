@extends('layouts.app')

@section('content')
    {{--<h1 align="center">--}}
        {{--Admin Dashboard--}}
    {{--</h1>--}}
    <div id="results"></div>


    <div id="my_camera"></div>

    <form action="{{route('detectWebcam',331)}}" method="post" id="myform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="namafoto"  name="namafoto" value="">
        <input type="submit" value="submit">
    </form>


@endsection

@section('styles')
    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        form > input { margin-right: 15px; }
        #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    </style>

@endsection


@section('scripts')
    {{--<script type="text/javascript" src="/js/webcam.min.js"></script>--}}
    <script type="text/javascript" src="{!! asset('assets/global/plugins/webcam/webcam.min.js') !!}"></script>
{{--    <script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>--}}
    <!-- Configure a few settings and attach camera -->
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
    {{--<form>--}}
    {{--<input type=button value="Take Snapshot" onClick="take_snapshot()">--}}
    {{--</form>--}}

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                document.getElementById('namafoto').value = raw_image_data;
                document.getElementById('results').innerHTML =
                    '<h2>Here is your image:</h2>' +
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