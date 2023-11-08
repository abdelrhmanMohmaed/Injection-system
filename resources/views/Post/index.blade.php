@extends('admin.layouts.master')
@section('title')
    Posts
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

                @include('Post.partials.filter')

                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-check-square-o"></i> &nbsp; Posts
                        </h3>
                        <div class="box-tools">
                            <a class="btn btn-danger" id="deleteAllSelectedRecord">
                                <i class="fa fa-trash-o"></i>
                                Delete All Selected
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div id="postData">
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-bordered dataTable table-hover myTable">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="" id="selectAllIds">
                                    </th>
                                    <th>#</th>
                                    <th>M.No</th>
                                    <th>Part No</th>
                                    <th>BN</th>
                                    <th>Counter</th>
                                    <th>IO</th>
                                    <th>NIO</th>
                                    <th>Cav</th>
                                    <th>Cycle Time</th>
                                    <th>Shift</th>
                                    <th>Type</th>
                                    <th>User</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr id="{{$item->id}}" name="{{$item->id}}">

                                        <td>
                                            <input type="checkbox" name="ids" class="checkbox_ids" value="{{$item->id}}">
                                        </td>

                                        <td>{{$item->id}}</td>
                                        <td>{{$item->machine_id}}</td>
                                        <td>{{$item->part->part_no}}</td>
                                        <td onclick="getParameters('{{$item->bn_id}}')" style="cursor: pointer">
                                            <span class="label label-info">{{$item->bn_id}}</span>
                                        </td>
                                        <td>{{$item->counter}}</td>
                                        <td>{{$item->io}}</td>
                                        <td>{{$item->nio}}</td>
                                        <td>{{$item->cav}}</td>
                                        <td>{{$item->cycle_time}}</td>
                                        <td>{{$item->shift}}</td>
                                        <td>{{\App\Helper\PostType::getType($item->type)}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @include('admin.includes.model2')
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

           var table= $('.myTable').DataTable({
                responsive: true,
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
            $('#filterBox').addClass('collapsed-box');
        });

        $('#searchBtn').click(function (e) {
            e.preventDefault();
            var formData = $('#postFilter').serializeArray();
            $.ajax({
                type: 'post',
                url: '{{url('allPosts')}}',
                data: formData,
                success: function (data) {
                    if (data) {
                        $('#postData').empty();
                        $('#postData').html(data);
                    }
                }
            });

        });

        function getParameters(bn) {
            $.ajax({
                type: 'get',
                url: '{{url('Post/Bn/')}}/' + bn,
                success: function (data) {
                    if (data) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(data);
                    }
                }
            });
        }
    </script>
@include('Post.partials.js')
@endsection
