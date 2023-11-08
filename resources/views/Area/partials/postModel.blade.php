<style>
    .nav > li > a {
        padding: 10px 6px;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="postModel" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row" id="testt">
                    <div class="col-xs-12">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Post</h3>
                            </div>
                            <!-- /.box-header -->
                            <form id="createPost" method="post">
                                @csrf
                                <div class="row content">
                                    <div class="col-xl-12 col-md-12 m-b-30">
                                        <!-- Tabs -->
                                        <ul class="nav my-class nav-tabs" id="myTab1" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show1" id="user-tab" data-toggle="tab"
                                                   href="#postTab"
                                                   role="tab" aria-selected="false">
                                                    <h3>Post</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="user-tab" data-toggle="tab" href="#nozzleTab"
                                                   role="tab"
                                                   aria-selected="false">
                                                    <h3>Nozzle</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="designer-tab" data-toggle="tab"
                                                   href="#injectionTab" role="tab"
                                                   aria-selected="false">
                                                    <h3>Injection</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="designer-tab" data-toggle="tab"
                                                   href="#holdingTab" role="tab"
                                                   aria-selected="false">
                                                    <h3>Holding</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="user-tab" data-toggle="tab" href="#dosageTab"
                                                   role="tab"
                                                   aria-selected="false">
                                                    <h3>Dosage</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#mouldTab" role="tab"
                                                   aria-selected="true">
                                                    <h3>Mould</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#ejectorsTab" role="tab"
                                                   aria-selected="true">
                                                    <h3>Ejectors</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab"
                                                   href="#monitoringTab"
                                                   role="tab" aria-selected="true">
                                                    <h3>Monitoring</h3>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Developer-tab" data-toggle="tab" href="#coreTab"
                                                   role="tab"
                                                   aria-selected="true">
                                                    <h3>Core</h3>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tabs -->
                                        <div class="tab-content User-Lists" id="myTabContent1">

                                            <!-- PostTab -->
                                            <div class="tab-pane fade active show1 in" id="postTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        @include('Area.Param.post')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PostTab -->

                                            <!-- NozzleTab -->
                                            <div class="tab-pane fade" id="nozzleTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        @include('Area.Param.nozzle')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- NozzleTab -->

                                            <!-- injection -->
                                            <div class="tab-pane fade" id="injectionTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <div v-if="post.machine.type == 'Engel'">
                                                            @include('Area.Param.injection2')
                                                        </div>
                                                        <div v-else>
                                                            @include('Area.Param.injection')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- injection -->

                                            <!-- Holding -->
                                            <div class="tab-pane fade" id="holdingTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <div v-if="post.machine.type=='Engel'">
                                                            @include('Area.Param.holding2')
                                                        </div>
                                                        <div v-else>
                                                            @include('Area.Param.holding')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Holding -->

                                            <!-- Dosage -->
                                            <div class="tab-pane fade" id="dosageTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        @include('Area.Param.dosage')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Dosage -->

                                            <!-- Mould -->
                                            <div class="tab-pane fade" id="mouldTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.mould')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Mould -->

                                            <!-- Ejectors -->
                                            <div class="tab-pane fade" id="ejectorsTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.ejectors')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ejectors -->

                                            <!-- Monitoring -->
                                            <div class="tab-pane fade" id="monitoringTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.monitoring')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Monitoring -->

                                            <!-- Core -->
                                            <div class="tab-pane fade" id="coreTab" role="tabpanel">
                                                <div
                                                    class="media friendlist-box align-items-center justify-content-center m-b-20">
                                                    <div class="media-body">
                                                        <h6 style="font-size: 20px"></h6>
                                                        @include('Area.Param.core')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Core -->

                                        </div>

                                        <div class="media-body row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">{{ __('Comment') }}</label>
                                                    <textarea class="form-control" id="comment" name="comment"
                                                              placeholder="If Change Parameter Add Your Comment To Save This Changes"></textarea>
                                                    <input type="hidden" class="form-control" v-model="post.machine.id" name="machine_id">
                                                </div>
                                            </div>

                                            <div style="float:right !important;">
                                                <button type="submit" @click.prevent="createPost()" class="btn btn-success">Submit</button>
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
        </div>
    </div>
</div>

<script>

    function getParameters(type = null) {
        var part = $('#partNumberPost').val();
        var url = '{{url('get/part/parameters')}}/' + part + '/' + this.post.machine.id;
        if (type) {
            url = '{{url('get/part/parameters')}}/' + part + '/' + this.post.machine.id + '/' + type;
        }
        $.ajax({
            type: 'get',
            url: url,
            success: function (res) {
                if (res) {
                    $('input[name="nozzle[cylTemp][nozzle_zone]"]').val(res['cylTemp'].nozzle_zone);
                    $('input[name="nozzle[cylTemp][zone1]"]').val(res['cylTemp'].zone1);
                    $('input[name="nozzle[cylTemp][zone2]"]').val(res['cylTemp'].zone2);
                    $('input[name="nozzle[cylTemp][zone3]"]').val(res['cylTemp'].zone3);
                    $('input[name="nozzle[cylTemp][zone4]"]').val(res['cylTemp'].zone4);
                    $('input[name="nozzle[cylTemp][zone5]"]').val(res['cylTemp'].zone5);
                    $('input[name="nozzle[cylTemp][zone6]"]').val(res['cylTemp'].zone6);
                    $('input[name="nozzle[cylTemp][youke_zone]"]').val(res['cylTemp'].youke_zone);

                    $('input[name="nozzle[hotRunner][zone1]"]').val(res['hotRunner'].zone1);
                    $('input[name="nozzle[hotRunner][zone2]"]').val(res['hotRunner'].zone2);
                    $('input[name="nozzle[hotRunner][zone3]"]').val(res['hotRunner'].zone3);
                    $('input[name="nozzle[hotRunner][zone4]"]').val(res['hotRunner'].zone4);
                    $('input[name="nozzle[hotRunner][zone5]"]').val(res['hotRunner'].zone5);
                    $('input[name="nozzle[hotRunner][zone6]"]').val(res['hotRunner'].zone6);
                    $('input[name="nozzle[hotRunner][zone7]"]').val(res['hotRunner'].zone7);
                    $('input[name="nozzle[hotRunner][zone8]"]').val(res['hotRunner'].zone8);
                    $('input[name="nozzle[hotRunner][zone9]"]').val(res['hotRunner'].zone9);
                    $('input[name="nozzle[hotRunner][zone10]"]').val(res['hotRunner'].zone10);
                    $('input[name="nozzle[hotRunner][zone11]"]').val(res['hotRunner'].zone11);
                    $('input[name="nozzle[hotRunner][zone12]"]').val(res['hotRunner'].zone12);
                    $('input[name="nozzle[hotRunner][zone13]"]').val(res['hotRunner'].zone13);
                    $('input[name="nozzle[hotRunner][zone14]"]').val(res['hotRunner'].zone14);
                    $('input[name="nozzle[hotRunner][zone15]"]').val(res['hotRunner'].zone15);

                    $('input[name="nozzle[mouldTemp][ejector_side]"]').val(res['mouldTemp'].ejector_side);
                    $('input[name="nozzle[mouldTemp][nozzle_side]"]').val(res['mouldTemp'].nozzle_side);

                    if (res['shortStroke']) {
                        $('input[name="shortStroke[speed1]"]').val(res['shortStroke'].speed1);
                        $('input[name="shortStroke[speed2]"]').val(res['shortStroke'].speed2);
                        $('input[name="shortStroke[force1]"]').val(res['shortStroke'].force1);
                        $('input[name="shortStroke[force2]"]').val(res['shortStroke'].force2);
                        $('input[name="shortStroke[s_over1]"]').val(res['shortStroke'].s_over1);
                        $('input[name="shortStroke[s_over2]"]').val(res['shortStroke'].s_over2);
                        $('input[name="shortStroke[count]"]').val(res['shortStroke'].count);
                    }

                    $('input[name="core[fwd_speed]"]').val(res['core'].fwd_speed);
                    $('input[name="core[fwd_pressure]"]').val(res['core'].fwd_pressure);
                    $('input[name="core[interval_speed]"]').val(res['core'].interval_speed);
                    $('input[name="core[interval_pressure]"]').val(res['core'].interval_pressure);
                    $('input[name="core[bwd_speed]"]').val(res['core'].bwd_speed);
                    $('input[name="core[bwd_pressure]"]').val(res['core'].bwd_pressure);
                    $('input[name="core[count]"]').val(res['core'].count);
                    $('input[name="core[time]"]').val(res['core'].time);

                    $('input[name="dosage[circumferance_speed]"]').val(res['dosage'].circumferance_speed);
                    $('input[name="dosage[back_pressure]"]').val(res['dosage'].back_pressure);
                    $('input[name="dosage[volume]"]').val(res['dosage'].volume);
                    $('input[name="dosage[decomperssion_speed]"]').val(res['dosage'].decomperssion_speed);
                    $('input[name="dosage[decomperssion_volume]"]').val(res['dosage'].decomperssion_volume);

                    $('input[name="ejectors[speed1_advance]"]').val(res['ejectors'].speed1_advance);
                    $('input[name="ejectors[speed2_advance]"]').val(res['ejectors'].speed2_advance);
                    $('input[name="ejectors[speed3_advance]"]').val(res['ejectors'].speed3_advance);
                    $('input[name="ejectors[speed4_advance]"]').val(res['ejectors'].speed4_advance);
                    $('input[name="ejectors[force1_advance]"]').val(res['ejectors'].force1_advance);
                    $('input[name="ejectors[force2_advance]"]').val(res['ejectors'].force2_advance);
                    $('input[name="ejectors[force3_advance]"]').val(res['ejectors'].force3_advance);
                    $('input[name="ejectors[force4_advance]"]').val(res['ejectors'].force4_advance);
                    $('input[name="ejectors[s_over1_advance]"]').val(res['ejectors'].s_over1_advance);
                    $('input[name="ejectors[s_over2_advance]"]').val(res['ejectors'].s_over2_advance);
                    $('input[name="ejectors[s_over3_advance]"]').val(res['ejectors'].s_over3_advance);
                    $('input[name="ejectors[s_over4_advance]"]').val(res['ejectors'].s_over4_advance);

                    $('input[name="ejectors[speed1_retract]"]').val(res['ejectors'].speed1_retract);
                    $('input[name="ejectors[speed2_retract]"]').val(res['ejectors'].speed2_retract);
                    $('input[name="ejectors[speed3_retract]"]').val(res['ejectors'].speed3_retract);
                    $('input[name="ejectors[speed4_retract]"]').val(res['ejectors'].speed4_retract);
                    $('input[name="ejectors[force1_retract]"]').val(res['ejectors'].force1_retract);
                    $('input[name="ejectors[force2_retract]"]').val(res['ejectors'].force2_retract);
                    $('input[name="ejectors[force3_retract]"]').val(res['ejectors'].force3_retract);
                    $('input[name="ejectors[force4_retract]"]').val(res['ejectors'].force4_retract);
                    $('input[name="ejectors[s_over1_retract]"]').val(res['ejectors'].s_over1_retract);
                    $('input[name="ejectors[s_over2_retract]"]').val(res['ejectors'].s_over2_retract);
                    $('input[name="ejectors[s_over3_retract]"]').val(res['ejectors'].s_over3_retract);
                    $('input[name="ejectors[s_over4_retract]"]').val(res['ejectors'].s_over4_retract);

                    $('input[name="mould[speed1_open]"]').val(res['mould'].speed1_open);
                    $('input[name="mould[speed2_open]"]').val(res['mould'].speed2_open);
                    $('input[name="mould[speed3_open]"]').val(res['mould'].speed3_open);
                    $('input[name="mould[speed4_open]"]').val(res['mould'].speed4_open);
                    $('input[name="mould[speed5_open]"]').val(res['mould'].speed5_open);
                    $('input[name="mould[force1_open]"]').val(res['mould'].force1_open);
                    $('input[name="mould[force2_open]"]').val(res['mould'].force2_open);
                    $('input[name="mould[force3_open]"]').val(res['mould'].force3_open);
                    $('input[name="mould[force4_open]"]').val(res['mould'].force4_open);
                    $('input[name="mould[force5_open]"]').val(res['mould'].force5_open);
                    $('input[name="mould[s_over1_open]"]').val(res['mould'].s_over1_open);
                    $('input[name="mould[s_over2_open]"]').val(res['mould'].s_over2_open);
                    $('input[name="mould[s_over3_open]"]').val(res['mould'].s_over3_open);
                    $('input[name="mould[s_over4_open]"]').val(res['mould'].s_over4_open);
                    $('input[name="mould[s_over5_open]"]').val(res['mould'].s_over5_open);
                    $('input[name="mould[clamping_pressure]"]').val(res['mouldclamping_pressure']);
                    $('input[name="mould[mould_height]"]').val(res['mould'].mould_height);

                    $('input[name="mould[speed1_close]"]').val(res['mould'].speed1_close);
                    $('input[name="mould[speed2_close]"]').val(res['mould'].speed2_close);
                    $('input[name="mould[speed3_close]"]').val(res['mould'].speed3_close);
                    $('input[name="mould[speed4_close]"]').val(res['mould'].speed4_close);
                    $('input[name="mould[speed5_close]"]').val(res['mould'].speed5_close);
                    $('input[name="mould[force1_close]"]').val(res['mould'].force1_close);
                    $('input[name="mould[force2_close]"]').val(res['mould'].force2_close);
                    $('input[name="mould[force3_close]"]').val(res['mould'].force3_close);
                    $('input[name="mould[force4_close]"]').val(res['mould'].force4_close);
                    $('input[name="mould[force5_close]"]').val(res['mould'].force5_close);
                    $('input[name="mould[s_over1_close]"]').val(res['mould'].s_over1_close);
                    $('input[name="mould[s_over2_close]"]').val(res['mould'].s_over2_close);
                    $('input[name="mould[s_over3_close]"]').val(res['mould'].s_over3_close);
                    $('input[name="mould[s_over4_close]"]').val(res['mould'].s_over4_close);
                    $('input[name="mould[s_over5_close]"]').val(res['mould'].s_over5_close);
                    $('input[name="mould[clamping_pressure]"]').val(res['mould'].clamping_pressure);
                    $('input[name="mould[mould_height]"]').val(res['mould'].mould_height);

                    $('input[name="monitoring[injection_time]"]').val(res['monitoring'].injection_time);
                    $('input[name="monitoring[plasticizing_time]"]').val(res['monitoring'].plasticizing_time);
                    $('input[name="monitoring[inj_press_s_over]"]').val(res['monitoring'].inj_press_s_over);
                    $('input[name="monitoring[max_inject_press]"]').val(res['monitoring'].max_inject_press);
                    $('input[name="monitoring[cunshining]"]').val(res['monitoring'].cunshining);
                    $('input[name="monitoring[total_cycle_time]"]').val(res['monitoring'].total_cycle_time);

                    $('input[name="injection[speed1]"]').val(res['injection'].speed1);
                    $('input[name="injection[speed2]"]').val(res['injection'].speed2);
                    $('input[name="injection[speed3]"]').val(res['injection'].speed3);
                    $('input[name="injection[speed4]"]').val(res['injection'].speed4);
                    $('input[name="injection[speed5]"]').val(res['injection'].speed5);
                    $('input[name="injection[press1]"]').val(res['injection'].press1);
                    $('input[name="injection[press2]"]').val(res['injection'].press2);
                    $('input[name="injection[press3]"]').val(res['injection'].press3);
                    $('input[name="injection[press4]"]').val(res['injection'].press4);
                    $('input[name="injection[press5]"]').val(res['injection'].press5);
                    $('input[name="injection[s_over1]"]').val(res['injection'].s_over1);
                    $('input[name="injection[s_over2]"]').val(res['injection'].s_over2);
                    $('input[name="injection[s_over3]"]').val(res['injection'].s_over3);
                    $('input[name="injection[s_over4]"]').val(res['injection'].s_over4);
                    $('input[name="injection[s_over5]"]').val(res['injection'].s_over5);
                    $('input[name="injection[injection_pressure]"]').val(res['injection'].injection_pressure);
                    $('input[name="injection[cooling_time]"]').val(res['injection'].cooling_time);

                    $('input[name="holding[speed]"]').val(res['holding'].speed);
                    $('input[name="holding[ramp_time]"]').val(res['holding'].ramp_time);
                    $('input[name="holding[press1]"]').val(res['holding'].press1);
                    $('input[name="holding[press2]"]').val(res['holding'].press2);
                    $('input[name="holding[press3]"]').val(res['holding'].press3);
                    $('input[name="holding[press4]"]').val(res['holding'].press4);
                    $('input[name="holding[press5]"]').val(res['holding'].press5);
                    $('input[name="holding[time1]"]').val(res['holding'].time1);
                    $('input[name="holding[time2]"]').val(res['holding'].time2);
                    $('input[name="holding[time3]"]').val(res['holding'].time3);
                    $('input[name="holding[time4]"]').val(res['holding'].time4);
                    $('input[name="holding[time5]"]').val(res['holding'].time5);
                    $('input[name="holding[cooling_time]"]').val(res['holding'].cooling_time);
                    $('input[name="holding[holding_pressure_time]"]').val(res['holding'].holding_pressure_time);
                    $('input[name="holding[switch_over_volume]"]').val(res['holding'].switch_over_volume);
                }
            }
        });
    }
</script>