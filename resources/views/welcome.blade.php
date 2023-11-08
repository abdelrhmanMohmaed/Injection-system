<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Production</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Cute+Font&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-image:url('{{url('public/img/pro2.jpg')}}');
                background-size: cover;
                background-color: #fff;
                /*color: #000000;*/
                /*font-family: 'Nunito', sans-serif;*/
                font-family: 'Cute Font', cursive;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #ff1100;
                margin-top: 12rem;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Production
                </div>
{{--<h1>users</h1>--}}
               {{--<h3 v-for="user in users">@{{ user }}</h3>--}}

                <div class="links">

                </div>
            </div>
        </div>
        </div>

        {{--<script src="{{url('public/vue.js')}}"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>--}}
        {{--<script src="{{ asset('public/js/app.js') }}" defer></script>--}}
        {{--<script>--}}
            {{--var socket=io('http://localhost:3000');--}}
            {{--const app = new Vue({--}}
                {{--el: '#app',--}}
                {{--data: {--}}
                    {{--users:[],--}}
                    {{--trolleys:'{!! $trolleys !!}',--}}
                    {{--partNums:'{!! $partNums !!}',--}}
                    {{--users:'{!! $users !!}',--}}
                {{--},--}}
                {{--ready:function () {--}}
                    {{--socket.on('test-channel:login',function (data) {--}}
                        {{--this.users.push(data.username);--}}

                    {{--}.bind(this))--}}
                {{--}--}}
            {{--});--}}
        {{--</script>--}}

    </body>
</html>
