@extends('admin.layouts.master')
@section('title')
    Quality Request
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Request Status
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
                                Request Status </h3>
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
                                    <th>Q.Action</th>
                                    <th>Issues</th>
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
                                    <td>@{{ getStatus(req.status) }}</td>
                                    <td>@{{ req.action.action }}</td>
                                    <td><span v-for="issue in req.action.issues">@{{ issue.issue.name }}<br></span></td>
                                    <td>@{{req.action.shift}}</td>
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
            @include('admin.includes.QualityProductionResp')

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
                request: '',
                action: '',
            },
            mounted() {
                this.getRequests();
                this.newAction();
            },
            methods: {
                getRequests() {
                    this.newreq ={!! $actions->toJson() !!};
                },
                newAction() {
                    socket.on('fetchQualityAction', (data) => {
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
                    this.request = req;
                        $('#QualityProductionRespModal').modal('show');
                },
                lastAction: function () {
                    axios.post("{{url('qualityRequest/production/action')}}",{
                      action:this.action,id:this.request.id,
                    }).then((response) => {
                        this.newreq.splice(this.newreq.indexOf(this.request), 1);
                            $('#QualityProductionRespModal').modal('hide');
                                socket.emit('notification', {data: 'test'});
                            this.request = '';
                            this.action = '';
                        }).catch((error) => {
                        console.log(error);
                    });
                },
            }
        });
    </script>
@endsection
