{{--model for add--}}
<div class="modal fade bd-example-modal-lg" id="RequestsModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="row content">
                            <!-- Tabs -->
                            <div class="col-xl-12 col-md-12 m-b-30">

                                <ul class="nav my-class nav-tabs" id="myTab1" style="width: 50%; margin: auto" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show1 btn btn-warning" id="user-tab" data-toggle="tab"
                                           href="#5a" role="tab" aria-selected="false">
                                            <h3>Tooling</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-info" id="designer-tab" data-toggle="tab" href="#2a"
                                           role="tab" aria-selected="false">
                                            <h3>Quality</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-danger" id="designer-tab" data-toggle="tab"
                                           href="#4a" role="tab" aria-selected="false">
                                            <h3>Maintenance</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-success" id="user-tab" data-toggle="tab" href="#1a"
                                           role="tab" aria-selected="false">
                                            <h3>Resin</h3>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content User-Lists" id="myTabContent1">
                                    <div class="tab-pane fade active show1 in" id="5a" role="tabpanel">
                                        <div
                                            class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="media-body">
                                                @include('Area.Requests.Tooling')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="2a" role="tabpanel">
                                        <div
                                            class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">
                                                </h6>
                                                @include('Area.Requests.Quality.Quality')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="4a" role="tabpanel">
                                        <div
                                            class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="media-body">
                                                <h6>
                                                </h6>
                                                @include('Area.Requests.Maintenance.maint')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="1a" role="tabpanel">
                                        <div
                                            class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">
                                                </h6>
                                                @include('Area.Param.holding')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--end modal--}}
