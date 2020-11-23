<!-- Main Sidebar Container -->
<?php
$userDetails = getUserDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001f3f;">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
<!--        <img src="{{url('public/sites/users/images/small-logo.png')}}" alt="Tutify" class="brand-image img-circle elevation-3"
   style="opacity: .8">-->
        <h4 class="admn-title">Lottery Admin</h4>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty($userDetails->avatar))
                <img src="{{ asset('public/sites/images/')}}/{{$imgFolder}}/{{@$userDetails->id . '/' . @$userDetails->avatar }}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ asset('public/sites/users/images/default_profile_user_img.png')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{asset('editprofile')}}/<?= @$userDetails->id; ?>" class="d-block"><?= @$userDetails->name; ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link {{$segment2=='dashboard'?'active':""}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{$segment2=='user_list'?'menu-open':""}}">
                    <a href="#" class="nav-link {{$segment2=='user_list'?'active':""}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/user')}}" class="nav-link {{$segment3==''?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/user/create')}}" class="nav-link {{$segment3=='lc'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
<!--                         <li class="nav-item">
                            <a href="{{url('admin/user_list/student')}}" class="nav-link {{$segment3=='student'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Students</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="{{url('admin/institute')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Institute
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/subject')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Subjects
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/teachSubject')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Teach Subjects
                        </p>
                    </a>
                </li> -->
               <!--  <li class="nav-item">
                    <a href="{{url('admin/Syllabus')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Syllabus
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/plan')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Plan
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Classes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('#')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('#')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign Class To Student</p>
                            </a>
                        </li>
                    </ul>
                </li>
 -->

               <!--  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Online Practice
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/question')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Questions</p>
                            </a>
                            <a href="{{url('admin/practicePaper')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Practice Paper</p>
                            </a>
                            <a href="{{url('admin/studentData')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Record</p>
                            </a>
                            <a href="{{url('admin/subscription')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subscription</p>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/subscriber')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Subscriber
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Attendances
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('#')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Save Attendances</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('#')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('#')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance Summary</p>
                            </a>
                        </li>
                    </ul>
                </li>    -->        

                <li class="nav-item">
                    <a href="{{url('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
