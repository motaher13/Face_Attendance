<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->

            <li class="nav-item {!! Menu::isActiveRoute('dashboard.main') !!}">
                <a href="{!! route('dashboard.main') !!}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if (Route::is('dashboard.main'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <!-- User Management start-->

            {{--{!! Menu::areActiveRoutes(['role.index', 'role.create', 'user.index', 'user.create', 'user.show', 'user.edit', 'role.edit']) !!}--}}
            {{--{!! Menu::isActiveRoute('role.index') !!}--}}
            {{--{!! Menu::isActiveRoute('user.index') !!}--}}

            @if(auth()->user()->hasRole('admin'))
                <li class="nav-item {!! Menu::areActiveRoutes(['user.index']) !!}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-shield"></i>
                        {{--<span class="title">{!! $permissions['user_management']!!}</span>--}}
                        <span class="title">User Management</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        {{--<li class="nav-item ">--}}
                        {{--<a href="{!! route('role.index') !!}" class="nav-link ">--}}
                        {{--<span class="title">Roles</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li class="nav-item {!! Menu::isActiveRoute('user.index') !!}">
                            <a href="{!! route('user.index') !!}" class="nav-link ">
                                <span class="title">Users</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- User Management end-->

                {{--file manager start--}}
                <li class="nav-item {!! Menu::isActiveRoute('filemanager') !!}">
                    <a href="{!! route('filemanager') !!}" class="nav-link ">
                        <i class="icon-folder"></i>
                        <span class="title">File Manager</span>

                    </a>
                </li>
            @endif


            <li class="nav-item {!! Menu::isActiveRoute('course.basic') || Menu::isActiveRoute('course.scheduled')!!}">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-folder"></i>
                    <span class="title">Course List</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{!! route('course.basic') !!}" class="nav-link ">
                            <span class="title">Static Course</span>
                        </a>
                    </li>
                    <li class="nav-item {!! Menu::isActiveRoute('user.index') !!}">
                        <a href="{!! route('course.scheduled') !!}" class="nav-link ">
                            <span class="title">Scheduled Course</span>
                        </a>
                    </li>
                </ul>

            </li>


            @if(auth()->user()->hasRole('tutor'))
                <li class="nav-item {!! Menu::isActiveRoute('course.create') !!}">
                    <a href="{!! route('course.create') !!}" class="nav-link ">
                        <i class="icon-folder"></i>
                        <span class="title">Create Course</span>

                    </a>
                </li>

                <li class="nav-item {!! Menu::isActiveRoute('course.created') !!}">
                    <a href="{!! route('course.created') !!}" class="nav-link ">
                        <i class="icon-folder"></i>
                        <span class="title">Created Courses</span>

                    </a>
                </li>

            @endif

            @if(auth()->user()->hasRole('selfteach') || auth()->user()->hasRole('employee'))
                <li class="nav-item {!! Menu::isActiveRoute('course.enrolled') !!}">
                    <a href="{!! route('course.enrolled') !!}" class="nav-link ">
                        <i class="icon-folder"></i>
                        <span class="title">Enrolled Courses</span>

                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('business'))
                <li class="nav-item {!! Menu::isActiveRoute('course.employee') !!}">
                    <a href="{!! route('employee.list') !!}" class="nav-link ">
                        <i class="icon-folder"></i>
                        <span class="title">Employees</span>

                    </a>
                </li>
            @endif

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->