@extends('admin.layouts.master')
@section('title')
    Quality Request
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quality Request
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
                                Quality Request </h3>
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
                                    <td>@{{req.issue}}</td>
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
            @include('admin.includes.QualityAction')
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
                    issue_id: [],
                    action: '',
                    user_id: '',
                    shift: '',
                },
                request: '',
                issues: [],
                users: [],
            },
            mounted() {
                this.getRequests();
                this.newRequest();
            },
            computed: {},
            methods: {
                getRequests() {
                    axios.get("{{url('get/QualityRequests')}}")
                        .then((response) => {
                            this.newreq = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                newRequest() {
                    socket.on('fetchQualityRequest', (data) => {
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
                        sta = 'Pending Production';
                    }
                    else if (status == 2) {
                        sta = 'Closed';
                    } else {
                        console.log('');
                    }
                    return this.status = sta;
                },
                addAction: function (req) {
                    $('#QualityActionModal').modal('show');
                    this.request = req;
                    this.issues={!! \App\Models\Issue::where('type',\App\Helper\IssueType::Quality)->get()->toJson() !!};
                    axios.get("{{url('api/get/users')}}")
                        .then((response) => {
                            this.users = response.data;
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                submitAction: function () {
                    var form =document.getElementById('QualityActionForm');
                    var formData=new FormData(form);
                    formData.append('request_id', this.request.id);
                    axios.post(`{{url('add/qualityAction')}}`,formData).then((response) => {
                        this.newreq.splice(this.newreq.indexOf(this.request), 1);
                        this.addValue.issue_id = '';
                        this.addValue.user_id = '';
                        this.addValue.action = '';
                        this.addValue.shift = '';
                        this.request = '';
                        $('#QualityActionModal').modal('hide');
                        if(response.data.status!='{{\App\Helper\QualityStatus::Closed}}'){
                            socket.emit('newQualityAction', {data: response.data});
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
