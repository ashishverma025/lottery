<!-- Main Sidebar Container -->
<?php
$userDetails = getUserDetails();
//prd($userDetails);
$imgFolder = 'users';
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001f3f;">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
<!--        <img src="{{url('sites/users/images/small-logo.png')}}" alt="Tutify" class="brand-image img-circle elevation-3"
   style="opacity: .8">-->
        <h4 class="admn-title">Lottery Admin</h4>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty($userDetails->avatar))
                <img src="{{ asset('sites/images/')}}/{{$imgFolder}}/{{@$userDetails['id'] . '/' . @$userDetails['avatar'] }}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ asset('sites/users/images/default_profile_user_img.png')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{asset('editprofile')}}/<?= @$userDetails['id']; ?>" class="d-block"><?= @$userDetails['name']; ?></a>
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

                <li class="nav-item has-treeview {{$segment2=='user'?'menu-open':""}}">
                    <a href="#" class="nav-link {{$segment2=='user'?'active':""}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
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
                            <a href="{{url('admin/user/create')}}" class="nav-link {{$segment3=='create'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/user/user-bet')}}" class="nav-link {{$segment3=='user-bet'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Bet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{$segment2=='betting'?'menu-open':""}} {{$segment2=='addBetting'?'menu-open':""}}">
                    <a href="#" class="nav-link {{$segment2=='betting'?'active':""}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Betting Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/betting')}}" class="nav-link {{$segment2=='betting'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bet List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/addBetting')}}" class="nav-link {{$segment2=='addBetting'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Bet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{$segment2=='betting-result'?'menu-open':""}}">
                    <a href="#" class="nav-link {{$segment2=='betting-result'?'active':""}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Betting Result Mgmt.
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/betting-result')}}" class="nav-link {{$segment2=='betting-result'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bet Result List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{$segment2=='quick-betting'?'menu-open':""}}">
                    <a href="#" class="nav-link {{$segment2=='quick-betting'?'active':""}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users Quick Betting List
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/quick-betting')}}" class="nav-link {{$segment2=='quick-betting'?'active':""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quick Bet List</p>
                            </a>
                        </li>

                    </ul>
                </li>
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
