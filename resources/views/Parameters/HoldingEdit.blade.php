<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Holding </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/Holding/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Speed') }}</label>
                                <input class="form-control" name="speed" value="{{$item->speed}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Ramp Time') }}</label>
                                <input class="form-control" name="ramp_time" value="{{$item->ramp_time}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Press1') }}</label>
                                <input class="form-control" name="press1" value="{{$item->press1}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Time1') }}</label>
                                <input class="form-control" name="time1" value="{{$item->time1}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Press2') }}</label>
                                <input class="form-control" name="press2" value="{{$item->press2}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Time2') }}</label>
                                <input class="form-control" name="time2" value="{{$item->time2}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Press3') }}</label>
                                <input class="form-control" name="press3" value="{{$item->press3}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Time3') }}</label>
                                <input class="form-control" name="time3" value="{{$item->time3}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Press4') }}</label>
                                <input class="form-control" name="press4" value="{{$item->press4}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Time4') }}</label>
                                <input class="form-control" name="time4" value="{{$item->time4}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Press5') }}</label>
                                <input class="form-control" name="press5" value="{{$item->press5}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Time5') }}</label>
                                <input class="form-control" name="time5" value="{{$item->time5}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Cooling Time') }}</label>
                                <input class="form-control" name="cooling_time" value="{{$item->cooling_time}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Holding Pressure Time') }}</label>
                                <input class="form-control" name="holding_pressure_time" value="{{$item->holding_pressure_time}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Switch Over Volume') }}</label>
                                <input class="form-control" name="switch_over_volume" value="{{$item->switch_over_volume}}">
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
