<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Injection </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/Injection/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Speed1') }}</label>
                                <input class="form-control" name="speed1" value="{{$item->speed1}}">
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
                                <label for="name">{{ __('S Over1') }}</label>
                                <input class="form-control" name="s_over1" value="{{$item->s_over1}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed2') }}</label>
                                <input class="form-control" name="speed2" value="{{$item->speed2}}">
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
                                <label for="name">{{ __('S Over2') }}</label>
                                <input class="form-control" name="s_over2" value="{{$item->s_over2}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed3') }}</label>
                                <input class="form-control" name="speed3" value="{{$item->speed3}}">
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
                                <label for="name">{{ __('S Over3') }}</label>
                                <input class="form-control" name="s_over3" value="{{$item->s_over3}}">
                            </div>
                        </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">{{ __('Speed4') }}</label>
                            <input class="form-control" name="speed4" value="{{$item->speed4}}">
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
                            <label for="name">{{ __('S Over4') }}</label>
                            <input class="form-control" name="s_over4" value="{{$item->s_over4}}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">{{ __('Speed5') }}</label>
                            <input class="form-control" name="speed5" value="{{$item->speed5}}">
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
                            <label for="name">{{ __('S Over5') }}</label>
                            <input class="form-control" name="s_over5" value="{{$item->s_over5}}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">{{ __('Injection Pressure') }}</label>
                            <input class="form-control" name="injection_pressure" value="{{$item->injection_pressure}}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">{{ __('Cooling Time') }}</label>
                            <input class="form-control" name="cooling_time" value="{{$item->cooling_time}}">
                        </div>
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
