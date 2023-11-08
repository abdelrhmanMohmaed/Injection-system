@extends('admin.layouts.master')
@section('title')
    Plan
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
                            <i class="fa fa-sitemap"></i> &nbsp; Plan
                        </h3>
                        <div class="box-tools">

                            <a class="btn btn-danger" id="deleteAllSelectedRecord">
                                <i class="fa fa-trash-o"></i>
                                Delete All Selected
                            </a>

                            <a class="btn bg-navy" title="Add" data-toggle="modal"
                               data-target="#add">
                                <i class="fa fa-upload"></i>
                                Upload Plan
                            </a>

                            <a class="btn bg-navy" title="Plan Sample" onclick="downloadPlan()">
                                <i class="fa fa-download"></i>
                                Plan Sample
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable myTable">
                            <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="selectAllIds"></th>
                                <th>M.No</th>
                                <th>Part</th>
                                <th>Demand</th>
                                <th>Week</th>
                                <th>Missing</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $item)
                                <tr id="plansIds_{{$item->id}}">
                                    <td>
                                        <input type="checkbox" name="ids" class="checkbox_ids" value="{{$item->id}}">
                                    </td>
                                    <td>{{$item->machine_id }} - {{$item->machine->type}} - {{$item->machine->k}}</td>
                                    <td>{{$item->part->part_no}}</td>
                                    <td>{{$item->demand}}</td>
                                    <td>{{$item->week}}</td>
                                    <td>{{$item->missing}}</td>
                                    <td>{{$item->priority}}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs" onclick="edit({{$item->id}})">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="{{url('delete/plan/'.$item->id)}}"
                                           onclick="return confirm('Are You Sure You Want To Delete This Part?');">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
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
        @include('export.plan.upload')
        @include('admin.includes.model2')
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

    <script>


        $(document).ready(function () {
            $('.myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {extend: 'print', text: 'Print', messageBottom: ' <strong>Paint Line.</strong>'},
                    {extend: 'copy', text: 'Copy'},
                    {extend: 'excel', text: 'Excel'},
                    {extend: 'colvis', text: 'Column Visibility'}

                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });

        function edit(id) {
            $.ajax({
                type: 'get',
                url: '{{url('get/plan/')}}/' + id,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            })
        }

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

    {{--  Delete All Selected Record  --}}
    <script>
        $(function (e){
            var allIds = [];

            $("#selectAllIds").click(function (){
                $('.checkbox_ids').prop('checked',$(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord').click(function (e){
                e.preventDefault();

                $("#deleteAllSelectedRecord").removeAttr("disabled");
                $('input:checkbox[name=ids]:checked').each(function (){

                    allIds.push($(this).val());
                });

                $.ajax({
                    url: '{{route('plans.destroy')}}',
                    type: 'post',
                    data: {
                        ids: allIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success){
                            location.reload();
                        }else {
                            console.log(response)
                        }
                    }
                });
            })
        });
    </script>
    {{--  Delete All Selected Record  --}}

@endsection
