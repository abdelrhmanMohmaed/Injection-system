{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="QualityActionModal" tabindex="-1" role="dialog"
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
                    <form id="QualityActionForm" @submit.prevent="submitAction">

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
                                    <label for="name">{{ __('Action') }}</label>
                                    <select class="form-control" v-model="addValue.action" required name="action">
                                        <option value="">Select Action</option>
                                        <option value="Relase">Relase</option>
                                        <option value="Not Relase">Not Relase</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" v-if="addValue.action =='Not Relase'">
                                <div class="form-group">
                                    <label for="name">{{ __('Issues') }}</label>
                                    <select v-model="addValue.issue_id" required multiple class="form-control" name="issue_id[]">
                                        <option value="">Select Issue</option>
                                        <option v-for="issue in issues" v-bind:value="issue.id">@{{issue.name}}
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
