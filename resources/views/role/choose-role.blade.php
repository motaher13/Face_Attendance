@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
        <h1>Choose Your Plan</h1>
        <div class="container" style="width: 50%; margin-top: 20px;">
            <div class="row">
                <div class="col-md-4"><a class="btn btn-success" href="{{route('set.role',1)}}">Business Package</a></div>
                <div class="col-md-4"><a class="btn btn-success" href="{{route('set.role',2)}}">Business Employee</a></div>
                <div class="col-md-4"><a class="btn btn-success" href="{{route('set.role',3)}}">Self Learner</a></div>
            </div>
        </div>
    </div>



@endsection