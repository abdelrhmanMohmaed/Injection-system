@section('css')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        * {
            box-sizing: border-box;
        }

        body {
            background-image: linear-gradient(to right, #034378, #2d4e68);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            height: 100vh;
            font-family: 'Open Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        h1 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
        }

        .row {
            max-width: 900px;
            margin: 50px auto 0;
        }

        .card {
            float: left;
            padding: 0 1.7rem;
            width: 50%;
        }

        .card .menu-content {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .card .menu-content::before, .card .menu-content::after {
            content: '';
            display: table;
        }

        .card .menu-content::after {
            clear: both;
        }

        .card .menu-content li {
            display: inline-block;
        }

        .card .menu-content a {
            color: #fff;
        }

        .card .menu-content span {
            position: absolute;
            left: 50%;
            top: 0;
            font-size: 10px;
            font-weight: 700;
            font-family: 'Open Sans';
            transform: translate(-50%, 0);
        }

        .card .wrapper {
            background-color: #fff;
            min-height: 380px !important;
            position: relative;
            overflow: hidden;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.2);
        }

        .card .wrapper:hover .data {
            transform: translateY(0);
        }

        .card .data {
            position: absolute;
            bottom: 0;
            width: 100%;
            transform: translateY(calc(70px + 1em));
            transition: transform 0.3s;
        }

        .card .data .content {
            padding: 1em;
            position: relative;
            z-index: 1;
        }

        .card .author {
            font-size: 12px;
        }

        .card .title {
            margin-top: 10px;
        }

        .card .text {
            height: 70px;
            margin: 0;
        }

        .card input[type='checkbox'] {
            display: none;
        }

        .card input[type='checkbox']:checked + .menu-content {
            transform: translateY(-60px);
        }

        .example-2 .wrapper {
            background: url({{url('public/img/SEEL2.jpg')}}) center / cover no-repeat;
        }

        .example-2 .wrapper:hover .menu-content span {
            transform: translate(-50%, -10px);
            opacity: 1;
        }

        .example-2 .header {
            color: #fff;
            padding: 1em;
        }

        .example-2 .header::before, .example-2 .header::after {
            content: '';
            display: table;
        }

        .example-2 .header::after {
            clear: both;
        }

        .example-2 .header .date {
            float: left;
            font-size: 12px;
        }

        .example-2 .menu-content {
            float: right;
        }

        .example-2 .menu-content li {
            margin: 0 5px;
            position: relative;
        }

        .example-2 .menu-content span {
            transition: all 0.3s;
            opacity: 0;
        }

        .example-2 .data {
            color: #fff;
            transform: translateY(calc(70px + 4em));
        }

        .example-2 .title a {
            color: #fff;
        }

        .example-2 .button {
            display: block;
            width: 100px;
            margin: 2em auto 1em;
            text-align: center;
            font-size: 12px;
            color: #fff;
            line-height: 1;
            position: relative;
            font-weight: 700;
        }

        .example-2 .button::after {
            content: '\2192';
            opacity: 0;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translate(0, -50%);
            transition: all 0.3s;
        }

        .example-2 .button:hover::after {
            transform: translate(5px, -50%);
            opacity: 1;
        }

    </style>
@endsection
