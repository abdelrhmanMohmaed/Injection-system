{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="QualityProductionRespModal" tabindex="-1" role="dialog"
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
                    <h3>Choose Your Action</h3>
                    <div class="form-group col-md-6">
                    <select name="action" class="form-control" v-model="action">
                        <option value="">Select Action..</option>
                        <option value="ToolShop">ToolShop</option>
                        <option value="Solved">Solved</option>
                        <option value="Run With Concession">Run With Concession</option>
                    </select>
                    </div>
                    <button class="btn btn-info" @click="lastAction()">Submit</button>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
