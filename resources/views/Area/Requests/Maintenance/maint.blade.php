<div id="toolingDiv">
    {{--<div class="box-body table-responsive">--}}
    <form method="post" id="mainForm">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Part') }}</label>
                    <select required class="form-control" v-model="main.part_id" name="part_id">
                        <option value="">Select Part</option>
                        <option v-for="part in part" v-bind:value="part.id">@{{part.part_no}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('User') }}</label>
                    <select v-model="main.user_id" required class="form-control" name="user_id">
                        <option value="">Select User</option>
                        <option v-for="user in users" v-bind:value="user.id">@{{user.seel_code}} -
                            @{{user.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Issue') }}</label>
                    <select v-model="main.issue" required class="form-control" name="issue">
                        <option value="">Select Issue..</option>
                        <option v-for="issue in main_issues" v-bind:value="issue">@{{issue.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3" v-if="main.issue">
                <div class="form-group">
                    <label for="name">{{ __('Sub Issue') }}</label>
                    <select v-model="main.sub_issue_id" required class="form-control" name="sub_issue_id">
                        <option value="">Select Sub Issue..</option>
                        <option v-for="issue in main.issue.sub_issue" v-bind:value="issue.id">@{{issue.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">{{ __('Shift') }}</label>
                    <select class="form-control" v-model="main.shift" required name="shift">
                        <option value="">Select Shift</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="form-control btn btn-info text-center" @click.prevent="mainRequest">Send
            </button>
        </div>
    </form>
    {{--</form>--}}
</div>
