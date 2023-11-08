@extends('admin.layouts.master')
@section('title')
    BN
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            BN
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
                <div class="box" id="filterBox">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Filter <i class="fa fa-filter"></i></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="">
                        <form
                            {{--action="{{url('allBn')}}" --}}
                            id="bnForm" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Part #') }}</label>
                                        <input class="form-control" name="part_no" placeholder="Part#">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Machine #') }}</label>
                                        <input class="form-control" name="machine_id" placeholder="Machine#">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('User') }}</label>
                                        <select class="form-control" name="user_id">
                                            <option value="">Select User..</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">{{ __('BN') }}</label>
                                        <input type="number"min="0" class="form-control" name="bn_id" placeholder="BN">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="name">{{ __('Shift') }}</label>--}}
                                        {{--<select class="form-control" name="shift">--}}
                                            {{--<option value="">Select Shift..</option>--}}
                                                {{--<option value="A">A</option>--}}
                                                {{--<option value="B">B</option>--}}
                                                {{--<option value="C">C</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">{{__('From')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="from" class="date-picker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">{{__('To')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="to" id="datepicker" class="date-picker form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">{{ __('Filter') }}</label>
                                        <input class="form-control btn btn-info" id="searchBtn" type="submit" value="Search">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            BN </h3>
                    </div>
                    <!-- /.box-header -->
                    <div id="bnData">
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered dataTable table-hover myTable">
                            <thead>
                            <tr>
                                <th>M.No</th>
                                <th>Part No</th>
                                <th>BN</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($bns as $bn)
                                <tr id="{{$bn->id}}" name="{{$bn->id}}">
                                    <td>{{$bn->machine_id}}</td>
                                    <td>{{$bn->part->part_no}}</td>
                                    <td onclick="getParameters('{{$bn->id}}')" style="cursor: pointer"
                                    ><span class="label label-info">{{$bn->id}}</span></td>
                                    <td>{{$bn->comment}}</td>
                                    <td>{{$bn->user->name}}</td>
                                    <td>{{$bn->created_at}}</td>
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
            $('#filterBox').addClass('collapsed-box');
        });

        $('#searchBtn').click(function (e) {
            e.preventDefault();
            var formData=$('#bnForm').serializeArray();
            $.ajax({
                type: 'post',
                url: '{{url('allBn')}}',
                data:formData,
                success: function (data) {
                    if (data) {
                        $('#bnData').empty();
                        $('#bnData').html(data);
                    }
                }
            });

        })
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
@endsection
