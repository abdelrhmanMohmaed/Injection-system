<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit MouldTemp </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/MouldTemp/'.$item->id)}}" method="post">
                @csrf
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Part Number') }}</label>
                                <input class="form-control" name="part_no" value="{{$item->part->part_no}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('M.Number') }}</label>
                                <input class="form-control" name="machine_id" value="{{$item->machine_id}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Ejector Side') }}</label>
                                <input class="form-control" name="ejector_side" value="{{$item->ejector_side}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Nozzle Side') }}</label>
                                <input class="form-control" name="nozzle_side" value="{{$item->nozzle_side}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
