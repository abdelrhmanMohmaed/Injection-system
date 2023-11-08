{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="ConfirmModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="BNdetailsDiv">
                <center>
                     <h3><b>By Pressing Confirmation Button You Confirm That This Tool In Tool Shop Now, If It Wasn't
                            There Please Send It To Tool Shop First</b></h3>
                    <button id="confirmInTool" @click="confirmInTool()" class="btn btn-info">Confirm</button>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
