<div class="box-body">
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label
                    for="partNumberPost">{{ __('Part') }}</label>

                <select @change="getParameters()" style="width: 180px; !important;"
                        id="partNumberPost" class="form-control"
                        name="part_id" required>
                    <option disabled selected>
                        Select Part
                    </option>
                    <option v-for="part in post.machine.parts"
                            v-bind:value="part.id">
                        @{{part.part_no}}
                    </option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="counter">{{ __('Counter') }}</label>
                <input type="number" placeholder="Counter"
                       id="counter" class="form-control"
                       name="counter" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="io">{{ __('IO') }}</label>
                <input type="number" placeholder="IO" id="io"
                       class="form-control" name="io" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="nio">{{ __('NIO') }}</label>
                <input type="number" class="form-control"
                       id="nio" required placeholder="NIO"
                       name="nio">
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label for="name">{{ __('Cav') }}</label>
                <input type="number" class="form-control"
                       required
                       placeholder="Cav" name="cav">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label
                    for="cycle_time">{{ __('Cycle Time') }}</label>
                <input class="form-control"
                       placeholder="Cycle Time" id="cycle_time"
                       name="cycle_time" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="name">{{ __('Shift') }}</label>
                <select class="form-control" required
                        name="shift">
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
                <select required class="form-control"
                        name="type">
                    <option disabled selected>Select Type
                    </option>

                    @foreach(\App\Helper\PostType::arr as $key => $value)
                        <option value="{{$key}}">
                            {{$value}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</div>
