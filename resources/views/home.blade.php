@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <example-component></example-component>
{{--<input type="text" v-model="qty">--}}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script src="{{url('public/axios.min.js')}}"></script>--}}
{{--<script src="{{url('public/vue.js')}}"></script>--}}
{{--<script src="{{ asset('public/js/app.js') }}" defer></script>--}}
{{--<script>--}}
    {{--const app = new Vue({--}}
        {{--el: '#app',--}}
        {{--data: {--}}
            {{--qty:'44',--}}
            {{--trolleys:'{!! $trolleys !!}',--}}
            {{--partNums:'{!! $partNums !!}',--}}
            {{--users:'{!! $users !!}',--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
@endsection
