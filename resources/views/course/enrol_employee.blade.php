@extends('layouts.app')
@section('content')
    {{--{{ Breadcrumbs::render('user') }}--}}
    {{--Route::currentRouteName()--}}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Enrol Employees </span>
                    </div>

                </div>
                <div class="portlet-body">
                    @if(!count($users))
                        <p>No Employee left for this course.</p>
                    @else
                    <form method="POST" id="updateProfile" action="{{route('course.do_enrol_employee')}}"accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                        {{ csrf_field() }}
                        <input class="hidden" name="course_id" value={{$course_id}}>

                        @foreach($users as $user)
                            <div class="form-group">
                                <div class="row">
                                    <input class="col-md-1" name="employee[]" type="checkbox"  value={{$user->id}}>
                                    <label for="employees" class="col-md-4">{{$user->name}}</label>
                                </div>

                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input class="btn btn-success" type="submit" value="submit">
                            </div>
                        </div>


                    </form>
                        @endif

                </div>
                {{--{{ $users->render() }}--}}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

