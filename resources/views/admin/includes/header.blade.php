<header class="main-header" id="bodyApp">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>r</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Production</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notification -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-success">@{{ notifiCount }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Unread Notification <a style="float: right; cursor: pointer" @click="markAsRead()"> Mark As Read</a> </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li v-for="notification in notifications" style="background-color: #e1f2fb"><!-- start message -->
                                    <a style="cursor: pointer" @click="readNotification(notification)">
                                        <div class="pull-left" v-if="notification.type=='App\\Notifications\\newPost'">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <div class="pull-left" v-else-if="notification.type=='App\\Notifications\\changeParameter'">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <div class="pull-left" v-else-if="notification.type=='App\\Notifications\\ToolRequest'">
                                            <i class="fa fa-wrench"></i>
                                        </div>
                                        <div class="pull-left" v-else-if="notification.type=='App\\Notifications\\QualityRequest'">
                                            <i class="glyphicon glyphicon-list-alt"></i>
                                        </div>
                                        <div class="pull-left" v-else-if="notification.type=='App\\Notifications\\MainRequest'">
                                            <i class="glyphicon glyphicon-cog"></i>
                                        </div>
                                        <h4>
                                            @{{ notification.data.title }}
                                            <small><i class="fa fa-clock-o"></i>@{{ notification.created_at }}</small>
                                        </h4>
                                        <p>@{{ notification.data.message }}</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a style="cursor: pointer" @click="notificationHistory">See All Notification</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                            <p>
                                {{auth()->user()->name}}
                                <small> </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
