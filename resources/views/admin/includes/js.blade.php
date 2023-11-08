<!-- jQuery 3 -->
<script src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->

<script src="{{ asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{ASSET('assets/admin/plugins/chosen/chosen.js')}}"></script>
<script type="text/javascript" src="{{ASSET('assets/admin/plugins/chosen/chosen-demo.js')}}"></script>
{{--<script src="../../plugins/select2/select2.full.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>--}}
{{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/data.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
        $('.chosen_direct_manager').chosen();
    })
</script>
<script src="https://unpkg.com/vue"></script>
<script src="{{url('public/vuescript.js')}}"></script>
<script src="{{url('public/axiosscript.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script type="application/javascript">
    var socket = io.connect('http://10.107.32.7:5050', {query: 'user_id={{ auth()->id() }}'});
    var tool = new Vue({
        el: '#bodyApp',
        data: {
            {{--user: '{!! auth()->check() ?auth()->id() :'null' !!}',--}}
            notifications:[],
            notifiCount:'',
        },
        mounted() {
            this. allNotifications();
            this. fetchNotification();
        },
        methods: {
            allNotifications() {
                axios.get("{{url('get/user/notifications')}}")
                    .then((response) => {
                        this.notifications = response.data;
                        this.notifiCount = response.data.length;
                    }).catch((error) => {
                    console.log(error);
                });
            },
            fetchNotification() {
                socket.on('fetchNotification', (data) => {
                    this.allNotifications();
                    var beeb = new Audio('{{url('public/notification.mp3')}}');
                    beeb.play();
                });
            },
            readNotification(id){
                axios.get("{{url('read/notification')}}/"+id.id).then((response)=>{
                    if(id.type=="App\\Notifications\\newPost" || id.type=="App\\Notifications\\changeParameter"){
                        url='{{url('allPosts#')}}'+id.data.post;
                    }else if(id.type=='App\\Notifications\\ToolRequest'){
                        url='{{url('total/tool/request#')}}'+id.data.tool_id;
                    }else if(id.type=='App\\Notifications\\QualityRequest'){
                        url='{{url('total/quality/request#')}}'+id.data.request_id;
                    }else if(id.type=='App\\Notifications\\MainRequest'){
                        url='{{url('total/main/request#')}}'+id.data.request_id;
                    }
                    this.notifications.splice(this.notifications.indexOf(id), 1);
                    this.notifiCount=this.notifications.length;
                    window.location.href=url;
                }).catch((error)=>{
                   console.log(error);
                });
            },
            markAsRead(){
                axios.get("{{url('markAsRead/notification')}}").then((response)=>{
                this.allNotifications();
                }).catch((error)=>{
                    console.log(error);
                });
            },
            notificationHistory(){
                window.location.href='{{url('notification/history')}}';
            },
        }
    });
</script>
