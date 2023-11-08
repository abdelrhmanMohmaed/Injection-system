<div>
    {{--<form action="{{url('add/gm')}}" method="post">--}}
        <div class="box-body table-responsive">
            {{--@csrf--}}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">{{ __('Shift') }}</label>
                        <input type="hidden" class="gm_machine" name="machine_id" value="{{$machine}}">
                        <select class="form-control gm_shift" v-model="shift"  required name="shift">
                            <option value="">Select Shift</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($gm as $g)
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">{{ __('('.$g->code.')'.$g->name) }}</label>
                            <input type="checkbox"
                                   onclick="getValue({{$g->id}})" class="gm_id" id="check{{$g->id}}" value="{{$g->id}}"
                                   name="gm_id[]">
                            <input class="form-control gm_value" type="text" id="value{{$g->id}}" disabled="disabled" style="display: none"
                                   name="gm_value[]">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="form-group">
                    <button type="submit" onclick="addGM()" style="width: 100%; margin: auto" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    {{--</form>--}}
    {{--</form>--}}
</div>
