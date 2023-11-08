@extends('admin.layouts.master')

@section('title')
    Roles
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="glyphicon glyphicon-asterisk"></i>
                            Roles
                        </h3>
                        <div class="box-tools">
                            @can('add role')
                                <a class="btn bg-maroon" title="Add" data-toggle="modal"
                                   data-target="#add"><i class="fa fa-plus"></i>
                                </a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        @can('view role')
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at}}</td>
                                <td>
                                    @can('edit role')
                                        <a class="btn btn-info" onclick="editRole({{$role->id}})"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('delete role')
                                        <a class="btn btn-danger" href="{{url('delete/role/'.$role->id)}}" onclick="return confirm('Are You Sure You Want To Delete This Role?');"><i class="fa fa-trash-o"></i></a>
                                        @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endcan
                        {{--model for add--}}
                        <div class="modal modal-info fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('add/role')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                                                <div class="col-md-6">
                                                    @foreach($permissions as $permission)
                                                        <label style="width:32%; display: inline-block"><input  type="checkbox"  name="permissions[]" value="{{$permission->id}}">
                                                       {{$permission->name}}</label>
                                                    @endforeach
                                                    @error('permissions')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    </section>
    @include('admin.includes.model2')
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
                    { extend: 'print', text: 'Print',messageBottom:' <strong>Paint Line.</strong>'},
                    { extend: 'copy', text: 'Copy' },
                    { extend: 'excel', text: 'Excel' },

                ] ,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            });
        });
        function editRole(id)
        {
            $.ajax({
                type:'get',
                url:'{{url('get/role/')}}/'+id,
                success:function (res) {
                    if(res){
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(res);
                    }
                }
            })
        }
    </script>
@endsection
