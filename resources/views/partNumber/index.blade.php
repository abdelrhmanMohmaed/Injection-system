@extends('admin.layouts.master')

@section('title')
    Part Numbers
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
                            <i class="fa fa-list-alt"></i> &nbsp;
                            Part Numbers
                        </h3>
                        <div class="box-tools">
                            <a href="{{route('parts.create')}}" class="btn btn-sm bg-maroon" title="Add">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add New Part Number
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Part Number</th>
                                    <th>Description</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th>Cell</th>
                                    <th>Family</th>
                                    <th>Qty</th>
                                    <th>Cav</th>
                                    <th>C.T</th>
                                    <th>Reject Rate</th>
                                    <th>Rate/Hr</th>
                                    <th>Resin PN1</th>
                                    <th>Shot Wight1</th>
                                    <th>Resin PN2</th>
                                    <th>Shot Wight2</th>
                                    <th>Resin PN3</th>
                                    <th>Shot Wight3</th>
                                    <th>Resin PN4</th>
                                    <th>Shot Wight4</th>
                                    <th>Color</th>
                                    <th>Tool-No</th>
                                    <th>Inj-Type</th>
                                    <th>M.No</th>
                                    <th>Category</th>
                                    <th>Sort/Rework</th>
                                    <th>C.Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parts as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->part_no }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->customer }}</td>
                                        <td>{{ $item->internal }}</td>
                                        <td>{{ $item->cell }}</td>
                                        <td>{{ $item->family }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->cav }}</td>
                                        <td>{{ $item->cycle_time }}</td>
                                        <td>{{ $item->reject_rate }}</td>
                                        <td>{{ $item->rate }}</td>
                                        <td>{{ $item->resin_pn1 }}</td>
                                        <td>{{ $item->shot_wight1 }}</td>
                                        <td>{{ $item->resin_pn2 }}</td>
                                        <td>{{ $item->shot_wight2 }}</td>
                                        <td>{{ $item->resin_pn3 }}</td>
                                        <td>{{ $item->shot_wight3 }}</td>
                                        <td>{{ $item->resin_pn4 }}</td>
                                        <td>{{ $item->shot_wight4 }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->tool_no }}</td>
                                        <td>{{ $item->inj_type }}</td>
                                        <td style="cursor: pointer" onclick="machine({{ $item->machine_id }})">
                                            <span class="label label-primary">
                                                {{ $item->machine_id }}
                                            </span>
                                        </td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->sorting }}</td>
                                        <td>{{ $item->consumption_rate }}</td>

                                        <td>
                                            @can('edit partNumber')
                                                <a href="{{route('parts.edit', $item->id)}}" class="btn btn-xs btn-info" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete partNumber')
                                                <a class="btn btn-xs btn-danger" href="{{ route('parts.destroy',$item->id) }}"
                                                    onclick="return confirm('Are You Sure You Want To Delete This Part?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- model for date --}}

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

@include('partNumber.partials.style')
@include('partNumber.partials.script')
