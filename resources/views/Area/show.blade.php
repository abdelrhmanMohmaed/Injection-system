@extends('admin.layouts.master')
@section('title')
    Area
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

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

        .input-width {
            width: 80px;
        }

        .input-width2 {
            width: 40px !important;
        }

        .nav > li > a {
            padding: 10px 6px !important;
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
                                <i class="fa fa-object-group"></i>&nbsp;
                                Area
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <section>
                                <div class="box" v-for="(key, value) in area">
                                    <!-- Box-Header -->
                                    <div class="box-header with-border">
                                        <center>
                                            <h3 class="box-title">
                                                <span class="label label-info">
                                                    Area @{{value}}
                                                </span>
                                            </h3>
                                        </center>

                                        <div class="box-tools pull-right">

                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                    data-toggle="tooltip"
                                                    title="Collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                            <button type="button" class="btn btn-box-tool" data-widget="remove"
                                                    data-toggle="tooltip"
                                                    title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Box-Header -->

                                    <!-- Box-Body -->
                                    <div class="box-LObody">
                                        <div v-for="(item, index) in key" class="col-md-3">
                                            <div class="box box-primary  direct-chat direct-chat-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">
                                                        Machine - @{{item.id}} - @{{item.type}}
                                                    </h3>
                                                    <div class="box-tools pull-right">

                                                        <span data-toggle="tooltip"
                                                              v-if="item.posts[0] && item.plans[0]"
                                                              class="badge badge-pill label-danger"
                                                              data-original-title="Missing=">
                                                           @{{ item.plans[item.plans.length-1].demand - item.posts[item.posts.length-1].counter }}
                                                        </span>

                                                        <span data-toggle="tooltip" v-else
                                                              class="badge badge-pill label-danger"
                                                              data-original-title="Missing=">
                                                        </span>

                                                        <button class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-minus"></i>
                                                        </button>

                                                        <button class="btn btn-box-tool" data-toggle="tooltip"
                                                                data-widget="chat-pane-toggle"
                                                                data-original-title="Plan">
                                                            <i class="fa fa-sitemap"></i>
                                                        </button>
                                                    </div>
                                                    {{--                                                    <div class="box-tools pull-right">--}}

                                                    {{--                                                        <span data-toggle="tooltip"--}}
                                                    {{--                                                              v-if="item.posts[0] && item.plans[0]" title=""--}}
                                                    {{--                                                              class="badge badge-pill"--}}
                                                    {{--                                                              :class="{'label-danger':  item.plans[index-1].demand - item.posts[item.posts.length-1].counter >= 0, 'label-success': item.plans[index-1].demand - item.posts[item.posts.length-1].counter < 0}"--}}
                                                    {{--                                                              data-original-title="Missing=">--}}
                                                    {{--                                                            @{{ item.plans[index-1].demand - item.posts[item.posts.length-1].counter }}--}}
                                                    {{--                                                        </span>--}}
                                                    {{--                                                        --}}{{--15398--}}
                                                    {{--                                                        <span data-toggle="tooltip" v-else title=""--}}
                                                    {{--                                                              class="badge badge-pill label-danger"--}}
                                                    {{--                                                              data-original-title="Missing=">--}}
                                                    {{--                                                        </span>--}}

                                                    {{--                                                        <button class="btn btn-box-tool" data-widget="collapse">--}}
                                                    {{--                                                            <i class="fa fa-minus"></i>--}}
                                                    {{--                                                        </button>--}}

                                                    {{--                                                        <button class="btn btn-box-tool" data-toggle="tooltip"--}}
                                                    {{--                                                                --}}{{--@click="getPlan(item.id)" title=""--}}
                                                    {{--                                                                data-widget="chat-pane-toggle"--}}
                                                    {{--                                                                data-original-title="Plan">--}}
                                                    {{--                                                            <i class="fa fa-sitemap"></i>--}}
                                                    {{--                                                        </button>--}}

                                                    {{--                                                    </div>--}}
                                                </div>

                                                <div class="box-body" style="display: block;">
                                                    <div class="direct-chat-messages">
                                                        <div class="direct-chat-msg">
                                                                <span
                                                                    class="direct-chat-name contacts-list-img pull-left">
                                                                    Part
                                                                </span>

                                                            <div v-if="item.posts[0]">
                                                                <div class="direct-chat-text"
                                                                     v-if="item.posts[item.posts.length-1].type == '{{\App\Helper\PostType::ChangeOver}}'">
                                                                    Change Over
                                                                </div>
                                                                <div class="direct-chat-text" v-else>
                                                                    @{{ item.posts[item.posts.length-1].part.part_no }}
                                                                </div>
                                                            </div>
                                                            <div v-else class="direct-chat-text">
                                                                No Part
                                                            </div>

                                                            <span class="direct-chat-name contacts-list-img pull-left">Counter</span>

                                                            <div v-if="item.posts[0]" class="direct-chat-text">
                                                                @{{ item.posts[item.posts.length-1].counter }}
                                                            </div>
                                                            <div v-else class="direct-chat-text">
                                                                -
                                                            </div>

                                                            <span class="direct-chat-name contacts-list-img pull-left">Target</span>

                                                            <div class="direct-chat-text"
                                                                 v-if="item.posts[0] && item.plans[0]">
                                                                @{{ item.plans[0].demand }}
                                                            </div>
                                                            <div v-else class="direct-chat-text">
                                                                -
                                                            </div>

                                                            <span class="direct-chat-name contacts-list-img pull-left">Missing</span>

                                                            <div v-if="item.posts[0] && item.plans[0]"
                                                                 class="direct-chat-text">

                                                                @{{ item.plans[item.plans.length-1].demand -
                                                                item.posts[item.posts.length-1].counter }}
                                                            </div>
                                                            <div v-else class="direct-chat-text">
                                                                -
                                                            </div>

                                                            <span
                                                                class="direct-chat-name contacts-list-img pull-left">HRs</span>
                                                            <div class="direct-chat-text"
                                                                 v-if="item.posts[0] && item.plans[0]">
                                                                @{{ (item.plans[item.plans.length-1].demand -
                                                                item.posts[item.posts.length-1].counter)/
                                                                item.plans[item.plans.length-1].part.rate}}
                                                            </div>
                                                            <div class="direct-chat-text" v-else>
                                                                -
                                                            </div>
                                                            <span
                                                                class="direct-chat-name contacts-list-img pull-left">BN</span>
                                                            <div class="direct-chat-text" v-if="item.posts[0]">
                                                                @{{item.posts[item.posts.length- 1].bn_id }}
                                                            </div>
                                                            <div class="direct-chat-text" v-else>
                                                                -
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div class="direct-chat-messages">--}}
                                                    {{--                                                        <div class="direct-chat-msg">--}}
                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">Part</span>--}}

                                                    {{--                                                            <div v-if="item.posts[0]">--}}

                                                    {{--                                                                <div class="direct-chat-text"--}}
                                                    {{--                                                                     v-if="item.posts[item.posts.length-1].type=='{{\App\Helper\PostType::ChangeOver}}'">--}}
                                                    {{--                                                                    Change Over--}}
                                                    {{--                                                                </div>--}}

                                                    {{--                                                                <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                    @{{ item.posts[item.posts.length-1].part.part_no }}--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                No Part--}}
                                                    {{--                                                            </div>--}}


                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">Counter</span>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-if="item.posts[0]">--}}
                                                    {{--                                                                @{{ item.posts[item.posts.length-1].counter }}--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                ---}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">Target</span>--}}
                                                    {{--                                                            <div class="direct-chat-text"--}}
                                                    {{--                                                                 v-if="item.plans[0] && item.plans && item.plans.length > index && item.plans[index].demand">--}}
                                                    {{--                                                                @{{ item.plans[index-1].demand }}--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                ---}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">Missing</span>--}}
                                                    {{--                                                            <div class="direct-chat-text"--}}
                                                    {{--                                                                 v-if="item.posts[0] &&item.plans[0]">--}}
                                                    {{--                                                                @{{ item.plans[index-1].demand ---}}
                                                    {{--                                                                item.posts[item.posts.length-1].counter }}--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                ---}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">HRs</span>--}}
                                                    {{--                                                            <div class="direct-chat-text"--}}
                                                    {{--                                                                 v-if="item.posts[0] && item.plans[0]">--}}
                                                    {{--                                                                @{{ (item.plans[item.plans.length-1].demand ---}}
                                                    {{--                                                                item.posts[item.posts.length-1].counter)/--}}
                                                    {{--                                                                item.plans[item.plans.length-1].part.rate}}--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                ---}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <span class="direct-chat-name contacts-list-img pull-left">BN</span>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-if="item.posts[0]">--}}
                                                    {{--                                                                @{{item.posts[item.posts.length- 1].bn_id }}--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="direct-chat-text" v-else>--}}
                                                    {{--                                                                ---}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}

                                                    <!-- Display: P-N, Demand, Priories, Week -->
                                                    @include('Area.partials.planModel')
                                                    <!-- Display: P-N, Demand, Priories, Week -->
                                                </div>
                                                <!-- MakePost, requestModel, GM, ChangeParameter -->
                                                @include('Area.partials.actionButtons')
                                                <!-- MakePost, requestModel, GM, ChangeParameter -->
                                            </div>
                                        </div>
                                        {{--@endforeach--}}
                                    </div>
                                    <!-- Box-Body -->
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
            @include('Area.partials.postModel')


            @include('admin.includes.requestModel')
            @include('admin.includes.PostParameterModel')

        </section>
    </div>

    <div id="postDataSection">
        @include('admin.includes.model2')
    </div>
@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#partNumberPost').select2();--}}
{{--        });--}}
{{--    </script>--}}

    <script src="https://unpkg.com/vue"></script>
    <script src="{{url('public/vuescript.js')}}"></script>
    <script src="{{url('public/axiosscript.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>

    @include('Area.js')
@endsection
