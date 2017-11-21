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
                        <span class="caption-subject bold uppercase"> Edit a User</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-sm green" href="{{ route('user.index') }}"> All Users

                            </a>

                        </div>
                    </div>
                </div>
                <div class="portlet-body form">

                    <form class="form-horizontal"  method="POST" action="{!!  route('user.update', ['id' => $user->id]) !!}" >
                        <input name="_method" type="hidden" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="name" class="form-control" name="name" id="name" value="{{ $user->name }}" placeholder="JOhn Doe ..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="someone@example.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" class="col-md-2 control-label">Confirm Password</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password_confirmation" id="confirm_password">
                            </div>
                        </div>




                        {{--<div class="form-group">--}}
                            {{--<label for="about" class="col-md-2 control-label">Notes</label>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<textarea name="about" class="form-control" id="about" rows="4">{{ $user->userInfo->about }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn blue">Save Changes</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection