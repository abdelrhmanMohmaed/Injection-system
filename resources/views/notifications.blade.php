@extends('admin.layouts.master')
@extends('admin.layouts.master')
@section('title')
    Notifications
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Notifications
        </h1>
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Notifications </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable myTable">
                            <tbody>
                            @foreach($notifications as $n)

                                <tr style="cursor: pointer"
                                    @if($n->type=='App\Notifications\ToolRequest')
                                    onclick="window.location.href='{{url('total/tool/request#').$n->data['tool_id']}}'"
                                    @elseif($n->type=='App\Notifications\newPost' || $n->type=='App\Notifications\changeParameter')
                                        onclick="window.location.href='{{url('allPosts#').$n->data['post']}}'"
                                    @elseif($n->type=='App\Notifications\QualityRequest')
                                    onclick="window.location.href='{{url('total/quality/request#').$n->data['request_id']}}'"
                                    @elseif($n->type=='App\Notifications\MainRequest')
                                    onclick="window.location.href='{{url('total/main/request#').$n->data['request_id']}}'"
                                @endif>
                                    <td class="mailbox-name"><b>{{$n->data['title']}}</b></td>
                                    <td class="mailbox-subject"><b>{{$n->data['message']}}</b></td>
                                    <td class="mailbox-date">{{$n->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')

    <script>
        function openNotification(id) {
            window.location.href='{{url('total/tool/request#')}}'+id;
        }
        </script>
@endsection
