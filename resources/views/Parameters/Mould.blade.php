@extends('admin.layouts.master')
@section('title')
    Mould Parameter
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mould Parameter
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
                            Mould Parameter </h3>
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
                                <th>Speed1 Open</th>
                                <th>Speed1 Close</th>
                                <th>Force1 Open</th>
                                <th>Force1 Close</th>
                                <th>S Over1 Open</th>
                                <th>S Over1 Close</th>
                                <th>Speed2 Open</th>
                                <th>Speed2 Close</th>
                                <th>Force2 Open</th>
                                <th>Force2 Close</th>
                                <th>S Over2 Open</th>
                                <th>S Over2 Close</th>
                                <th>Speed3 Open</th>
                                <th>Speed3 Close</th>
                                <th>Force3 Open</th>
                                <th>Force3 Close</th>
                                <th>S Over3 Open</th>
                                <th>S Over3 Close</th>
                                <th>Speed4 Open</th>
                                <th>Speed4 Close</th>
                                <th>Force4 Open</th>
                                <th>Force4 Close</th>
                                <th>S Over4 Open</th>
                                <th>S Over4 Close</th>
                                <th>Speed5 Open</th>
                                <th>Speed5 Close</th>
                                <th>Force5 Open</th>
                                <th>Force5 Close</th>
                                <th>S Over5 Open</th>
                                <th>S Over5 Close</th>
                                <th>Clamping Pressure</th>
                                <th>Mould Height</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->part->part_no}}</td>
                                    <td>{{$item->machine_id}}</td>
                                    <td>{{$item->speed1_open}}</td>
                                    <td>{{$item->speed1_close}}</td>
                                    <td>{{$item->force1_open}}</td>
                                    <td>{{$item->force1_close}}</td>
                                    <td>{{$item->s_over1_open}}</td>
                                    <td>{{$item->s_over1_close}}</td>
                                    <td>{{$item->speed2_open}}</td>
                                    <td>{{$item->speed2_close}}</td>
                                    <td>{{$item->force2_open}}</td>
                                    <td>{{$item->force2_close}}</td>
                                    <td>{{$item->s_over2_open}}</td>
                                    <td>{{$item->s_over2_close}}</td>
                                    <td>{{$item->speed3_open}}</td>
                                    <td>{{$item->speed3_close}}</td>
                                    <td>{{$item->force3_open}}</td>
                                    <td>{{$item->force3_close}}</td>
                                    <td>{{$item->s_over3_open}}</td>
                                    <td>{{$item->s_over3_close}}</td>
                                    <td>{{$item->speed4_open}}</td>
                                    <td>{{$item->speed4_close}}</td>
                                    <td>{{$item->force4_open}}</td>
                                    <td>{{$item->force4_close}}</td>
                                    <td>{{$item->s_over4_open}}</td>
                                    <td>{{$item->s_over4_close}}</td>
                                    <td>{{$item->speed5_open}}</td>
                                    <td>{{$item->speed5_close}}</td>
                                    <td>{{$item->force5_open}}</td>
                                    <td>{{$item->force5_close}}</td>
                                    <td>{{$item->s_over5_open}}</td>
                                    <td>{{$item->s_over5_close}}</td>
                                    <td>{{$item->clamping_pressure}}</td>
                                    <td>{{$item->mould_height}}</td>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Mould</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('createParam/Mould')}}" method="post">
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
                                                        <label for="name">{{ __('Speed1 Open') }}</label>
                                                        <input class="form-control" name="speed1_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed1 Close') }}</label>
                                                        <input class="form-control" name="speed1_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force1 Open') }}</label>
                                                        <input class="form-control" name="force1_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force1 Close') }}</label>
                                                        <input class="form-control" name="force1_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over1 Open') }}</label>
                                                        <input class="form-control" name="s_over1_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over1 Close') }}</label>
                                                        <input class="form-control" name="s_over1_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed2 Open') }}</label>
                                                        <input class="form-control" name="speed2_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed2 Close') }}</label>
                                                        <input class="form-control" name="speed2_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force2 Open') }}</label>
                                                        <input class="form-control" name="force2_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force2 Close') }}</label>
                                                        <input class="form-control" name="force2_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over2 Open') }}</label>
                                                        <input class="form-control" name="s_over2_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over2 Close') }}</label>
                                                        <input class="form-control" name="s_over2_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed3 Open') }}</label>
                                                        <input class="form-control" name="speed3_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed3 Close') }}</label>
                                                        <input class="form-control" name="speed3_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force3 Open') }}</label>
                                                        <input class="form-control" name="force3_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force3 Close') }}</label>
                                                        <input class="form-control" name="force3_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over3 Open') }}</label>
                                                        <input class="form-control" name="s_over3_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over3 Close') }}</label>
                                                        <input class="form-control" name="s_over3_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed4 Open') }}</label>
                                                        <input class="form-control" name="speed4_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed4 Close') }}</label>
                                                        <input class="form-control" name="speed4_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force4 Open') }}</label>
                                                        <input class="form-control" name="force4_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force4 Close') }}</label>
                                                        <input class="form-control" name="force4_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over4 Open') }}</label>
                                                        <input class="form-control" name="s_over4_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over4 Close') }}</label>
                                                        <input class="form-control" name="s_over4_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed5 Open') }}</label>
                                                        <input class="form-control" name="speed5_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Speed5 Close') }}</label>
                                                        <input class="form-control" name="speed5_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force5 Open') }}</label>
                                                        <input class="form-control" name="force5_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Force5 Close') }}</label>
                                                        <input class="form-control" name="force5_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over5 Open') }}</label>
                                                        <input class="form-control" name="s_over5_open">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('S Over5 Close') }}</label>
                                                        <input class="form-control" name="s_over5_close">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Clamping Pressure') }}</label>
                                                        <input class="form-control" name="clamping_pressure">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Mould Height') }}</label>
                                                        <input class="form-control" name="mould_height">
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
                url: '{{url('getParam/Mould/')}}/' + id,
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
