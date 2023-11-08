@extends('admin.layouts.master')
@section('title')
HotRunner
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        HotRunner
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
                        HotRunner </h3>
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
                                <th>Zone1</th>
                                <th>Zone2</th>
                                <th>Zone3</th>
                                <th>Zone4</th>
                                <th>Zone5</th>
                                <th>Zone6</th>
                                <th>Zone7</th>
                                <th>Zone8</th>
                                <th>Zone9</th>
                                <th>Zone10</th>
                                <th>Zone11</th>
                                <th>Zone12</th>
                                <th>Zone13</th>
                                <th>Zone14</th>
                                <th>Zone15</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->part->part_no}}</td>
                                    <td>{{$item->machine_id}}</td>
                                    <td>{{$item->zone1}}</td>
                                    <td>{{$item->zone2}}</td>
                                    <td>{{$item->zone3}}</td>
                                    <td>{{$item->zone4}}</td>
                                    <td>{{$item->zone5}}</td>
                                    <td>{{$item->zone6}}</td>
                                    <td>{{$item->zone7}}</td>
                                    <td>{{$item->zone8}}</td>
                                    <td>{{$item->zone9}}</td>
                                    <td>{{$item->zone10}}</td>
                                    <td>{{$item->zone11}}</td>
                                    <td>{{$item->zone12}}</td>
                                    <td>{{$item->zone13}}</td>
                                    <td>{{$item->zone14}}</td>
                                    <td>{{$item->zone15}}</td>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New HotRunner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('createParam/HotRunnerTemp')}}" method="post">
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
                                                        <label for="name">{{ __('M.Number') }}</label>
                                                        <input class="form-control" name="machine_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone1') }}</label>
                                                        <input class="form-control" name="zone1">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone2') }}</label>
                                                        <input class="form-control" name="zone2">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone3') }}</label>
                                                        <input class="form-control" name="zone3">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone4') }}</label>
                                                        <input class="form-control" name="zone4">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone5') }}</label>
                                                        <input class="form-control" name="zone5">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone6') }}</label>
                                                        <input class="form-control" name="zone6">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone7') }}</label>
                                                        <input class="form-control" name="zone7">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone8') }}</label>
                                                        <input class="form-control" name="zone8">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone9') }}</label>
                                                        <input class="form-control" name="zone9">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone10') }}</label>
                                                        <input class="form-control" name="zone10">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone11') }}</label>
                                                        <input class="form-control" name="zone11">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone12') }}</label>
                                                        <input class="form-control" name="zone12">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone13') }}</label>
                                                        <input class="form-control" name="zone13">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone14') }}</label>
                                                        <input class="form-control" name="zone14">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Zone15') }}</label>
                                                        <input class="form-control" name="zone15">
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
                url: '{{url('getParam/HotRunnerTemp/')}}/' + id,
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
