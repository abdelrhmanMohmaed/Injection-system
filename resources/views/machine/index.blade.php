@extends('admin.layouts.master')

@section('title')
    Machines
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
                        <h3 class="box-title"><i class="fa fa-desktop"></i>&nbsp; Machines</h3>
                        <div class="box-tools">
                                <a href="{{ route('machines.create') }}" class="btn btn-sm bg-maroon" >
                                    <i class="fa fa-plus"></i>&nbsp;
                                    Add New Machine
                                </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered dataTable table-hover myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>M.No</th>
                                    <th>Type</th>
                                    <th>Tonnage</th>
                                    <th>Screw</th>
                                    <th>Robot</th>
                                    <th>1K/2K</th>
                                    <th>Area</th>
                                    <th>Semi/Auto</th>
                                    <th>Serial</th>
                                    <th>Seel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($machines as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>{{$item->tonnage}}</td>
                                        <td>{{$item->screw}}</td>
                                        <td>{{$item->robot}}</td>
                                        <td>{{$item->k}}</td>
                                        <td>{{$item->area}}</td>
                                        <td>{{$item->semi_auto}}</td>
                                        <td>{{$item->serial}}</td>
                                        <td>{{$item->seel->name}}</td>
                                        <td>
                                            {{--@can('edit partNumber')--}}
                                                <a href="{{route("machines.edit",$item->id)}}" class="btn btn-xs btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            {{--@endcan--}}
                                            {{--@can('delete partNumber')--}}
                                                {{--<a class="btn btn-danger" href="{{url('delete/part/'.$part->id)}}" onclick="return confirm('Are You Sure You Want To Delete This Part?');"><i class="fa fa-trash-o"></i></a>--}}
                                            {{--@endcan--}}
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
                    { extend: 'print', text: 'Print',messageBottom:' <strong>Paint Line.</strong>'},
                    { extend: 'copy', text: 'Copy' },
                    { extend: 'excel', text: 'Excel' },
                    {extend:'colvis',text:'Column Visibility'}

                ] ,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            });
        });
    </script>
@endsection
