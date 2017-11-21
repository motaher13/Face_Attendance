@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
    <!-- END PAGE HEADER -->
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        {{--<i class="icon-settings font-red-sunglo"></i>--}}
                        <span class="caption-subject bold uppercase"> Create a User</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-sm green" href="{{ route('user.index') }}"> All Users

                            </a>

                        </div>
                    </div>
                </div>
                <div class="portlet-body form">

                    <form class="form-horizontal" role="form" action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="someone@example.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" class="col-md-2 control-label">Confirm Password</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password_confirmation" id="confirm_password" required>
                            </div>
                        </div>



                    <!-- <div class="form-group">
                            <label for="phone" class="col-md-2 control-label">Phone</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="+880-1417-2154" required>
                            </div>
                        </div> -->

                    <!-- <div class="form-group">
                            <label for="occupation" class="col-md-2 control-label">Occupation</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" placeholder="Student" id="occupation" required>
                            </div>
                        </div> -->

                        {{--<div class="form-group">--}}
                            {{--<label for="about" class="col-md-2 control-label">Notes</label>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<textarea name="about" class="form-control" placeholder="I am good" id="about" rows="4">{{ old('about') }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="role" class="col-md-2 control-label">Role</label>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<select class="form-control" name="role" id="role" required>--}}
                                    {{--@foreach($roles as $role)--}}
                                        {{--<option value="{{ $role->name }}">{{  $role->name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn blue">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection