{{--model for add--}}
<style>
    .nav > li > a {
        padding: 10px 6px;
    }
</style>
<div class="modal fade bd-example-modal-lg" id="postParameterModel" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="testt2">
                    <div class="col-xs-12">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Parameters</h3>
                            </div>
                            <!-- /.box-header -->
                            <form id="ChangeParameterForm" method="post">
                                @csrf
                                <div class="row content">
                                    <!-- Tabs -->
                                    <div class="col-xl-12 col-md-12 m-b-30">
                                        <ul class="nav my-class nav-tabs" id="myTab1" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="user-tab" data-toggle="tab" href="#nozzleTab2"
                                                   role="tab"
                                                   aria-selected="false">
                                                    <h3>Nozzle</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="designer-tab" data-toggle="tab"
                                                   href="#injectionTab2" role="tab"
                                                   aria-selected="false">
                                                    <h3>Injection</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="designer-tab" data-toggle="tab"
                                                   href="#holdingTab2" role="tab"
                                                   aria-selected="false">
                                                    <h3>Holding</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="user-tab" data-toggle="tab" href="#dosageTab2"
                                                   role="tab"
                                                   aria-selected="false">
                                                    <h3>Dosage</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#mouldTab2" role="tab"
                                                   aria-selected="true">
                                                    <h3>Mould</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#ejectorsTab2" role="tab"
                                                   aria-selected="true">
                                                    <h3>Ejectors</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#monitoringTab2"
                                                   role="tab" aria-selected="true">
                                                    <h3>Monitoring</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#coreTab2" role="tab"
                                                   aria-selected="true">
                                                    <h3>Core</h3>
                                                </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content User-Lists" id="myTabContent1">
                                            <div class="tab-pane fade active show1 in" id="nozzleTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 18px">
                                                        </h6>
                                                        @include('Area.Param.nozzle')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="injectionTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 class="m-0 d-inline" style="font-size: 18px">
                                                        </h6>
                                                        <div v-if="post.machine.type=='Engel'">
                                                            @include('Area.Param.injection2')
                                                        </div>
                                                        <div v-else>
                                                            @include('Area.Param.injection')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="holdingTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 class="m-0 d-inline" style="font-size: 18px">
                                                        </h6>
                                                        <div v-if="post.machine.type=='Engel'">
                                                            @include('Area.Param.holding2')
                                                        </div>
                                                        <div v-else>
                                                            @include('Area.Param.holding')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="dosageTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 class="m-0 d-inline" style="font-size: 18px">
                                                        </h6>
                                                        @include('Area.Param.dosage')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="mouldTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.mould')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ejectorsTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.ejectors')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="monitoringTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.monitoring')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="coreTab2" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.core')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Comment') }}</label>
                                                    <textarea class="form-control"
                                                              placeholder="If Change Parameter Add Your Comment To Save This Changes"
                                                              name="comment"></textarea>

                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="hidden" class="form-control" v-model="post.machine.id"
                                                       name="machine_id">
                                                <input type="hidden" class="form-control" v-model="post.post.part_id"
                                                       name="part_id">
                                                <button type="submit" id="changeParameter"
                                                        @click.prevent="createParameters(post.post.id)"
                                                        style="margin-top: 23px;" class="btn btn-info">Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
