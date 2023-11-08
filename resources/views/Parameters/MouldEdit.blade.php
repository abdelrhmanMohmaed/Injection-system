<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Mould </h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('edit/Mould/'.$item->id)}}" method="post">
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
                                <label for="name">{{ __('Speed1 Open') }}</label>
                                <input class="form-control" name="speed1_open" value="{{$item->speed1_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed1 Close') }}</label>
                                <input class="form-control" name="speed1_close" value="{{$item->speed1_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force1 Open') }}</label>
                                <input class="form-control" name="force1_open" value="{{$item->force1_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force1 Close') }}</label>
                                <input class="form-control" name="force1_close" value="{{$item->force1_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over1 Open') }}</label>
                                <input class="form-control" name="s_over1_open" value="{{$item->s_over1_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over1 Close') }}</label>
                                <input class="form-control" name="s_over1_close" value="{{$item->s_over1_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed2 Open') }}</label>
                                <input class="form-control" name="speed2_open" value="{{$item->speed2_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed2 Close') }}</label>
                                <input class="form-control" name="speed2_close" value="{{$item->speed2_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force2 Open') }}</label>
                                <input class="form-control" name="force2_open" value="{{$item->force2_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force2 Close') }}</label>
                                <input class="form-control" name="force2_close" value="{{$item->force2_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over2 Open') }}</label>
                                <input class="form-control" name="s_over2_open" value="{{$item->s_over2_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over2 Close') }}</label>
                                <input class="form-control" name="s_over2_close" value="{{$item->s_over2_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed3 Open') }}</label>
                                <input class="form-control" name="speed3_open" value="{{$item->speed3_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed3 Close') }}</label>
                                <input class="form-control" name="speed3_close" value="{{$item->speed3_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force3 Open') }}</label>
                                <input class="form-control" name="force3_open" value="{{$item->force3_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force3 Close') }}</label>
                                <input class="form-control" name="force3_close" value="{{$item->force3_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over3 Open') }}</label>
                                <input class="form-control" name="s_over3_open" value="{{$item->s_over3_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over3 Close') }}</label>
                                <input class="form-control" name="s_over3_close" value="{{$item->s_over3_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed4 Open') }}</label>
                                <input class="form-control" name="speed4_open" value="{{$item->speed4_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed4 Close') }}</label>
                                <input class="form-control" name="speed4_close" value="{{$item->speed4_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force4 Open') }}</label>
                                <input class="form-control" name="force4_open" value="{{$item->force4_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force4 Close') }}</label>
                                <input class="form-control" name="force4_close" value="{{$item->force4_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over4 Open') }}</label>
                                <input class="form-control" name="s_over4_open" value="{{$item->s_over4_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over4 Close') }}</label>
                                <input class="form-control" name="s_over4_close" value="{{$item->s_over4_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed5 Open') }}</label>
                                <input class="form-control" name="speed5_open" value="{{$item->speed5_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Speed5 Close') }}</label>
                                <input class="form-control" name="speed5_close" value="{{$item->speed5_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force5 Open') }}</label>
                                <input class="form-control" name="force5_open" value="{{$item->force5_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('Force5 Close') }}</label>
                                <input class="form-control" name="force5_close" value="{{$item->force5_close}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over5 Open') }}</label>
                                <input class="form-control" name="s_over5_open" value="{{$item->s_over5_open}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">{{ __('S Over5 Close') }}</label>
                                <input class="form-control" name="s_over5_close" value="{{$item->s_over5_close}}">
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
