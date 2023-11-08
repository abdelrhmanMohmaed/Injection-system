@extends('admin.layouts.master')
@section('title')
    Charts
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Charts
        </h1>
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('From')}}</label>
                        <input class="form-control" name="from" id="from" type="date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('To')}}</label>
                        <input class="form-control" name="to" id="to" type="date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <input style="margin-top: 24px" class="btn btn-primary" type="submit" id="search" value="Filter">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="TRRChart" width="200" height="200"></div>
                </div>
                <div class="col-md-6">
                    <div id="inspectTRRChart" width="200" height="200"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div id="PaintTypeChart" width="200" height="200"></div>
                </div>
                <div class="col-md-6">
                    <div id="inspectPaintTypeChart" width="200" height="200">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div id="productionChart" width="200" height="200"></div>
                </div>
                <div class="col-md-6">
                    <div id="laserChart" width="200" height="200"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="container" width="200" height="200"></div>
                </div>
                <div class="col-md-6">
                    <div id="laserChart" width="200" height="200"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div id="inspectionTotal" width="200" height="200"></div>
                </div>
            </div>
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
    @include('admin.Charts.chartJs')
    <script>
        $('body').addClass('sidebar-collapse');
        $('#search').click(function () {
            var From=$('#from').val();
            var to=$('#to').val();
            window.location.href='{{url('Charts/')}}/'+From+'/'+to;
        })
    </script>
@endsection
