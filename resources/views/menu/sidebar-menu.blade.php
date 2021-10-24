<!-- MAIN SIDEBAR CONTAINER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- BRAND LOGO -->
    <a href="{{ url('/')}}" class="brand-link">
        <img src="{{ url('images/logo.png')}}" alt="Padma Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Marketing Associate</span>
    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <!-- SIDEBAR USER PANEL (OPTIONAL) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @guest
                <img src="{{ url('images/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ url('images/user/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                @endguest
            
            </div>
            <div class="info">
            
                @guest
                <a href="{{ url('login') }}" class="d-block">Login</a>
                @else
                <a  class="d-block">   
                    {{ 
                        auth()->user()->name
                    }}
                </a>
                
                <h6 style="color:rgb(129, 143, 160)">{{'('.auth()->user()->getRoleName->role_name.')' }} </h6>
                @endguest
                
            
            </div>
        </div>

        <!-- SIDEBAR MENU -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link {{ $pageInfo['route']==='home'? 'active':'' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <!--i class="oi oi-command nav-icon"></i-->
                        <p>Home</p>
                    </a>
                </li>

                
                <li class="nav-item user-panel {{ $pageInfo['route']==='application'? 'menu-is-opening menu-open':'' }}">
                    <a href="#" class="nav-link"> 
                        <i class="fab fa-wpforms nav-icon"></i>
                        <p>Application<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('application') }}" class="nav-link ">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <!--i class="oi oi-command nav-icon"></i-->
                                <p>Apply</p>
                            </a>
                        </li>
                    </ul> 
                </li>
                

                @auth
                @if(auth()->user()->getRoleName->role_short_name!="assc")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>User<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->getRoleName->role_short_name=='admin')
                        <li class="nav-item">
                            <a href="{{ url('register') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Registration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user-list') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('role') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @else
                            
                            <li class="nav-item">
                                <a href="{{ url('registration/'.auth()->user()->id.'/edit') }}" class="nav-link">
                                    <i class="fab fa-tencent-weibo nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                            
                        @endif
                    </ul> 
                </li>
                
                <li class="nav-item">
                    <a href="{{ url('/report') }}" class="nav-link {{ $pageInfo['route']==='report'? 'active':'' }}">
                        <i class="far fa-chart-bar nav-icon"></i> 
                        <p>Report</p>
                    </a>
                </li>
                @endif

                @auth
                <li class="nav-item">
                    <a href="{{ url('/claim_incentive') }}" class="nav-link {{ $pageInfo['route']==='claim_incentive'? 'active':'' }}">
                        <i class="fas fa-percent nav-icon"></i>
                        <p>Claim Incentive</p>
                    </a>
                </li>
                @endauth
                
                
                {{--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-percent nav-icon"></i>
                        <p>Incentive<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('incentive_calculation') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Incentive Calculation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('claim_incentive') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Claim Incentive</p>
                            </a>
                        </li>

                    </ul> 
                </li>--}}
                
                <!-- MANAGE INCENTIVE -->
                @if (auth()->user()->getRoleName->role_short_name=='admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>Manage Incentive<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{ url('incentive_category') }}" class="nav-link">
                                <i class="fab fa-tencent-weibo nav-icon"></i>
                                <p>Incentive Category</p>
                            </a>
                        </li>
                        
                        
                    </ul> 
                </li>
                @endif
                
                @endauth
                
                    
                @guest
                <li class="nav-item">
                    <a href="{{ url('login') }}" class="nav-link">
                        <i class="fas fa-user-lock nav-icon"></i> 
                        <p>Login</p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
               

                
            </ul>
        </nav>
        <!-- SIDEBAR-MENU END -->
    </div>
    <!-- SIDEBAR END -->
</aside>