<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Ejectors </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/Ejectors/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Speed1 Advance') }}</label>
                                <input class="form-control" name="speed1_advance" value="{{$item->speed1_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed1 Retract') }}</label>
                                <input class="form-control" name="speed1_retract" value="{{$item->speed1_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force1 Advance') }}</label>
                                <input class="form-control" name="force1_advance" value="{{$item->force1_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force1 Retract') }}</label>
                                <input class="form-control" name="force1_retract" value="{{$item->force1_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over1 Advance') }}</label>
                                <input class="form-control" name="s_over1_advance" value="{{$item->s_over1_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over1 Retract') }}</label>
                                <input class="form-control" name="s_over1_retract" value="{{$item->s_over1_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed2 Advance') }}</label>
                                <input class="form-control" name="speed2_advance" value="{{$item->speed2_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed2 Retract') }}</label>
                                <input class="form-control" name="speed2_retract" value="{{$item->speed2_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force2 Advance') }}</label>
                                <input class="form-control" name="force2_advance" value="{{$item->force2_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force2 Retract') }}</label>
                                <input class="form-control" name="force2_retract" value="{{$item->force2_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over2 Advance') }}</label>
                                <input class="form-control" name="s_over2_advance" value="{{$item->s_over2_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over2 Retract') }}</label>
                                <input class="form-control" name="s_over2_retract" value="{{$item->s_over2_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed3 Advance') }}</label>
                                <input class="form-control" name="speed3_advance" value="{{$item->speed3_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed3 Retract') }}</label>
                                <input class="form-control" name="speed3_retract" value="{{$item->speed3_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force3 Advance') }}</label>
                                <input class="form-control" name="force3_advance" value="{{$item->force3_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force3 Retract') }}</label>
                                <input class="form-control" name="force3_retract" value="{{$item->force3_retract}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over3 Advance') }}</label>
                                <input class="form-control" name="s_over3_advance" value="{{$item->s_over3_advance}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over3 Retract') }}</label>
                                <input class="form-control" name="s_over3_retract" value="{{$item->s_over3_retract}}">
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
