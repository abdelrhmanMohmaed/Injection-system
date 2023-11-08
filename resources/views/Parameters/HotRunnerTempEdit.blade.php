<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit HotRunner </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/HotRunnerTemp/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Zone7') }}</label>
                                <input class="form-control" name="zone7" value="{{$item->zone7}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone8') }}</label>
                                <input class="form-control" name="zone8" value="{{$item->zone8}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone9') }}</label>
                                <input class="form-control" name="zone9" value="{{$item->zone9}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone10') }}</label>
                                <input class="form-control" name="zone10" value="{{$item->zone10}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone11') }}</label>
                                <input class="form-control" name="zone11" value="{{$item->zone11}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone12') }}</label>
                                <input class="form-control" name="zone12" value="{{$item->zone12}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone13') }}</label>
                                <input class="form-control" name="zone13" value="{{$item->zone13}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone14') }}</label>
                                <input class="form-control" name="zone14" value="{{$item->zone14}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Zone15') }}</label>
                                <input class="form-control" name="zone15" value="{{$item->zone15}}">
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
