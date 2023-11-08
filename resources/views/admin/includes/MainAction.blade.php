{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="MainActionModal" tabindex="-1" role="dialog"
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
                    <form id="MainActionForm" @submit.prevent="submitAction">

                    <div class="box-body table-responsive">
                        <div class="row">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">{{ __('Type') }}</label>
                                    <select class="form-control" v-model="addValue.type" required name="type" @change="addValue.confirm_issue=false">
                                        <option value="">Select Action</option>
                                        @foreach(\App\Helper\MainActionType::arr as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"
                                 v-if="(addValue.type =='{{\App\Helper\MainActionType::Agent}}'||addValue.type =='{{\App\Helper\MainActionType::ExternalSparePart}}')">
                                <div class="form-group">
                                    <label for="name">{{ __('Target Date') }}</label>
                                    <input type="date" required name="target_date" v-model="addValue.target_date">
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.type=='{{\App\Helper\MainActionType::ToolShopIssue}}'">
                                <div class="form-group">
                                    <label for="name">{{ __('Tool Issue') }}</label>
                                    <select class="form-control" v-model="addValue.tool_issue" required name="tool_issue">
                                        <option value="">Select Issue..</option>
                                            <option v-for="item in tool_issues" v-bind:value="item.id">@{{item.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-10"
                                 v-if="(addValue.type =='{{\App\Helper\MainActionType::Solved}}'||
                                 addValue.type =='{{\App\Helper\MainActionType::ProcessIssue}}'||
                                 addValue.type =='{{\App\Helper\MainActionType::ToolShopIssue}}')">
                                <div class="form-group">
                                    <label for="name">{{ __('Action') }}</label>
                                    <textarea v-model="addValue.action" required class="form-control" name="action"
                                    placeholder="Enter Your Action ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6"
                                 v-if="(addValue.type =='{{\App\Helper\MainActionType::Solved}}'||addValue.type =='{{\App\Helper\MainActionType::ProcessIssue}}')">
                                <div class="form-group">
                                    <label for="name">{{ __("If Selected Issue Not True Check Here And Add Your's") }}</label>
                                    <input type="checkbox" name="confirm_issue" v-model="addValue.confirm_issue" @change="addValue.issue=''">
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.confirm_issue==true">
                                <div class="form-group">
                                    <label for="name">{{ __('Issue') }}</label>
                                    <select v-model="addValue.issue" required class="form-control" name="issue">
                                        <option value="">Select Issue..</option>
                                        <option v-for="issue in issues" v-bind:value="issue">@{{issue.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.issue && addValue.confirm_issue">
                                <div class="form-group">
                                    <label for="name">{{ __('Sub Issue') }}</label>
                                    <select v-model="addValue.sub_issue_id" class="form-control" name="sub_issue_id">
                                        <option value="">Select Sub Issue..</option>
                                        <option v-for="issue in addValue.issue.sub_issue" v-bind:value="issue.id">@{{issue.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            {{--<div class="col-md-3">--}}
                                <div class="form-group ">
                                    <button class="form-control btn btn-info text-center"
                                            >Submit
                                    </button>
                                </div>
                            {{--</div>--}}
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
