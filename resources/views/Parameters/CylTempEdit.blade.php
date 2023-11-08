<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit CylTemp </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/CylTemp/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Nozzle Zone') }}</label>
                                <input class="form-control" name="nozzle_zone" value="{{$item->nozzle_zone}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone1') }}</label>
                                <input class="form-control" name="zone1" value="{{$item->zone1}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone2') }}</label>
                                <input class="form-control" name="zone2" value="{{$item->zone2}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone3') }}</label>
                                <input class="form-control" name="zone3" value="{{$item->zone3}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone4') }}</label>
                                <input class="form-control" name="zone4" value="{{$item->zone4}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone5') }}</label>
                                <input class="form-control" name="zone5" value="{{$item->zone5}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone6') }}</label>
                                <input class="form-control" name="zone6" value="{{$item->zone6}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Youke Zone') }}</label>
                                <input class="form-control" name="youke_zone" value="{{$item->youke_zone}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Tol') }}</label>
                                <input class="form-control" name="tol" value="{{$item->tol}}">
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
