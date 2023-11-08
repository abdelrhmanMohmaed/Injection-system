@extends('admin.layouts.master')
@section('title')
    Ejectors Parameter
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ejectors Parameter
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
                            Ejectors Parameter </h3>
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
                                <th>Speed1 Advance</th>
                                <th>Speed1 Retract</th>
                                <th>Force1 Advance</th>
                                <th>Force1 Retract</th>
                                <th>S Over1 Advance</th>
                                <th>S Over1 Retract</th>
                                <th>Speed2 Advance</th>
                                <th>Speed2 Retract</th>
                                <th>Force2 Advance</th>
                                <th>Force2 Retract</th>
                                <th>S Over2 Advance</th>
                                <th>S Over2 Retract</th>
                                <th>Speed3 Advance</th>
                                <th>Speed3 Retract</th>
                                <th>Force3 Advance</th>
                                <th>Force3 Retract</th>
                                <th>S Over3 Advance</th>
                                <th>S Over3 Retract</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->part->part_no}}</td>
                                    <td>{{$item->machine_id}}</td>
                                    <td>{{$item->speed1_advance}}</td>
                                    <td>{{$item->speed1_retract}}</td>
                                    <td>{{$item->force1_advance}}</td>
                                    <td>{{$item->force1_retract}}</td>
                                    <td>{{$item->s_over1_advance}}</td>
                                    <td>{{$item->s_over1_retract}}</td>
                                    <td>{{$item->speed2_advance}}</td>
                                    <td>{{$item->speed2_retract}}</td>
                                    <td>{{$item->force2_advance}}</td>
                                    <td>{{$item->force2_retract}}</td>
                                    <td>{{$item->s_over2_advance}}</td>
                                    <td>{{$item->s_over2_retract}}</td>
                                    <td>{{$item->speed3_advance}}</td>
                                    <td>{{$item->speed3_retract}}</td>
                                    <td>{{$item->force3_advance}}</td>
                                    <td>{{$item->force3_retract}}</td>
                                    <td>{{$item->s_over3_advance}}</td>
                                    <td>{{$item->s_over3_retract}}</td>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Part</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Retract">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('createParam/Ejectors')}}" method="post">
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
                                                        <label for="name">{{ __('Type') }}</label>
                                                        <input class="form-control" name="type">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed1 Advance') }}</label>
                                                        <input class="form-control" name="speed1_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed1 Retract') }}</label>
                                                        <input class="form-control" name="speed1_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force1 Advance') }}</label>
                                                        <input class="form-control" name="force1_advance">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force1 Retract') }}</label>
                                                        <input class="form-control" name="force1_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over1 Advance') }}</label>
                                                        <input class="form-control" name="s_over1_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over1 Retract') }}</label>
                                                        <input class="form-control" name="s_over1_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed2 Advance') }}</label>
                                                        <input class="form-control" name="speed2_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed2 Retract') }}</label>
                                                        <input class="form-control" name="speed2_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force2 Advance') }}</label>
                                                        <input class="form-control" name="force2_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force2 Retract') }}</label>
                                                        <input class="form-control" name="force2_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over2 Advance') }}</label>
                                                        <input class="form-control" name="s_over2_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over2 Retract') }}</label>
                                                        <input class="form-control" name="s_over2_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed3 Advance') }}</label>
                                                        <input class="form-control" name="speed3_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed3 Retract') }}</label>
                                                        <input class="form-control" name="speed3_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force3 Advance') }}</label>
                                                        <input class="form-control" name="force3_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force3 Retract') }}</label>
                                                        <input class="form-control" name="force3_retract">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over3 Advance') }}</label>
                                                        <input class="form-control" name="s_over3_advance">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over3 Retract') }}</label>
                                                        <input class="form-control" name="s_over3_retract">
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
                url: '{{url('getParam/Ejectors/')}}/' + id,
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
