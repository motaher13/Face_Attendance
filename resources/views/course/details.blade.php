@extends('layouts.app')
@section('content')
    {{--{{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-title">
                    {{--<div class="caption font-dark">--}}
                    {{--<span class="caption-subject bold uppercase"> Course Details</span>--}}
                    {{--</div>--}}
                    {{--<div style="text-align: center; ">--}}
                    <h1 class="fonts">{{$course->title}}</h1>
                    {{--</div>--}}

                    <div class="row">
                        <p class="col-md-6 fonts sizes ">Category:{{$course->course_category->name}}</p>
                        <p class="col-md-6 fonts sizes" style="text-align: right">Length:{{$course->length}}</p>
                    </div>


                </div>
                <div class="portlet-body">

                    @if(!$enrolled)
                    <h2>Short Description</h2>
                    {!! $course->short_description !!}
                    <br>
                    @endif

                    @if(auth()->user()->id==$course->tutor_id|| $enrolled)
                    <h2>Long Description</h2>
                    {!! $course->long_description !!}
                    @endif

                </div>

            </div>


            <div class="pull-right" id="button_div">
                @if(auth()->user()->hasRole('selfteach'))
                    <a class="btn btn-success" href="{{route('course.enrol',$course->id)}}">Enrol</a>
                @elseif(auth()->user()->hasRole('business'))
                    {{--<a class="btn btn-success" href="{{route('course.enrol_employee',$course->id)}}">Enrol Employees</a>--}}
                    <button class="btn btn-success" id="enrol_button">Enrol Employee</button>
                @endif
            </div>


            @if(auth()->user()->hasRole('business'))
                <div id="enrol_employee" class="hidden">
                    @include('course.includes.enrol_employee')

                </div>
            @endif


        </div>
    </div>

@endsection

@section('styles')

    <link href="{!! asset('assets/global/plugins/icheck-1.x/skins/square/blue.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">

    <style>
        .fonts {
            font-family: "Times New Roman", Times, serif;
        }

        h1.fonts {
            text-align: center;
            font-weight: bold;
        }

        .sizes {
            font-size: 20px;
        }
    </style>
@endsection

@section('scripts')
    <script src="{!! asset('assets/global/plugins/icheck-1.x/icheck.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>


    <script>
        $(document).ready(function () {
            $("#enrol_button").click(function () {
                $("#button_div").hide();
                $("#enrol_employee").removeClass("hidden");
            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });

            $('#dataTable').dataTable({
                "order": [[ 1, "asc" ]]
            });
        });

    </script>
@endsection

