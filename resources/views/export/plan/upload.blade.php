
{{--model for date--}}
<div class="modal modal-primary  fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-inline" action="{{url('upload/plan')}}" enctype="multipart/form-data"
                      method="post">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="file" name="file" class="form-control" id="file">
                    </div>

                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
