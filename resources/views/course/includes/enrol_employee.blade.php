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
                    <form method="POST" id="updateProfile" action="{{route('course.do_enrol_employee')}}"
                          accept-charset="UTF-8" class="cmxform form-horizontal tasi-form">
                        {{ csrf_field() }}
                        <input class="hidden" name="course_id" value={{$course_id}}>

                        @foreach($users as $user)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1" style="text-align: right"> <input name="employee[]" type="checkbox" value={{$user->id}}></div>
                                    <label class="col-md-4" for="employees" >{{$user->name}}</label>
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
        </div>
    </div>
</div>

<div class="row">


    <!-- END BEGIN PROFILE SIDEBAR -->
    <!-- BEGIN PROFILE CONTENT -->
    <div class="profile-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Enrolled Employees</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane active">

                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th> Id </th>
                                        <th> Name </th>
                                        <th> email </th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enrolled_users as $user)
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->userInfo->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            {{--<td> <a href="{{ route('course.enrolled_remove',$course->id) }}" class="btn btn-xs btn-success">Remove</a> </td>--}}
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>

                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
                                                            <a href="{!! route('employee.details', $user->id) !!}">
                                                                <i class="icon-docs"></i> Details </a>
                                                        </li>
                                                        <li>
                                                            <a class="deleteBtn" href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('employee.remove',$user->id) }}">
                                                                <i class="icon-tag"></i> Remove </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                            <!-- END PERSONAL INFO TAB -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROFILE CONTENT -->
</div>

