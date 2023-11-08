@extends('admin.layouts.master')
@section('title')
    Area
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Area
        </h1>
    </section>
@endsection
@section('css')
    <style>
        .direct-chat-messages {
            height: 252px !important;
        }

        .direct-chat-contacts {
            height: 252px !important;
        }

        .padding-class {
            padding-bottom: 7px;
        }

        .first-top-padding {
            padding-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div id="app">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title">
                                Area </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            @foreach($area as $key=>$value)
                                <section id="area{{$key}}">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <center><h3 class="box-title"><span
                                                        class="label label-info">Area {{$key}}</span></h3></center>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                        data-toggle="tooltip"
                                                        title="Collapse">
                                                    <i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"
                                                        data-toggle="tooltip"
                                                        title="Remove">
                                                    <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            @foreach($value as $item)
                                                <div class="col-md-3">
                                                    <div class="box box-primary  direct-chat direct-chat-primary">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Machine {{$item->id}}</h3>
                                                            {{--<h3 class="box-title">Machine @{{area.id}}</h3>--}}
                                                            <div class="box-tools pull-right">
                                                        <span data-toggle="tooltip" title=""
                                                              class="badge badge-pill label-danger"
                                                              data-original-title="Missing={{((@$item->plans[0]->demand)??'0')-(@$item->posts->last()->counter ??'0')}}">
                                                            {{((@$item->plans[0]->demand)??'0')-(@$item->posts->last()->counter ??'0')}}</span>
                                                                <button class="btn btn-box-tool" data-widget="collapse">
                                                                    <i
                                                                        class="fa fa-minus"></i></button>
                                                                <button class="btn btn-box-tool" data-toggle="tooltip"
                                                                        onclick="getPlan({{$item->id}})" title=""
                                                                        data-widget="chat-pane-toggle"
                                                                        data-original-title="Plan"><i
                                                                        class="fa fa-sitemap"></i>
                                                                </button>
                                                                {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                                                            </div>
                                                        </div>
                                                        <div class="box-body" style="display: block;">
                                                            <div class="direct-chat-messages">
                                                                <div class="direct-chat-msg">
                                                                <span
                                                                    class="direct-chat-name contacts-list-img pull-left">Part</span>
                                                                    <div class="direct-chat-text">

                                                                        {{((@$item->posts->last()->type==\App\Helper\PostType::ChangeOver)?'Change Over'
                                                                        :@$item->posts->last()->part->part_no)??'No Part'}}
                                                                        {{--@{{(area.parts[0].part_no)? area.parts[0].part_no :'No Part'}}--}}
                                                                    </div>
                                                                    <span
                                                                        class="direct-chat-name contacts-list-img pull-left">Counter</span>
                                                                    <div class="direct-chat-text">
                                                                        {{$counter=@$item->posts->last()->counter ??'0'}}
                                                                    </div>
                                                                    <span
                                                                        class="direct-chat-name contacts-list-img pull-left">Target</span>
                                                                    <div class="direct-chat-text">
                                                                        {{$demand=(@$item->plans[0]->demand)??'0'}}
                                                                    </div>
                                                                    <span
                                                                        class="direct-chat-name contacts-list-img pull-left">Missing</span>
                                                                    <div class="direct-chat-text">
                                                                        {{@$demand-@$counter}}
                                                                    </div>
                                                                    <span
                                                                        class="direct-chat-name contacts-list-img pull-left">HRs</span>
                                                                    <div class="direct-chat-text">
                                                                        {{($rate=@$item->plans[0]->part->rate)?($demand-$counter)/$rate:0}}
                                                                        {{--@{{(area->parts[0].rate)?(8000-2400)/area->parts[0].rate:0}}--}}
                                                                    </div>
                                                                    <span
                                                                        class="direct-chat-name contacts-list-img pull-left">BN</span>
                                                                    <div class="direct-chat-text">
                                                                        {{$bn=@$item->posts->last()->bn_id ?? '0'}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="direct-chat-contacts "
                                                                 id="showPlan{{$item->id}}"
                                                                 style="border-radius: 10%">
                                                            </div>
                                                        </div>
                                                        <div class="box-footer text-center" style="display: block;">
                                                            <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" onclick="post({{$item->id}})"
                                                                class="btn btn-success">Post</button>
                                                        {{--<button type="button" class="btn btn-dark" onclick="requesting({{$item->id}})">Request</button>--}}
                                                        {{--<a  class="btn btn-dark" href="{{url('require/request/model/'.$item->id)}}">Request</a>--}}
                                                        <button type="button" class="btn btn-dark"
                                                                @click="requestModel('{{$item->id}}')">Request</button>
                                                        <button type="button" onclick="GM('{{$item->id}}')"
                                                                class="btn btn-danger">G.M</button><br>
                                                        <button type="button"
                                                                onclick="ChangeParameter('{{$bn}}','{{$item->id}}')"
                                                                class="btn btn-info">Parameters</button>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.includes.requestModel')

        </section>
    </div>
    <div id="postDataSection">
        @include('admin.includes.model2')
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/vue"></script>
    <script src="{{url('public/vuescript.js')}}"></script>
    <script src="{{url('public/axiosscript.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script type="application/javascript">
        var socket = io.connect('http://10.107.32.7:5050', {query: 'user_id={{ auth()->id() }}'});
        var tool = new Vue({
            el: '#app',
            data: {
                user: '{!! auth()->check() ?auth()->id() :'null' !!}',
                newreq: [],

                part_id: '',
                user_id: '',
                shift: '',
                importance: '',
                issue_id: '',
                priority: '',
                machine: [],
                part: [],
                issues: [],
                users: [],
                // notifications:[],
                // notifiCount:'',
            },
            mounted() {
                // this.newRequest();
            },
            methods: {
                submitTool() {
                    axios.post('{{url('create/toolRequest')}}', {
                        part_id: this.part_id,
                        user_id: this.user_id,
                        shift: this.shift,
                        importance: this.importance,
                        issue_id: this.issue_id,
                        priority: this.priority,
                    })
                        .then((response) => {
                            this.newreq.unshift(response.data);
                            this.part_id = '';
                            this.user_id = '';
                            this.shift = '';
                            this.importance = '';
                            this.issue_id = '';
                            this.priority = '';
                            socket.emit('newToolRequest', {data: response.data});
                            socket.emit('notification', {data: 'test'});
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                requestModel(id) {
                    axios.get("{{url('require/request/model/')}}/" + id)
                        .then((response) => {
                            this.machine = response.data['machine'];
                            this.part = response.data['machine'].parts;
                            this.users = response.data['users'];
                            this.issues = response.data['issues'];
                            $('#RequestsModal').modal('show');
                        }).catch((error) => {
                        console.log(error);
                    });
                },
                newRequest() {
                    socket.on('fetchRequest', (data) => {
                        if (this.user) {
                            if (this.user !== data.data.user_id) {
                                this.newreq.unshift(data.data);
                            }
                        } else {
                            this.newreq.unshift(data.data);
                        }
                    });
                },
                post(id) {
                    axios.get("{{url('make/post/')}}/" + id)
                        .then((response) => {
                            $('#BNDetailsModal').modal('show');
                            $('#BNdetailsDiv').empty();
                            $('#BNdetailsDiv').html(response.data);
                        }).catch((error) => {
                        console.log(error);
                    });
                },
            }
        });
    </script>
    <script type="application/javascript">

        function post(machine) {
            $.ajax({
                type: 'get',
                url: '{{url('make/post/')}}/' + machine,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            });
        }

        function ChangeParameter(bn, machine) {
            $.ajax({
                type: 'get',
                url: '{{url('machine/current/parameters')}}/' + bn + '/' + machine,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            });
        }

        function GM(machine) {
            $.ajax({
                type: 'get',
                url: '{{url('get/gm/')}}/' + machine,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            });
        }

        function getValue(id) {
            if ($('#check' + id).is(':checked')) {
                $('#value' + id).prop("disabled", false);
                $('#value' + id).css('display', 'block');
            } else {
                $('#value' + id).prop("disabled", "disabled");
                $('#value' + id).css('display', 'none');
            }
        }

        function requesting(machine) {
            $.ajax({
                type: 'get',
                url: '{{url('require/request/model')}}/' + machine,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            });
        }

        function addGM() {
            var gm_arr = $("input[name='gm_id[]']").serializeArray();
            var value_arr = $('input[name="gm_value[]"]').serializeArray();
            // ($("input[name='gm_id[]']").serializeArray()).each( function() {
            //     gm_arr.push(this.value);
            // });
            // ($('input[name="gm_value[]"]').serializeArray()).each( function() {
            //     value_arr.push(this.value);
            // });
            // $.each(($("input[name='gm_id[]']").serializeArray()), function(i,field) {
            //     gm_arr.push(field.value);});
            // $.each(($('input[name="gm_value[]"]').serializeArray()), function(i,field) {
            //     value_arr.push(field.value);});
            $.ajax({
                type: 'post',
                url: '{{url('add/gm')}}',
                data: {
                    machine_id: $('.gm_machine').val(),
                    shift: $('.gm_shift').val(),
                    gm_id: gm_arr,
                    value: value_arr,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (res) {
                    if (res == 'Done') {
                        $('#BNDetailsModal').modal('hide');
                    }
                }
            });

        }

        function getPlan(id) {
            $.ajax({
                type: 'get',
                url: '{{url('get/plan/forMachine')}}/' + id,
                success: function (res) {
                    if (res) {
                        $('#showPlan' + id).empty();
                        $('#showPlan' + id).html(res);
                    }
                }
            });
        }

        function success(res) {
            swal("", res, "success");
        }
    </script>
@endsection
