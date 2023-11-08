<script type="application/javascript">

    {{--var socket = io.connect('http://10.107.32.7:5050', {query: 'user_id={{ auth()->id() }}'});--}}
    var tool = new Vue({
        el: '#app',
        data: {
            user: '{!! auth()->check() ?auth()->id() :'null' !!}',
            newreq: [],
            area: [],
            plans: [],
            post: {
                machine: [],
                post: [],
            },
            quality: {
                part_id: '',
                user_id: '',
                issue: '',
                shift: '',
            },
            main: {
                part_id: '',
                user_id: '',
                issue: '',
                issue_id: '',
                sub_issue_id: '',
                shift: '',
            },
            part_id: '',
            user_id: '',
            shift: '',
            importance: '',
            issue_id: '',
            priority: '',
            machine: [],
            part: [],
            issues: [],
            main_issues: [],
            users: [],
        },
        mounted() {
            this.getArea();
            this.newPost();
            this.newPlan();
            this.newParameter();
        },
        methods: {
            getArea() {
                axios.get("{{url('area3/'.request()->segment(count(request()->segments())))}}")
                    .then((response) => {
                        this.area = response.data;
                        console.log(response,"{{url('area3/'.request()->segment(count(request()->segments())))}}");
                    }).catch((error) => {
                    console.log(error,'getAreaFunction');
                });
            },
            submitTool() {
                axios.post('{{url('create/toolRequest')}}', {
                    part_id: this.part_id,
                    user_id: this.user_id,
                    shift: this.shift,
                    importance: this.importance,
                    issue_id: this.issue_id,
                    priority: this.priority,
                })
                    .then((response) => {
                        this.newreq.unshift(response.data);
                        this.part_id = '';
                        this.user_id = '';
                        this.shift = '';
                        this.importance = '';
                        this.issue_id = '';
                        this.priority = '';
                        $('#RequestsModal').modal('hide');
                        this.Success('Request Send');
                        socket.emit('newToolRequest', {data: response.data});
                        socket.emit('notification', {data: 'test'});
                    }).catch((error) => {
                    console.log(error,'submitToolFunction');
                });
            },
            requestModel(id) {
                axios.get("{{url('require/request/model/')}}/" + id)
                    .then((response) => {
                        this.machine = response.data['machine'];
                        this.part = response.data['machine'].parts;
                        this.users = response.data['users'];
                        this.issues = response.data['issues'];
                        this.main_issues = response.data['mainIssue'];
                        $('#RequestsModal').modal('show');
                    }).catch((error) => {
                    console.log(error,'requestModelFunction');
                });
            },
            newPost() {
                socket.on('fetchPost', (data) => {
                    this.getArea();
                });
            },
            newPlan() {
                socket.on('fetchPlan', (data) => {
                    this.getArea();
                });
            },
            newParameter() {
                socket.on('fetchParameter', (data) => {
                    this.getArea();
                });
            },
            MakePost(id) {
                axios.get("{{url('make/post2/')}}/" + id)
                    .then((response) => {
                        this.post.machine = response.data;
                        $('#postModel').modal('show');
                    }).catch((error) => {
                    console.log(error);
                });
            },
            ChangeParameter(bn, machine) {
                axios.get("{{url('machine/current/parameters2')}}/" + bn + "/" + machine)
                    .then((response) => {
                        this.post.machine = response.data.machine;
                        this.post.post = response.data.post;
                        $('#postParameterModel').modal('show');
                        $.ajax({
                            type: 'get',
                            url: '{{url('Parameter/byBn/')}}/' + this.post.post.bn_id,
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
                    }).catch((error) => {
                    console.log(error);
                });
            },
            GM(machine) {
                axios.get("{{url('get/gm/')}}/" + machine)
                    .then((response) => {
                        $('#BNDetailsModal').modal('show');
                        $('#BNdetailsDiv').empty();
                        $('#BNdetailsDiv').html(response.data);
                    }).catch((error) => {
                    console.log(error);
                });
            },
            createPost() {
                var form = document.getElementById('createPost');
                var formData = new FormData(form);
                axios.post("{{url('create/post2')}}", formData).then((response) => {
                    socket.emit('notification', {data: 'test'});
                    socket.emit('newPost', {data: response.data});
                    form.reset();
                    $('#postModel').modal('hide');
                    this.Success('Post Done');
                }).catch((error) => {
                    console.log(error);
                });
            },
            qualityRequest() {
                var form = document.getElementById('qualityForm');
                var formData = new FormData(form);
                axios.post("{{url('create/qualityRequest')}}", formData).then((response) => {
                    socket.emit('newQualityRequest', {data: response.data});
                    socket.emit('notification', {data: 'test'});
                    form.reset();
                    this.quality.part_id = '';
                    this.quality.user_id = '';
                    this.quality.issue = '';
                    this.quality.shift = '';
                    $('#RequestsModal').modal('hide');
                    this.Success('Request Send');
                }).catch((error) => {
                    console.log(error);
                });
            },
            mainRequest() {
                var form = document.getElementById('mainForm');
                var formData = new FormData(form);
                formData.append('issue_id',this.main.issue.id);
                axios.post("{{url('create/mainRequest')}}", formData).then((response) => {
                    socket.emit('newMainRequest', {data: response.data});
                    socket.emit('notification', {data: 'test'});
                    form.reset();
                    this.main.part_id = '';
                    this.main.user_id = '';
                    this.main.issue = '';
                    this.main.issue_id = '';
                    this.main.sub_issue_id = '';
                    this.main.shift = '';
                    $('#RequestsModal').modal('hide');
                    this.Success('Request Send');
                }).catch((error) => {
                    console.log(error);
                });
            },
            Success(res = null) {
                swal({
                    title: "Success",
                    text: res,
                    timer: 2000,
                    button: false,
                });
            },
            createParameters(post) {
                var form2 = document.getElementById('ChangeParameterForm');
                var formData = new FormData(form2);
                axios.post("{{url('change/post/parameter2/')}}/" + post, formData).then((response) => {
                    socket.emit('notification', {data: 'test'});
                    socket.emit('newParameter', {data: response.data});
                    form2.reset();
                    $('#postParameterModel').modal('hide');
                    this.Success('Parameter Changed');
                }).catch((error) => {
                    console.log(error);
                });
            },
            getParameters(type = null) {
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
        }
    });
</script>
<script type="application/javascript">
    function getValue(id) {
        if ($('#check' + id).is(':checked')) {
            $('#value' + id).prop("disabled", false);
            $('#value' + id).css('display', 'block');
        } else {
            $('#value' + id).prop("disabled", "disabled");
            $('#value' + id).css('display', 'none');
        }
    }

    function addGM() {
        var gm_arr = $("input[name='gm_id[]']").serializeArray();
        var value_arr = $('input[name="gm_value[]"]').serializeArray();
        $.ajax({
            type: 'post',
            url: '{{url('add/gm')}}',
            data: {
                machine_id: $('.gm_machine').val(),
                shift: $('.gm_shift').val(),
                gm_id: gm_arr,
                value: value_arr,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (res) {
                if (res == 'Done') {
                    $('#BNDetailsModal').modal('hide');
                }
            }
        });
    }

    function success(res) {
        setTimeout(function () {
            swal("", res, "success")
        }, 5000);

    }
</script>
