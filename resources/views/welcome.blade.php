<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                font-size: 54px;
            }
            .form-text {
                font-size: 24px;
            }
            .links > a {
                color: #636b6f;
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

            th{
                text-align: center;
            }

        </style>
    </head>
    <body>
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
                Current Weather 
                </div>
                <form action="/show" method="post">
                    @csrf   
                    <input type="text" name="location" class="form-text" value="Taipei">
                    <button type="submit" class="btn btn-primary form-text">Search</button>
                </form>
                
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>History</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="col-6 task-content" name="location"  >Location</th>
                            <th class="col-6 task-content" name="temp"  >Temperature</th>
                            <th class="col-6 task-content" name="weather"  >Weather</th>
                            
                        </tr>
                        @if($datas)
                            @foreach ($datas as $data)
                            <tr>
                                <td class="col-6 task-content" name="location" value="{{$data['location']}}" >{{$data['location']}}</td>
                                <td class="col-6 task-content" name="temp" value="{{$data['temp']}}" >{{$data['temp']}}</td>
                                <td class="col-6 task-content" name="weather" value="{{$data['weather']}}" >{{$data['weather']}}</td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
