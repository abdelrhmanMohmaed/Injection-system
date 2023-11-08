@extends('admin.layouts.master')
@section('title')
    Issues
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Issues
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
                            Issues </h3>
                        <div class="box-tools">
                            <a class="btn bg-navy" title="Add" data-toggle="modal"
                               data-target="#add"><i class="fa fa-plus-circle"></i> Add</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered dataTable table-hover myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Issue</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issues as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($type==\App\Helper\IssueType::Maintenance)
                                        <a class="btn btn-xs btn-primary" data-toggle="modal"
                                           data-target="#sub{{$item->id}}"><i class="fa fa-eye"></i>Sub Issue</a>
                                        @endif
                                        <a class="btn btn-xs btn-info" data-toggle="modal"
                                           data-target="#edit{{$item->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('delete/issue/'.$item->id)}}"
                                           onclick="return confirm('Are You Sure You Want To Delete This Issue?');"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                {{--model for edit--}}
                                <div class="modal modal-primary fade bd-example-modal-lg" id="edit{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Issue</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('edit/issue/'.$item->id)}}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" required class="form-control" value="{{$item->name}}" name="name" placeholder="Name">
                                                                <input type="hidden"  name="type" value="{{$type}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <button type="submit" style="margin-top: 25px" class="btn btn-success">Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
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

                                {{--model for sub--}}
                                <div class="modal modal-primary fade bd-example-modal-lg" id="sub{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sub Issue</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('create/subIssue')}}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" required class="form-control" name="name" placeholder="Name">
                                                                <input type="hidden" name="issue_id" value="{{$item->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <button type="submit" style="margin-top: 25px" class="btn btn-success">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row">
                                                    <ul>
                                                        @if($item->subIssue->count()>0)
                                                        @foreach($item->subIssue as $sub)
                                                        <li><h4>{{$sub->name}}</h4></li>
                                                            @endforeach
                                                            @else
                                                        <h4>0 Sub Issues</h4>
                                                            @endif
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--end modal--}}
                            @endforeach
                            </tbody>
                        </table>
                        {{--model for add--}}
                        <div class="modal modal-primary fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Issue</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('add/issue')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Name') }}</label>
                                                        <input type="text" required class="form-control" name="name" placeholder="Name">
                                                        <input type="hidden"  name="type" value="{{$type}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button type="submit" style="margin-top: 25px" class="btn btn-success">Add</button>
                                                    </div>
                                                </div>
                                            </div>
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
    </script>
@endsection
