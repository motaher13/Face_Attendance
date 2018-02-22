@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        {{--<i class="icon-settings font-red-sunglo"></i>--}}
                        <span class="caption-subject bold uppercase">User Details</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-sm green" href="{{ route('user.index') }}"> All Users</a>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4" >
                            {{--$user->userInfo ? asset($user->userInfo->photo) :--}}
                            <img src="{{  asset('img/propic.png') }}" class="img-circle img-responsive" width="200px" style="margin-left: auto;margin-right: auto">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column">

                                <tbody>
                                <tr class="odd gradeX">
                                    <td> Name </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td>{{ $user->email }} </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td> Name </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>


                                {{--<tr>--}}
                                    {{--<td> Notes </td>--}}
                                    {{--<td>{{ $user->userInfo->about ?? '' }} </td>--}}
                                {{--</tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-offset-3">--}}
                            {{--<table class="table table-striped" >--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Role</th>--}}
                                    {{--<th>Toggle</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody id="roleChange">--}}
                                {{--@foreach($roles as $role)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $role->name }}</td>--}}
                                        {{--@if($user->hasRole('admin') && $role->name === 'admin' && (auth()->user()->id ==  $user->id))--}}
                                            {{--<td readonly>--}}
                                                {{--<label class="switch">--}}
                                                    {{--<input class="clickableSwitch" type="checkbox" id="{{ $role->name }}" roleID="{{ $role->id }}" @if($user->hasRole($role->name)) disabled checked @endif>--}}
                                                    {{--<span class="sliderSwitch round"></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}
                                        {{--@else--}}
                                            {{--<td>--}}
                                                {{--<label class="switch">--}}
                                                    {{--<input class="clickableSwitch" type="checkbox" id="{{ $role->name }}" roleID="{{ $role->id }}" @if($user->hasRole($role->name)) checked @endif>--}}
                                                    {{--<span class="sliderSwitch round"></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}
                                        {{--@endif--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                </div>
            </div>
        </div>
    </div>

@endsection



{{--@section('scripts')--}}
    {{--<script>--}}
        {{--function showToaster(type) {--}}
            {{--setTimeout(function() {--}}
                {{--toastr.options = {--}}
                    {{--closeButton: true,--}}
                    {{--progressBar: false,--}}
                    {{--positionClass: "toast-bottom-right",--}}
                    {{--showMethod: 'slideDown',--}}
                    {{--timeOut: 3000--}}
                {{--};--}}
                {{--if (type == "success"){--}}
                    {{--toastr.success('', "Role Updated");--}}
                {{--} else {--}}
                    {{--toastr.error('', "Something went wrong. Please, try again");--}}
                {{--}--}}

            {{--}, 60);--}}
        {{--}--}}

        {{--$(document).ready(function() {--}}
            {{--var userId = "{!! $user->id !!}";--}}
            {{--var requestUri = "{!! route('user.roleUpdate') !!}";--}}
            {{--$('#roleChange').on("click", '.clickableSwitch', function (e) {--}}
                {{--var roleId = $(this).attr('roleId');--}}
                {{--roleUpdate(userId, roleId);--}}
            {{--});--}}

            {{--function roleUpdate(userId, roleId){--}}
                {{--/*    console.log(userId, roleId); */--}}
                {{--$.ajax({--}}
                    {{--// Switch off caching--}}
                    {{--cache: false,--}}
                    {{--//Set the type of request--}}
                    {{--type: "GET",--}}
                    {{--// Set the timeout--}}
                    {{--timeout: 5000,--}}
                    {{--// set url to which the request is sent--}}
                    {{--url: requestUri,--}}
                    {{--// define data type--}}
                    {{--dataType: "json",--}}
                    {{--// your data--}}
                    {{--data: {userId: userId, roleId: roleId},--}}
                    {{--// if the request is success get the response--}}
                    {{--success: function (response) {--}}
                        {{--showToaster("success");--}}
                        {{--console.log(response);--}}
                    {{--},--}}
                    {{--// if the request is error get the response--}}
                    {{--error: function(response) {--}}
                        {{--showToaster("error");--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}


@section('styles')
    <style type="text/css">
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .sliderSwitch {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s !important;
            transition: .4s;
        }

        .sliderSwitch:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .sliderSwitch {
            background-color: #2196F3;
        }

        input:focus + .sliderSwitch {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .sliderSwitch:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliderSwitchs */
        .sliderSwitch.round {
            border-radius: 34px !important;
        }

        .sliderSwitch.round:before {
            border-radius: 50% !important;
        }
    </style>
@endsection