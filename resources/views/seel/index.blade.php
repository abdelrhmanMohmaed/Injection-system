@extends('admin.layouts.master')
@section('title')
    SEELS
@endsection

@include('seel.partials.style')
@section('content')
    <div id="app">
        <!-- Main content -->
        <section class="content">
            <div class="col-xs-12">
                <div class="text-center">
                    <h2 class="text-center">Seels
                        <a href="{{route('areas.index')}}" class="btn btn-sm btn-info">
                            <i class="fa fa-object-group"></i>
                            See All Areas
                        </a>
                    </h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @foreach($seel as $key => $value)
                        <div class="example-2 card">
                            <a href="{{route("seels.show",$key)}}">

                                <div class="wrapper" style="border-radius: 5%;">
                                    <div class="header">
                                        <div class="date">
                                        </div>
                                        <ul class="menu-content">
                                            <li>
                                                <i class="fa fa-desktop" style="color: #0a0a0a;">
                                                    <span>{{$value->count()}}</span>
                                                </i>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" style="color: #0a0a0a">
                                                    <span>{{count($value->groupBy('area'))}}</span>
                                                </i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="data">
                                        <div class="content">
                                            <h1 class="title"><a href="{{ route("seels.show",$key) }}">Seel - {{$key}}</a>
                                            </h1>
                                            <p class="text">
                                                <li style="font-weight: 700">
                                                    <span>{{count($value->groupBy('area'))}}</span> Areas
                                                </li>
                                                <li style="font-weight: 700">
                                                    <span>{{$value->count()}}</span> Machines
                                                </li>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
