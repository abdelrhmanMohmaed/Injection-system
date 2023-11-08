<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            {{--<li>--}}
            {{--<a href="{{url('dashboard')}}">--}}
            {{--<i style="color: #bde2ff" class="fa fa-dashboard"></i> <span>Home </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--@can('view charts')--}}
            {{--<li>--}}
            {{--<a href="{{url('Charts')}}">--}}
            {{--<i style="color: #1c5fff" class="fa fa-bar-chart-o"></i> <span>Charts </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--@endcan--}}
            @if(Auth::id() === 1)
                <li class="treeview">
                    <a href="#">
                        <i style="color: #ff8ba7" class="fa fa-bars"></i>
                        <span>Export</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('exports.uploadMachine')}}">
                                <i class="fa fa-desktop"></i><span>Machine</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('exports.uploadPart')}}">
                                <i class="fa fa-list-alt"></i><span>Part</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('exports.uploadParameter')}}">
                                <i style="color: #ff8ba7" class="fa fa-bars"></i><span>Parameter</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i style="color: #ff8ba7" class="fa fa-bars"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        @if(auth()->user()->can('view users')|| auth()->user()->can('edit users')||auth()->user()->can('add users') ||auth()->user()->can('delete users '))
                            <li>
                                <a href="{{route('users.index')}}">
                                    <i style="color: #ea5455" class="fa fa-users"></i> <span>Users </span>
                                </a>
                            </li>
                        @endif
                        @if(auth()->user()->can('view role') || auth()->user()->can('edit role')  ||  auth()->user()->can('add role')  ||  auth()->user()->can('delete role') )
                            <li>
                                <a href="{{url('roles')}}">
                                    <i style="color: #f0134d" class="glyphicon glyphicon-asterisk"></i>
                                    <span>Roles </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <li>
                <a href="{{route('seels.index')}}">
                    <i style="color: #bcff2f" class="fa fa-industry"></i> <span>Seel</span>
                </a>
            </li>

            <li>
                <a href="{{route('areas.index')}}">
                    <i style="color: #ffcc00" class="fa fa-object-group"></i> <span>Areas</span>
                </a>
            </li>

            <li>
                <a href="{{route('machines.index')}}">
                    <i style="color: #f5f0e3" class="fa fa-desktop"></i>
                    <span>Machines</span>
                </a>
            </li>

            @if( auth()->user()->can('view partNumber')  ||   auth()->user()->can('edit partNumber') || auth()->user()->can('add partNumber') || auth()->user()->can('delete partNumber'))
                <li>
                    <a href="{{route('parts.index')}}">
                        <i style="color: #0c9463" class="fa fa-list-alt"></i> <span>Part Numbers</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{url('plan')}}">
                    <i style="color: #40bfc1" class="fa fa-sitemap"></i> <span>Plan</span>
                </a>
            </li>

            <li>
                <a href="{{url('allPosts')}}">
                    <i style="color: #2cf501" class="fa fa-check-square-o"></i> <span>Posts</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i style="color: #ff8ba7" class="fa fa-bars"></i> <span>Parameters</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('parameter/Core')}}">
                            <i style="color: #ff6f5e" class="fa fa-circle"></i> <span>Core</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/CylTemp')}}">
                            <i style="color: #f5f0e3" class="fa fa-circle"></i> <span>Cyl Temp</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Dosage')}}">
                            <i style="color: #40bfc1" class="fa fa-circle"></i> <span>Dosage</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Ejectors')}}">
                            <i style="color: #ede59a" class="fa fa-circle"></i> <span>Ejectors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Holding')}}">
                            <i style="color: #d5c455" class="fa fa-circle"></i> <span>Holding</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/HotRunnerTemp')}}">
                            <i style="color: #fddb3a" class="fa fa-circle"></i> <span>Hot Runner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Injection')}}">
                            <i style="color: #be9fe1" class="fa fa-circle"></i> <span>Injection</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Monitoring')}}">
                            <i style="color: #c9b6e4" class="fa fa-circle"></i> <span>Monitoring</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/Mould')}}">
                            <i style="color: #e1ccec" class="fa fa-circle"></i> <span>Mould</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/MouldTemp')}}">
                            <i style="color: #bbe1fa" class="fa fa-circle"></i> <span>Mould Temp</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('parameter/ShortStroke')}}">
                            <i style="color: #faaff2" class="fa fa-circle"></i> <span>ShortStroke</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i style="color: #ff0e1b" class="fa fa-bug"></i> <span>Issues</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('toolIssues')}}">
                            <i style="color: #ff6868" class="fa fa-bug"></i> <span>Tool Issues</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('qualityIssues')}}">
                            <i style="color: #cc451f" class="fa fa-bug"></i> <span>Quality Issue</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('maintenanceIssues')}}">
                            <i style="color: #cc6055" class="fa fa-bug"></i> <span>Maintenance Issue</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="{{url('allBn')}}">
                    <i style="color: #f58d00" class="fa fa-circle-o"></i> <span>BN</span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i style="color: #ffca57" class="fa fa-wrench"></i> <span>Tool Request</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('toolRequest')}}">
                            <i style="color: #ff6666" class="fa fa-wrench"></i> <span>Tool Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('RequestStatus')}}">
                            <i style="color: #cc0066"
                               class="glyphicon glyphicon-info-sign"></i><span>Request Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('total/tool/request')}}">
                            <i style="color: #66cccc" class="glyphicon glyphicon-transfer"></i>
                            <span>All Requests</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i style="color: #ff4e0d" class="glyphicon glyphicon-list-alt"></i> <span>Quality Request</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('qualityRequest')}}">
                            <i style="color: #ff6666" class="glyphicon glyphicon-list-alt"></i>
                            <span>Quality Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('QualityRequest/Status')}}">
                            <i style="color: #cc0066"
                               class="glyphicon glyphicon-info-sign"></i><span>Request Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('total/quality/request')}}">
                            <i style="color: #66cccc" class="glyphicon glyphicon-transfer"></i>
                            <span>All Requests</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i style="color: #ff7d59" class="glyphicon glyphicon-cog"></i> <span>Maintenance Request</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('mainRequest')}}">
                            <i style="color: #ff8aa2" class="glyphicon glyphicon-cog"></i>
                            <span>Maintenance Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('MainRequest/Status')}}">
                            <i style="color: #cc436f"
                               class="glyphicon glyphicon-info-sign"></i><span>Request Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('total/main/request')}}">
                            <i style="color: #ff2776" class="glyphicon glyphicon-transfer"></i>
                            <span>All Requests</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{url('gm')}}">
                    <i style="color: #2c786c" class="fa fa-clock-o"></i> <span>GM</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
