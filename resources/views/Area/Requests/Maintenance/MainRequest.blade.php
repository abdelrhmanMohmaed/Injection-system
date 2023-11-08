@extends('admin.layouts.master')
@section('title')
    Maintenance Request
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Maintenance Request
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
                                Maintenance Request </h3>
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
                                    <th>Machine #</th>
                                    <th>Issue</th>
                                    <th>Sub Issue</th>
                                    <th>Status</th>
                                    <th>Shift</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="req in newreq">
                                    <td>@{{req.id}}</td>
                                    <td>@{{req.part.part_no}}</td>
                                    <td>@{{req.machine.id}}</td>
                                    <td>@{{req.issue.name}}</td>
                                    <td v-if="req.sub_issue">@{{req.sub_issue.name}}</td>
                                    <td v-else>-</td>
                                    <td>@{{getStatus(req.status)}}</td>
                                    <td>@{{req.shift }}</td>
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
            @include('admin.includes.MainAction')
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
                addValue: {
                    issue: '',
                    sub_issue_id: '',
                    action: '',
                    user_id: '',
                    shift: '',
                    type: '',
                    target_date: '',
                    tool_issue: '',
                    confirm_issue: '',
                },
                request: '',
                issues: [],
                tool_issues: [],
                users: [],
            },
            mounted() {
                this.getRequests();
                this.newRequest();
            },
            computed: {},
            methods: {
                getRequests() {
                    axios.get("{{url('get/MainRequests')}}")
                        .then((response) => {
                            this.newreq = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                newRequest() {
                    socket.on('fetchMainRequest', (data) => {
                        this.newreq.unshift(data.data);
                        var beeb = new Audio('{{url('public/bus-horn.mp3')}}');
                        beeb.play();
                    });
                },
                getStatus: function (status) {
                    let sta;
                    if (status == 0) {
                        sta = 'Open';
                    }else if (status == 1) {
                        sta = 'ToolShop Issue';
                    }else if (status == 2) {
                        sta = 'Process Issue';
                    }else if (status == 3) {
                        sta = 'NeedTool Download';
                    }else if (status == 4) {
                        sta = 'Tool Downloaded';
                    }else if (status == 5) {
                        sta = 'Reject From Production';
                    }else if (status == 6) {
                        sta = 'Closed';
                    }else if (status == 7) {
                        sta = 'Closed From Maintenance';
                    }else {
                        console.log('');
                    }
                    return this.status = sta;
                },
                addAction: function (req) {
                    $('#MainActionModal').modal('show');
                    this.request = req;
                    this.issues={!! \App\Models\Issue::with('subIssue')
                    ->where('type',\App\Helper\IssueType::Maintenance)
                    ->get()->toJson() !!};
                    this.tool_issues={!! \App\Models\Issue::where('type',\App\Helper\IssueType::Tooling)
                    ->get()->toJson() !!};
                    axios.get("{{url('api/get/users')}}")
                        .then((response) => {
                            this.users = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                submitAction: function () {
                    var form =document.getElementById('MainActionForm');
                    var formData=new FormData(form);
                    formData.append('request_id', this.request.id);
                    if(this.addValue.issue !=''){
                        formData.append('issue_id', this.addValue.issue.id);
                    }
                    formData.delete('issue');
                    formData.delete('confirm_issue');
                    axios.post(`{{url('add/mainAction')}}`,formData).then((response) => {
                        this.addValue.issue = '';
                        this.addValue.sub_issue_id = '';
                        this.addValue.action = '';
                        this.addValue.user_id = '';
                        this.addValue.shift = '';
                        this.addValue.type = '';
                        this.addValue.target_date = '';
                        this.addValue.tool_issue = '';
                        this.addValue.confirm_issue = '';
                        $('#MainActionModal').modal('hide');
                        if(response.data['main'].status!='{{\App\Helper\MainStatus::Open}}'){
                            this.newreq.splice(this.newreq.indexOf(this.request), 1);
                            this.request = '';
                            socket.emit('newMainAction', {data: response.data['main']});
                        }
                        if(response.data['tool']!=null){
                            socket.emit('newToolRequest', {data: response.data['tool']});
                        }
                            socket.emit('notification', {data: 'test'});
                    }).catch((error) => {
                        console.log(error);
                    });
                },
            }
        });
    </script>
@endsection
