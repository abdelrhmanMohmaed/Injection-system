<div class="col-md-3 component">
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Done <i class="fa fa-check-circle"></i> </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            {{$slot}}
        </div>
    </div>

</div>
<script>
    setTimeout(function() {
        $('.component').hide()
    }, 5000);
</script>
