<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Core </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/Core/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('M.No') }}</label>
                                <input class="form-control" name="machine_id" value="{{$item->machine_id}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('FWD Speed') }}</label>
                                <input class="form-control" name="fwd_speed" value="{{$item->fwd_speed}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('FWD Pressure') }}</label>
                                <input class="form-control" name="fwd_pressure" value="{{$item->fwd_pressure}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('INTERVAL Speed') }}</label>
                                <input class="form-control" name="interval_speed" value="{{$item->interval_speed}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('INTERVAL Pressure') }}</label>
                                <input class="form-control" name="interval_pressure" value="{{$item->interval_pressure}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('BWD Speed') }}</label>
                                <input class="form-control" name="bwd_speed" value="{{$item->bwd_speed}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('BWD Pressure') }}</label>
                                <input class="form-control" name="bwd_pressure" value="{{$item->bwd_pressure}}">
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
