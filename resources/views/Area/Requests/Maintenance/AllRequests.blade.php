@extends('admin.layouts.master')
@section('title')
    All Maintenance Request
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Maintenance Request
        </h1>
    </section>
@endsection
@section('content')
    <!-- Main content -->
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
                            All Maintenance Request </h3>
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
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Production Action</th>
                                <th>Production Delay(H:M)</th>
                                <th>M.Action</th>
                                <th>M.Action Issue</th>
                                <th>M.Shift</th>
                                <th>M.Delay(H:M)</th>
                                <th>M.User</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $req)
                                <tr id="{{$req->id}}" name="{{$req->id}}">
                                    <td>{{$req->id}}</td>
                                    <td>{{$req->part->part_no}}</td>
                                    <td>{{$req->machine->id}}</td>
                                    <td>{{$req->issue->name}}</td>
                                    <td>{{@$req->sub_issue->name}}</td>
                                    <td>{{\App\Helper\MainStatus::getStatus($req->status) }}</td>
                                    <td>{{$req->shift }}</td>
                                    <td>{{$req->created_at}}</td>
                                    <td>{{$req->user->seel_code}}-{{$req->user->name}}</td>
                                    <td>{{$req->last_action}}</td>
                                    <td>{{intdiv($req->total_time, 60).':'. ($req->total_time % 60)}}</td>
                                    <td>{{@$req->action->action}}</td>
                                    <td>{{@$req->action->issue_action->issue->name}}-{{@$req->action->issue_action->sub_issue->name}}</td>
                                    <td>{{@$req->action->shift}}</td>
                                    <td>{{intdiv(@$req->action->total_time, 60).':'. (@$req->action->total_time % 60)}}</td>
                                    <td>{{@$req->action->user->seel_code}}-{{@$req->action->user->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection
@section('js')
    <script src="{{ asset('assets/admin/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/page.jumpToData().js"></script>
    <script>
        $(document).ready(function () {
            var table=$('.myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {extend: 'print', text: 'Print', messageBottom: ' <strong>Paint Line.</strong>'},
                    {extend: 'copy', text: 'Copy'},
                    {extend: 'excel', text: 'Excel'},
                    {extend: 'colvis', text: 'Column Visibility'}

                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
            window.onhashchange=testFun;
            function testFun () {
                var id = window.location.href.split('#')[1];
                table.page.jumpToData(id, 0);
                $('#'+id).addClass('alert-success');
            }
            if (window.location.href.indexOf("#") > -1) {
                var id = window.location.href.split('#')[1];
                table.page.jumpToData(id, 0);
                $('#'+id).addClass('alert-success');
            }
        });
    </script>
@endsection
