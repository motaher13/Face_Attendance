@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-plus font-dark"></i>
                        <span class="caption-subject bold uppercase"> Password Reset </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group pull-right">
                            <a href="{{route('dashboard.main')}}" class="btn sbold red"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{!! route('password.doReset') !!}" method="POST" class="horizontal-form" role="form">
                        {!! csrf_field() !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" name="password"
                                           class="form-control form-control-solid placeholder-no-fix"
                                           placeholder="Password" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation" class="control-label">Re-type Your
                                        Password</label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control form-control-solid placeholder-no-fix"
                                           placeholder="Re-type Your Password" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                    <div class="form-body">
                        <input type="submit" name="submit" class="btn btn-primary control-label" value="Submit"/>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')

@endsection