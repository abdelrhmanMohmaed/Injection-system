@extends('admin.layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-users"></i>&nbsp;
                            Users
                        </h3>
                        <div class="box-tools">
                            @can('add users')
                                <a href="{{ route('users.create') }}" class="btn btn-sm bg-maroon">
                                    <i class="fa fa-plus"></i>&nbsp;
                                    Add New User
                                </a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @can('view users')
                            <table class="table table-striped table-bordered table-hover dataTable" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Seel Code</th>
                                    <th>Title</th>
                                    <th>Roles</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->seel_code}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            @foreach($item->roles as $role)
                                                <label class="label label-info">{{$role->name}}</label>
                                                <br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($item->type == 1)
                                                <span class="label label-success">Admin</span>
                                            @else
                                                <span class="label label-warning">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('edit users')
                                                <a href="{{route('users.edit',$item->id)}}" class="btn btn-xs btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan

                                            @can('delete users ')
                                                <a href="{{route('users.destroy',$item->id)}}"  class="btn btn-xs btn-danger"
                                                   onclick="return confirm('Are You Sure You Want To Delete This User?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endcan
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
            $('#myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {extend: 'print', text: 'Print', messageBottom: ' <strong>Paint Line.</strong>'},
                    {extend: 'copy', text: 'Copy'},
                    {extend: 'excel', text: 'Excel'},

                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });
    </script>
@endsection
