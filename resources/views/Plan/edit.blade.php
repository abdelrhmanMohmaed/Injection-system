<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Edit Part
                </h3>
            </div>
            <!-- /.box-header -->
            <form id="PlanForm" method="post"
                  {{--action="{{url('edit/plan')}}"--}}>
                @csrf
                <div class="box-body table-responsive">
                    @foreach($plans as $item)
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Machine') }}</label>
                                    <input class="form-control" disabled name="machine_id" value="{{$item->machine_id}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Part') }}</label>
                                    <input class="form-control" name="part" disabled value="{{$item->part->part_no}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Demand') }}</label>
                                    <input class="form-control" id="planDemand" name="demand[]" value="{{$item->demand}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Missing') }}</label>
                                    <input class="form-control" id="planMissing" name="missing" disabled
                                           value="{{$item->missing}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Week') }}</label>
                                    <input class="form-control" name="week" disabled value="{{$item->week}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">{{ __('Priority') }}</label>
                                    <input class="form-control" name="priority[]" value="{{$item->priority}}">
                                    <input type="hidden" class="form-control" name="id[]" value="{{$item->id}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button  id="EditPlan" class="btn btn-info">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
{{--@section('js')--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script>
        var socket = io.connect('http://10.107.32.7:5050', {query: 'user_id={{ auth()->id() }}'});
        $('#EditPlan').click(function (e) {
            e.preventDefault();
            let formData = $('#PlanForm').serializeArray();
            $.ajax({
                type: 'post',
                url: '{{url('edit/plan')}}',
                data: formData,
                success: function (res) {
                    // console.log(res)
                    socket.emit('changePlan', {data: 'test'});
                    $('#BNDetailsModal').modal('hide');
                    location.reload();
                },error: function (err) {

                    console.log(err,'error in edit plan function ')
                }
            });

        });
    </script>
{{--@endsection--}}
