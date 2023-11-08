<!-- /.box-header -->
<div class=" box-body table-responsive">

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Serial') }}</label>
            <span class="label label-info">{{@$machine->serial}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('SEEL') }}</label>
            <span class="label label-info">{{@$machine->seel->name}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Area') }}</label>
            <span
                class="label label-info">Area - {{@$machine->area}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Type') }}</label>
            <span class="label label-info">{{@$machine->type}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Tonnage') }}</label>
            <span class="label label-info">{{@$machine->tonnage}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Screw') }}</label>
            <span class="label label-info">{{@$machine->screw}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Robot') }}</label>
            <span class="label label-info">{{@$machine->robot}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('1K/2k') }}</label>
            <span class="label label-info">{{@$machine->k}}</span>
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group">
            <label for="name">{{ __('Semi/Auto') }}</label>
            <span class="label label-info">{{@$machine->semi_auto}}</span>
        </div>
    </div>
</div>
