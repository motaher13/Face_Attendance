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
                    {!! Form::open(['route' => 'password.doReset','method' => 'post','class' => 'horizontal-form','role' => 'form']) !!}
                    <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('password','Password',['class' => 'control-label']) !!}
                                    {!! Form::text('password',null,['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Password','required']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('password_confirmation','Re-type Your Password',['class' => 'control-label']) !!}
                                    {!! Form::text('password_confirmation',null,['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Re-type Your Password','required']) !!}
                                </div>
                            </div>

                    </div>
                    <div class="form-body">
                        {!! Form::submit('Submit',['class' => 'btn btn-primary control-label']) !!}
                    </div>
                    {!! Form::close() !!}
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