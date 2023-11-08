@extends('admin.layouts.master')
@section('title')
    Tool Request
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tool Request
        </h1>
    </section>
@endsection
@section('content')
    <div id="allRequests">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid box-info">
                        <div class="box-header">
                            <h3 class="box-title">
                                Tool Request </h3>
                            <div class="box-tools">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Part</th>
                                    <th>Tool #</th>
                                    <th>Machine #</th>
                                    <th>Issue</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Importance</th>
                                    <th>Shift</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="req in newreq">
                                    <td>@{{req.id}}</td>
                                    <td>@{{req.part.part_no}}</td>
                                    <td>@{{req.part.tool_no}}</td>
                                    <td>@{{req.part.machine.id}}</td>
                                    <td>@{{req.issue.name}}</td>
                                    <td>@{{ getPriority(req.priority) }}</td>
                                    <td>@{{ getStatus(req.status) }}</td>
                                    <td>@{{ getImportance(req.importance) }}</td>
                                    <td>@{{ req.shift }}</td>
                                    <td>@{{req.updated_at}}</td>
                                    <td>
                                        <a class="btn btn-info" @click="addAction(req)"><i class="fa fa-edit"></i>Action</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            {{--@include('admin.includes.model2')--}}
            @include('admin.includes.action')
        </section>
    </div>
    <!-- /.content -->
@endsection
@section('js')
    <script src="https://unpkg.com/vue"></script>
    <script src="{{url('public/vuescript.js')}}"></script>
    <script src="{{url('public/axiosscript.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script>
        var socket = io.connect('http://10.107.32.7:5050', {query: 'user_id={{ auth()->id() }}'});
        var tool = new Vue({
            el: '#allRequests',
            data: {
                user: '{!! auth()->check() ?auth()->id() :'null' !!}',
                newreq: [],
                status: '',
                priority: '',
                importance: '',
                addValue: {
                    type: '',
                    action: '',
                    reject_sample: '',
                    counter: '',
                    user_id: '',
                    shift: '',
                    cav_num: '',
                    cav: [],
                },
                request: '',
                users: [],
            },
            mounted() {
                this.getRequests();
                this.newRequest();
            },
            computed: {},
            methods: {
                getRequests() {
                    axios.get("{{url('get/allRequests')}}")
                        .then((response) => {
                            this.newreq = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                newRequest() {
                    socket.on('fetchRequest', (data) => {
                        this.newreq.unshift(data.data);
                        var beeb = new Audio('{{url('public/bus-horn.mp3')}}');
                        beeb.play();
                    });
                },
                getStatus: function (status) {
                    let sta;
                    if (status == 0) {
                        sta = 'Open';
                    }
                    else if (status == 1) {
                        sta = 'InToolShop';
                    }
                    else if (status == 2) {
                        sta = 'CloseFromTool';
                    }
                    else if (status == 3) {
                        sta = 'Closed';
                    }
                    else if (status == 4) {
                        sta = 'NeedToolShop';
                    }
                    else if (status == 5) {
                        sta = 'RejectFromProduction';
                    } else {
                        console.log('');
                    }
                    return this.status = sta;
                },
                getPriority: function (priority) {
                    let prio;
                    if (priority == 0) {
                        prio = 'Production';
                    }
                    else if (priority == 1) {
                        prio = 'EOK';
                    } else {
                        console.log('');
                    }
                    return this.priority = prio;
                },
                getImportance: function (val) {
                    let imp;
                    if (val == 0) {
                        imp = 'Normal';
                    }
                    else if (val == 1) {
                        imp = 'Mid';
                    }
                    else if (val == 2) {
                        imp = 'High';
                    } else {
                        console.log('');
                    }
                    return this.importance = imp;
                },
                addAction: function (req) {
                    $('#actionModal').modal('show');
                    this.request = req;
                    axios.get("{{url('api/get/users')}}")
                        .then((response) => {
                            this.users = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                submitAction: function () {
                    axios.post(`{{url('add/toolAction')}}`, {
                        type: this.addValue.type,
                        cav_num: this.addValue.cav_num,
                        cav: this.addValue.cav,
                        reject_sample: this.addValue.reject_sample,
                        user_id: this.addValue.user_id,
                        action: this.addValue.action,
                        shift: this.addValue.shift,
                        counter: this.addValue.counter,
                        request_id: this.request.id,
                    }).then((response) => {
                        this.addValue.type = '';
                        this.addValue.cav_num = '';
                        this.addValue.cav = '';
                        this.addValue.user_id = '';
                        this.addValue.action = '';
                        this.addValue.shift = '';
                        this.addValue.reject_sample = '';
                        this.addValue.counter = '';
                        this.newreq.splice(this.newreq.indexOf(this.request), 1);
                        this.request = '';
                        $('#actionModal').modal('hide');
                        if (response.data.option == 'transfer') {

                        } else {

                            if (response.data['quality']!=null) {
                                socket.emit('newQualityRequest', {data: response.data['quality']});
                            }
                            socket.emit('newToolAction', {data: response.data['tool']});
                            socket.emit('notification', {data: 'test'});
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
                },
            }
        });
    </script>
@endsection
