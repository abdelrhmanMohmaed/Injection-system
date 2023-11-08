@extends('admin.layouts.master')

@section('title')
    Update Machine: ({{$machine->type}})
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i style="color: #f5f0e3" class="fa fa-desktop"></i>&nbsp; Update Machine: ( {{$machine->type}} )
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('machines.update',$machine->id)}}">
                            @csrf
                            <!-- Seel Area-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seel">{{ __('SEEL') }}</label>
                                        <select required class="form-control" name="seel">
                                            <option disabled selected >Open the select menu</option>
                                            @foreach($seels as $item)
                                                <option value="{{$item->id}}" @if( $item->id == $machine->seel_id) selected="selected" @endif>{{$item->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('seel')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                             </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area">{{ __('Area') }}</label>
                                        <input type="number" class="form-control" id="area" name="area" placeholder="EX: 5" value="{{$machine->area}}">
                                        @error('area')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                             </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Seel Area-->

                            <!-- Robot, 1K/2k, Semi/Auto-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="robot">{{ __('Robot') }}</label>
                                        <select class="form-control" name="robot" required>
                                            <option value="Yes" @if($machine->robot ==='Yes') selected="selected" @endif>Yes</option>
                                            <option value="No" @if($machine->robot ==='No') selected="selected" @endif>No</option>
                                        </select>
                                        @error('robot')
                                        <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">{{ __('1K/2k') }}</label>
                                        <select class="form-control" name="k" required>
                                            <option value="1K" @if($machine->k ==='1K') selected="selected" @endif >1K</option>
                                            <option value="2K" @if($machine->k ==='2K') selected="selected" @endif >2K</option>
                                        </select>
                                        @error('k')
                                        <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="semi_auto">{{ __('Semi/Auto') }}</label>
                                        <select required class="form-control" name="semi_auto">
                                            <option value="Semi" @if($machine->semi_auto ==='Semi') selected="selected" @endif >Semi</option>
                                            <option value="Auto" @if($machine->semi_auto ==='Auto') selected="selected" @endif >Auto</option>
                                            <option value="Auto/Semi" @if($machine->semi_auto ==='Auto/Semi') selected="selected" @endif >Auto/Semi</option>
                                        </select>

                                        @error('semi_auto')
                                        <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Robot, 1K/2k, Semi/Auto-->

                            <!-- Serial, Type, Tonnage, Screw -->
                            <div class="form-group">
                                <label for="serial">{{ __('Serial') }}</label>
                                <input type="text" class="form-control" id="serial" name="serial" placeholder="EX: 220A4S1002886" value="{{$machine->serial}}">
                                @error('serial')
                                <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">{{ __('Type') }}</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="EX: Engel Insert" value="{{$machine->type}}">
                                @error('type')
                                <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tonnage">{{ __('Tonnage') }}</label>
                                <input type="number" class="form-control" id="tonnage" name="tonnage" placeholder="EX: 60" value="{{$machine->tonnage}}">
                                @error('tonnage')
                                <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="screw">{{ __('Screw') }}</label>
                                <input type="text" class="form-control" id="screw" name="screw" placeholder="EX: 25" value="{{$machine->screw}}">
                                @error('screw')
                                <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                     </span>
                                @enderror
                            </div>
                            <!-- Serial, Type, Tonnage, Screw -->

                            <div style="float:right !important;">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
