@extends('admin.layouts.master')
@section('title')
    Export Parameter By Excel
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-bars"></i> &nbsp;  Export Parameter By Excel
                        </h3>
                        <div class="box-tools">
                            <a class="btn bg-navy" title="Plan Sample" onclick="downloadPlan()">
                                <i class="fa fa-download"></i>
                                Plan Sample
                            </a>

                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive">

                            <form action="{{route('exports.uploadParameterData')}}" enctype="multipart/form-data" method="post">
                            @csrf
                                <div class="col-md-6">
                            <label>Cyl Temp</label>
                            <input class="form-control" type="file" name="cylTemp">
                            <label>Hot Runner</label>
                            <input class="form-control" type="file" name="hotRunner">
                            <label>Mould Temp</label>
                            <input class="form-control" type="file" name="mould_temp">
                            <label>Injection</label>
                            <input class="form-control" type="file" name="injection">
                            <label>Holding</label>
                            <input class="form-control" type="file" name="holding">
                            <label>Dosage</label>
                            <input class="form-control" type="file" name="dosage">
                                </div>

                                    <div class="col-md-6">
                                        <label>Mould</label>
                                        <input class="form-control" type="file" name="mould">
                                        <label>Ejectors</label>
                                        <input class="form-control" type="file" name="ejector">
                                        <label>Monitoring</label>
                                        <input class="form-control" type="file" name="monitoring">
                                        <label>Core</label>
                                        <input class="form-control" type="file" name="core">
                                        <label>Short Stroke</label>
                                        <input class="form-control" type="file" name="Short_stroke">
                                    </div>
                            <div class="mt-4">
                                <button class="btn btn-primary form-control" type="submit">Add</button>

                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        function downloadPlan() {
            $.ajax({
                type: 'get',
                url: '{{url('download/plan')}}',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'Plan.xlsx';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                }
            });
        }
    </script>
@endsection
