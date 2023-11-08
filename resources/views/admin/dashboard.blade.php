@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection
@section('css')
    <style>
        .content {
            background-image: url('{{url('public/img/bg3.jpg')}}');
        }
    </style>
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>

    </section>

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua-active">
                        <div class="inner">
                            <h3>{{$users}}</h3>

                            <h4>Users</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #ff2c36"  class="fa fa-users"></i>
                        </div>
                        <a href="{{url('user')}}" class="small-box-footer"> More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-orange-active">
                        <div class="inner">
                            <h3>{{$jigging}}</h3>

                            <h4>Jigging Trolleys</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #ff9b33" class="fa fa-circle"></i>
                        </div>
                        <a href="{{url('trolley/details#Jiging')}}" class="small-box-footer"> More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green-gradient">
                        <div class="inner">
                            <h3>{{$paint}}</h3>

                            <h4>Painting Trolleys</h4>
                        </div>
                        <div class="icon">
                            <i style="color: rgba(125,51,172,0.99)" class="fa fa-paint-brush"></i>
                        </div>
                        <a href="{{url('trolley/details#Painting')}}" class="small-box-footer">More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{$laser}}</h3>

                            <h4>Laser Trolleys</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #fb6b3e" class="fa fa-print"></i>
                        </div>
                        <a href="{{url('trolley/details#Laser')}}" class="small-box-footer">More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-active">
                        <div class="inner">
                            <h3>{{$inspection}}</h3>

                            <h4>Inspection Trolleys</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #7d8fff" class="fa fa-search"></i>
                        </div>
                        <a href="{{url('trolley/details#Inspection')}}" class="small-box-footer"> More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red-gradient">
                        <div class="inner">
                            <h3>{{$issues}}</h3>

                            <h4>Quality Issues Trolleys</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #0affa9" class="fa fa-bug"></i>
                        </div>
                        <a href="{{url('trolley/details#Issues')}}" class="small-box-footer"> More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>{{$parts}}</h3>

                            <h4>Part Numbers</h4>
                        </div>
                        <div class="icon">
                            <i style="color: #159c90" class="fa fa-list-alt"></i>
                        </div>
                        <a href="{{url('partNum')}}" class="small-box-footer"> More.. <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xs-12">
                <div id="productionChart" width="200" height="200"></div>
            </div>

            <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.setOptions({
                colors: ['#ef9a9a', '#5c38e1', '#ffbb55', '#f8ff46', '#24CBE5', '#31e525', '#FF9655', '#FFF263', '#6AF9C4']
            });
            var char = Highcharts.chart('productionChart', {
                chart: {
                    backgroundColor: 'rgb(225,225,225,0.7)',
                    type: 'column'
                },
                title: {
                    text: 'Production'
                },
                xAxis: {
                    categories: [
                        @foreach($keys as $key)
                            '{{$key}}',
                        @endforeach
                    ],
                    tickmarkPlacement: 'on',
                    title: {
                        text: 'Week #',
                    },
                    labels: {
                        rotation: 0,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    },
                },
                rangeSelector: {
                    enabled: true,
                },
                yAxis: {
                    // min: 0,
                    title: {
                        text: 'Qty'
                    },
                },
                legend: {
                    enabled: true,
                },
                tooltip: {
                    split: true,
                },
                series: [{
                    name: 'Painting',
                    data: [
                            @foreach($keys as $item)
                        [{{isset($painting[$item])?$painting[$item]->sum('qty'):0}}],
                        @endforeach
                    ],
                }, {
                    name: 'Laser',
                    data: [
                            @foreach($keys as $las)
                        [{{isset($laserByWeek[$las])?$laserByWeek[$las]->sum('inner_qty'):0-isset($laserByWeek[$las])?$laserByWeek[$las]->sum('qty'):0}}],
                        @endforeach
                    ],
                }, {
                    name: 'Inspection',
                    data: [
                            @foreach($keys as $ins)
                        [{{isset($inspectByWeek[$ins])?$inspectByWeek[$ins]->sum('inner_qty'):0-isset($inspectByWeek[$ins])?$inspectByWeek[$ins]->sum('qty'):0}}],
                        @endforeach
                    ],
                }, {
                    name: 'Total',
                    data: [
                            @foreach($keys as $total)
                        [{{(isset($painting[$total])?$painting[$total]->sum('qty'):0)+(isset($laserByWeek[$total])?$laserByWeek[$total]->sum('inner_qty'):0-isset($laserByWeek[$total])?$laserByWeek[$total]->sum('qty'):0)+(isset($inspectByWeek[$total])?$inspectByWeek[$total]->sum('inner_qty'):0-isset($inspectByWeek[$total])?$inspectByWeek[$total]->sum('qty'):0)}}],
                        @endforeach
                    ],

                },
                ]
            });
        });
    </script>
@endsection
