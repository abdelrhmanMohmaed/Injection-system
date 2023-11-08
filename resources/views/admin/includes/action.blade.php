{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="actionModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="BNdetailsDiv">
                <div id="toolingDiv">
                    @csrf
                    <div class="box-body table-responsive">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">{{ __('Type') }}</label>
                                    <select required class="form-control" v-model="addValue.type" name="type">
                                        <option value="" selected>Select Type</option>
                                        @foreach(\App\Helper\ActionType::arr as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">{{ __('User') }}</label>
                                    <select v-model="addValue.user_id" required class="form-control" name="user_id">
                                        <option value="" selected>Select User</option>
                                        <option v-for="user in users" v-bind:value="user.id">@{{user.seel_code}} -
                                            @{{user.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">{{ __('Shift') }}</label>
                                    <select class="form-control" v-model="addValue.shift" required name="shift">
                                        <option value="">Select Shift</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.type !=='{{\App\Helper\ActionType::NeedToolShop}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Counter') }}</label>
                                    <input type="number" class="form-control" v-model="addValue.counter" required
                                           name="counter"
                                           placeholder="Counter">
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.type =='{{\App\Helper\ActionType::NeedToolShop}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Reject Sample') }}</label>
                                    <input type="checkbox" style="margin-top: 35px;" v-model="addValue.reject_sample"
                                           name="reject_sample" value="1">
                                </div>
                            </div>
                            <div class="col-md-3"
                                 v-if="addValue.type =='{{\App\Helper\ActionType::SolvedWithCloseCavity}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Close Cavity Num') }}</label>
                                    <input type="number" class="form-control" v-model="addValue.cav_num" required
                                           name="cav_num"
                                           placeholder="Cavity Num">
                                </div>
                            </div>
                            <div class="col-md-8"
                                 v-if="addValue.type =='{{\App\Helper\ActionType::SolvedWithCloseCavity}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Check Close Cavities') }}</label>
                                    <br>
                                    @for($i=1;$i<=12;$i++)
                                        <label for="name">{{ __($i) }}</label>
                                        <input type="checkbox" value="{{$i}}" v-model="addValue.cav" style="margin-right: 15px;" required name="cav[]">
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9" v-if="addValue.type !=='{{\App\Helper\ActionType::NeedToolShop}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Action') }}</label>
                                    <textarea class="form-control" v-model="addValue.action" required name="action"
                                              placeholder="Action..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button style="margin-top: 24px" class="form-control btn btn-info"
                                            @click.prevent="submitAction">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--</form>--}}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
