@extends('admin.layouts.master')

@section('title')
    Update user: {{$user->name}}
@endsection

@section('content')
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
                            <i class="fa fa-users"></i>&nbsp; update user: {{$user->name}}
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('users.update',$user->id)}}">
                            @csrf
                            <!-- Name, E-Mail-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{$user->name}}"
                                               autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="text-danger">
                                                 <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                 {{ $message }}
                                             </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" value="{{$user->email}}"
                                               autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="text-danger">
                                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                                             {{ $message }}
                                         </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Name, E-Mail-->

                            <!-- title,  seel_code-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" placeholder="EX: Leader" value="{{$user->title}}"
                                               autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="text-danger">
                                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                                         {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seel_code">{{ __('Seel Code') }}</label>
                                        <input type="number"
                                               class="form-control @error('seel_code') is-invalid @enderror"
                                               id="seel_code" name="seel_code" value="{{ $user->seel_code }}"
                                               autocomplete="seel_code" required>
                                        @error('seel_code')
                                        <span class="text-danger">
                                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                                             {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Type,  Roles-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="robot">{{ __('Type') }}</label>
                                        <select class="form-control" name="type" required>
                                            <option disabled selected>
                                                Select Type..
                                            </option>
                                            <option value="0" @if($user->type==='0') selected="selected" @endif>User
                                            </option>
                                            <option value="1" @if($user->type==='1') selected="selected" @endif>Admin
                                            </option>
                                        </select>
                                        @error('type')
                                        <span class="text-danger">
                                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                                             {{ $message }}
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="robot">{{ __('Roles') }}</label>
                                        <select name="roles[]" data-live-search="true"
                                                class="form-control selectpicker" multiple
                                                title="Select Roles.." required>
                                            @foreach($roles as $r)
                                                <option value="{{$r->id}}">{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                        <span class="text-danger">
                                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                                             {{ $message }}
                                         </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="screw">{{ __('Password') }}</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               id="password" name="password" autocomplete="new-password">
                                        @error('password')
                                            <span class="text-danger">
                                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                                             {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control" id="password-confirm"
                                               name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div style="float:right !important;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
