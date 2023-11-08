@extends('admin.layouts.master')
@section('title')
    Areas
@endsection

@section('css')
    <style>
        html, body {
            background-image: url('{{url('public/img/bg3.jpg')}}');
        }

        .widget-user .widget-user-image > img {
            width: 175px !important;
        }

        .widget-user .widget-user-image {
            position: absolute;
            top: 65px;
            left: 35% !important;
        }

        .direct-chat-messages {
            height: 215px !important;
        }

        .direct-chat-contacts {
            height: 215px !important;
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
                    <div class="box box-solid box-primary" style="background: #ecf0f5;">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="fa fa-object-group"></i>&nbsp;
                                Areas
                            </h3>
                            <div class="box-tools">
                                <a href="{{route('areas.details')}}" class="btn bg-navy">All Details</a>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            {{--                            @dump($areas)--}}
                            @foreach($areas as $key => $value)
                                <a href="{{route('areas.show', $key)}}">
                                    <div class="col-md-4">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="box box-widget widget-user">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="widget-user-header bg-aqua-active">
                                                <h3 class="widget-user-username">Area - {{$key}}</h3>
                                                <h5 class="widget-user-desc">{{count($value)}} Machine</h5>
                                            </div>
                                            <div class="widget-user-image">
                                                <img class="img-circle" src="{{url('public/img/machine.jpg')}}"
                                                     alt="Machine">
                                            </div>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header">3</h5>
                                                            <span class="description-text"><i class="fa fa-circle"
                                                                                              style="color: #2cf501"></i>Working</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header">3</h5>
                                                            <span class="description-text"><i class="fa fa-circle"
                                                                                              style="color: #ff2c36"></i> Break Down</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4">
                                                        <div class="description-block">
                                                            <h5 class="description-header">2</h5>
                                                            <span class="description-text"><i class="fa fa-circle"
                                                                                              style="color: #f9f700"></i> Change Over</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
