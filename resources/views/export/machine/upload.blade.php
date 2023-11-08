@extends('admin.layouts.master')

@section('title')
    Export Machine By Excel
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
                        <i class="fa fa-desktop"></i> &nbsp; Export Machine By Excel
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
                    <form action="{{route('exports.uploadMachineData')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input class="form-control" type="file" name="excleFile">
                        <button class="btn btn-primary form-control" type="submit">Upload</button>
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
