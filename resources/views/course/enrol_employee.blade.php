@extends('layouts.app')
@section('content')
    {{--{{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}

    @include('course.includes.enrol_employee')

@endsection

@section('styles')

    <link href="{!! asset('assets/global/plugins/icheck-1.x/skins/square/blue.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}">

@endsection

@section('scripts')

    <script src="{!! asset('assets/global/plugins/icheck-1.x/icheck.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}"></script>


    <script>
        $(document).ready(function(){

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });

            $('#dataTable').dataTable({
                "order": [[ 1, "asc" ]]
            });
        });
    </script>

@endsection



