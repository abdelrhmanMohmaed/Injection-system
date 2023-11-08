<div id="toolingDiv">
    {{--<div class="box-body table-responsive">--}}
    <form method="post" id="qualityForm">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">{{ __('Part') }}</label>
                <select required class="form-control" v-model="quality.part_id" name="part_id">
                    <option value="">Select Part</option>
                    <option v-for="part in part" v-bind:value="part.id">@{{part.part_no}}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">{{ __('User') }}</label>
                <select v-model="quality.user_id" required class="form-control" name="user_id">
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
                <select v-model="quality.issue" required class="form-control" name="issue">
                    <option value="">Select Issue</option>
                    <option value="Relase">Relase</option>
                    <option value="Quality Issue">Quality Issue</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">{{ __('Shift') }}</label>
                <select class="form-control" v-model="quality.shift" required name="shift">
                    <option value="">Select Shift</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="form-control btn btn-info text-center" @click.prevent="qualityRequest">Send
        </button>
    </div>
    </form>
    {{--</form>--}}
</div>
