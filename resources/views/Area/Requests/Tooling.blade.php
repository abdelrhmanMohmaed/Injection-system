<div id="toolingDiv">
    {{--<div class="box-body table-responsive">--}}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Part') }}</label>
                    <select required class="form-control" v-model="part_id" name="part_id">
                        <option value="">Select Part</option>
                        <option v-for="part in part" v-bind:value="part.id">@{{part.part_no}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('User') }}</label>
                    <select v-model="user_id" required class="form-control" name="user_id">
                        <option value="">Select User</option>
                        <option v-for="user in users" v-bind:value="user.id">@{{user.seel_code}} -
                            @{{user.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Priority') }}</label>
                    <select required v-model="priority" class="form-control" name="priority">
                        <option value="">Select Priority</option>
                        @foreach(\App\Helper\RequestPriority::arr as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Issue') }}</label>
                    <select v-model="issue_id" required class="form-control" name="issue_id">
                        <option value="">Select Issue</option>
                        <option v-for="issue in issues" v-bind:value="issue.id">@{{issue.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Importance') }}</label>
                    <select required class="form-control" v-model="importance"
                            name="importance">
                        <option value="">Select Importance</option>
                        @foreach(\App\Helper\RequestImportance::arr as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Shift') }}</label>
                    <select class="form-control" v-model="shift" required name="shift">
                        <option value="">Select Shift</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control btn btn-info" @click.prevent="submitTool">Send
                    </button>
                </div>
            </div>
        </div>
    {{--</form>--}}
</div>
