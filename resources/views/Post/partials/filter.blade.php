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
        <form action="{{url('allPosts')}}" id="postFilter" method="post">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">{{ __('Shift') }}</label>
                        <select class="form-control" name="shift">
                            <option value="">Select Shift..</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">{{__('To')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="to" id="datepicker"
                                   class="date-picker form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="name">{{ __('Type') }}</label>
                        <select class="form-control" name="type">
                            <option value="">Select Type...</option>
                            @foreach(\App\Helper\PostType::arr as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="name">{{ __('BN') }}</label>
                        <input type="number" min="0" class="form-control" name="bn_id" placeholder="BN">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="name">{{ __('Filter') }}</label>
                        <input class="form-control btn btn-info" id="searchBtn" type="submit"
                               value="Search">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
