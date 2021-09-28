<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-grid.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-reboot.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-utilities.min.css') }}" rel="stylesheet">

        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container{
                margin: auto;
            }
            a{
                text-decoration: none;
            }
            .container .row form{
                border: 1px solid gray;
                border-radius: 10px;
                transition: background 0.2s linear;
            }
            .container .row form:hover{
                background-color: #d3d3d34f;
            }
            .container .row form .row{
                margin: 1em auto;
            }
            .container .row form .btns-group {
                display: flex;
                justify-content: space-between;
            }
            .container .row form .btns-group .btn{
                transition: padding 0.2s ease
            }
            .container .row form .btns-group .btn:hover{
                padding-left: 2em;
                padding-right: 2em;
            }
            .home-link {
                text-decoration: underline;
                padding-bottom: 1em;
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        @if (!Route::has('login'))
        <div class="container">
            <div class="row">
                <form class="form col-md-4" action="/login" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email here...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="password">Password <small>(At least 6 char)</small></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password here..." minlength="6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btns-group">
                                <div>
                                    <a class="btn btn-info" href="/register">Sign up</a>
                                </div>
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                            <hr>
                            <a class="home-link btn btn-default" href="/">Home</a>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

            </div>
        </div>
        @endif
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>

    </body>
</html>
