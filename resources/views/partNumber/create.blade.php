@extends('admin.layouts.master')

@section('title')
    Create New Part Numbers
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
                            <i class="fa fa-list-alt"></i> &nbsp;
                            Add New Part Numbers
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">

                        <form method="POST" action="{{route('parts.store')}}">
                            @csrf
                            <!-- Part Number and Customer -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="part_no">{{  __('Part Number') }}</label>
                                        <input required type="text" class="form-control" id="part_no" name="part_no" placeholder="EX: 71052977-04" value="{{old('part_no')}}">
                                        @error('part_no')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer">{{  __('Customer') }}</label>
                                        <input required type="text" class="form-control" id="customer" name="customer" placeholder="EX: Paint Line" value="{{old('customer')}}">
                                        @error('customer')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Part Number and Customer -->

                            <!-- Internal or External and Cell -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="internal">{{  __('Type') }}</label>
                                        <select class="form-control" name="internal" required>
                                            <option value="Internal" @if(old('internal')=== 'Internal') selected="selected" @endif>Internal</option>
                                            <option value="External" @if(old('internal')=== 'External') selected="selected" @endif>External</option>
                                        </select>
                                        @error('internal')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cell">{{  __('Cell') }}</label>
                                        <input required type="text" class="form-control" id="cell" name="cell" placeholder="EX: 79" value="{{old('cell')}}">
                                        @error('cell')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Internal or External and Cell -->

                            <!-- Category, Family, Color, inj Type -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="category">{{ __('Category') }}</label>
                                        <select required class="form-control" id="category" name="category">
                                            <option value="SEMI" @if(old('category') === 'SEMI') selected="selected" @endif >SEMI</option>
                                            <option value="AUTO" @if(old('category') === 'SEMI') selected="selected" @endif >AUTO</option>
                                        </select>
                                        @error('category')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="family">{{ __('Family') }}</label>
                                        <input required type="text" class="form-control" id="family" name="family" placeholder="EX: CDW" value="{{old('family')}}">
                                        @error('family')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="color">{{ __('Color') }}</label>
                                        <input required type="text" class="form-control" id="color" name="color" placeholder="EX: White" value="{{old('color')}}">
                                        @error('color')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inj_type">{{ __('inj Type') }}</label>
                                        <select required class="form-control" id="inj_type" name="inj_type">
                                            <option value="1K" @if(old('inj_type')=== '1K') selected="selected" @endif>1K</option>
                                            <option value="2K" @if(old('inj_type')=== '2K') selected="selected" @endif>2K</option>
                                            <option value="insert" @if(old('inj_type')=== 'insert') selected="selected" @endif>Insert</option>
                                            <option value="imd" @if(old('inj_type')=== 'imd') selected="selected" @endif>IMD</option>
                                            <option value="iml" @if(old('inj_type')=== 'iml') selected="selected" @endif>IML</option>
                                        </select>
                                        @error('inj_type')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Category, Family, Color, inj Type -->

                            <!-- Machine Name, Tool No, Cav, Consumption Rate -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="select2">{{ __('M.Name') }}</label>
                                        <select class="form-control" name="machine_id" required id="select2">
                                            <option selected disabled>Open this menu</option>
                                            @foreach($machines as $item)
                                                <option value="{{$item->id}}" @if(old('machine_id')=== $item->id) selected="selected" @endif>
                                                    {{$item->type}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('machine_id')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tool_no">{{ __('Tool No') }}</label>
                                        <input required type="number" class="form-control" id="tool_no" name="tool_no" placeholder="EX: 5148" value="{{old('tool_no')}}">
                                        @error('tool_no')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cav">{{ __('Cav') }}</label>
                                        <input required type="number" class="form-control" id="cav" name="cav" placeholder="EX: 4" value="{{old('cav')}}">
                                        @error('cav')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="consumption_rate">{{ __('Consumption Rate') }}</label>
                                        <input required type="number" class="form-control" id="consumption_rate" name="consumption_rate" placeholder="EX: 67.5" value="{{old('consumption_rate')}}">
                                        @error('consumption_rate')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- Machine Name, Tool No, Cav, Consumption Rate -->

                            <!-- C.T, Qty, Sorting, Reject Rate -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cycle_time">{{ __('C.T') }}</label>
                                        <input required type="number" class="form-control" id="cycle_time" name="cycle_time" placeholder="EX: 22" value="{{old('cycle_time')}}">
                                        @error('cycle_time')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="qty">{{ __('Qty') }}</label>
                                        <input required type="number" class="form-control" id="qty" name="qty" placeholder="EX: 20" value="{{old('qty')}}">
                                        @error('qty')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sorting">{{ __('Sorting') }}</label>
                                        <select required class="form-control" name="sorting">
                                            <option value="YES" @if(old('sorting')=== 'YES') selected="selected" @endif>YES</option>
                                            <option value="NO" @if(old('sorting')=== 'NO') selected="selected" @endif>NO</option>
                                        </select>
                                        @error('sorting')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="color">{{ __('Reject Rate') }}</label>
                                        <input required type="number" step="0.01" class="form-control" id="reject_rate" name="reject_rate" placeholder="EX: 0.05" value="{{old('reject_rate')}}">
                                        @error('reject_rate')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- C.T, Qty, Sorting, Reject Rate -->

                            <!-- Rate -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="rate">{{ __('Rate') }}</label>
                                    <input required type="number" class="form-control" id="rate" name="rate" placeholder="EX: 326" value="{{old('rate')}}">
                                    @error('rate')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Rate -->

                            <!-- Resins PN and Shot Wights -->
                            <!-- Resin PN1 and Shot Wight1 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resin_pn1">{{  __('Resin PN1') }}</label>
                                        <input type="number" class="form-control" id="resin_pn1" name="resin_pn1" placeholder="EX: 190155" value="{{old('resin_pn1')}}">
                                        @error('resin_pn1')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shot_wight1">{{  __('Shot Wight1') }}</label>
                                        <input type="number" class="form-control" id="shot_wight1" name="shot_wight1" placeholder="EX: 100" value="{{old('shot_wight1')}}">
                                        @error('shot_wight1')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Resin PN1 and Shot Wight1 -->

                            <!-- Resin PN2 and Shot Wight2 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resin_pn2">{{  __('Resin PN2') }}</label>
                                        <input type="number" class="form-control" id="resin_pn2" name="resin_pn2" placeholder="EX: 190360" value="{{old('resin_pn2')}}">
                                        @error('resin_pn2')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shot_wight2">{{  __('Shot Wight2') }}</label>
                                        <input type="number" class="form-control" id="shot_wight2" name="shot_wight2" placeholder="EX: 100" value="{{old('shot_wight2')}}">
                                        @error('shot_wight2')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Resin PN2 and Shot Wight2 -->

                            <!-- Resin PN3 and Shot Wight3 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resin_pn3">{{  __('Resin PN3') }}</label>
                                        <input type="number" class="form-control" id="resin_pn3" name="resin_pn3" placeholder="EX: 190360" value="{{old('resin_pn3')}}">
                                        @error('resin_pn3')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shot_wight3">{{  __('Shot Wight3') }}</label>
                                        <input type="number" class="form-control" id="shot_wight3" name="shot_wight3" placeholder="EX: 100" value="{{old('shot_wight3')}}">
                                        @error('shot_wight3')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Resin PN3 and Shot Wight3 -->

                            <!-- Resin PN4 and Shot Wight4 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resin_pn4">{{  __('Resin PN4') }}</label>
                                        <input type="number" class="form-control" id="resin_pn4" name="resin_pn4" placeholder="EX: 190360" value="{{old('resin_pn4')}}">
                                        @error('resin_pn4')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shot_wight4">{{  __('Shot Wight3') }}</label>
                                        <input type="number" class="form-control" id="shot_wight4" name="shot_wight4" placeholder="EX: 100" value="{{old('shot_wight4')}}">
                                        @error('shot_wight4')
                                        <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Resin PN4 and Shot Wight4 -->
                            <!-- Resins PN and Shot Wights -->

                            <!-- Description -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">{{__('Description')}}</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                        @error('description')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->

                            <div style="float:right !important;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@include('partNumber.partials.style')
@include('partNumber.partials.script')

