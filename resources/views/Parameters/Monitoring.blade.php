@extends('admin.layouts.master')
@section('title')
    Monitoring Parameter
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Monitoring Parameter
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
                            Monitoring Parameter </h3>
                        <div class="box-tools">
                            <a class="btn bg-maroon" title="Add" data-toggle="modal"
                               data-target="#add"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable myTable">
                            <thead>
                            <tr>
                                <th>Part#</th>
                                <th>Machine#</th>
                                <th>Injection Time</th>
                                <th>Plasticizing Time</th>
                                <th>Inj Press S Over</th>
                                <th>Max Inject Press</th>
                                <th>Cunshining</th>
                                <th>Total Cycle Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->part->part_no}}</td>
                                    <td>{{$item->machine_id}}</td>
                                    <td>{{$item->injection_time}}</td>
                                    <td>{{$item->plasticizing_time}}</td>
                                    <td>{{$item->inj_press_s_over}}</td>
                                    <td>{{$item->max_inject_press}}</td>
                                    <td>{{$item->cunshining}}</td>
                                    <td>{{$item->total_cycle_time}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info" onclick="edit({{$item->id}})"><i
                                                class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--model for date--}}
                        <div class="modal modal-primary fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Monitoring</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('createParam/Monitoring')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Part Number') }}</label>
                                                        <input class="form-control" name="part_no">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('M.No') }}</label>
                                                        <input class="form-control" name="machine_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Injection Time') }}</label>
                                                        <input class="form-control" name="injection_time">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Plasticizing Time') }}</label>
                                                        <input class="form-control" name="plasticizing_time">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Inj Press S Over') }}</label>
                                                        <input class="form-control" name="inj_press_s_over">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Max Inject Press') }}</label>
                                                        <input class="form-control" name="max_inject_press">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Cunshining') }}</label>
                                                        <input class="form-control" name="cunshining">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Total Cycle Time') }}</label>
                                                        <input class="form-control" name="total_cycle_time">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end modal--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
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
                url: '{{url('getParam/Monitoring/')}}/' + id,
                success: function (res) {
                    if (res) {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            })
        }
    </script>
@endsection
