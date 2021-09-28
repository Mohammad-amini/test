<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Advertising - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <style type="text/css">
            .material-icons-outlined{
                font-family: 'Material Icons';
            }
            #add_advertise{
                position: fixed;
                left: 14em
            }
            #add_advertise span{
                font-size: 3em;
            }
            a{
                text-decoration: none !important;
            }
            li{
                list-style: none;
            }
            body{
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            body .navbar{
                position: absolute;
                top: 0.7em;
            }
        </style>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-grid.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-reboot.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-utilities.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <!-- Styles -->
    </head>
    <body>
        <nav class="navbar navbar-light">
                    @auth
                        <h2>Wellcome <a class="navbar-brand" href="#">{{Auth::user()->name}}</a></h2>
                    @endauth

        </nav>
        <div class="fluid-container">
            <div class="row" style="margin: auto;">
                <div class="col-md-2" dir="ltr" align="" style="position: relative; padding-left: 0; padding-top: 1em; border: 1px solid aqua; border-radius: 10px; margin: 1em 1em;">
                    @auth
                        <a id='add_advertise' href="/advertises/add" title="Add new advertise"><span class="material-icons">note_add</span></a>
                    @endif
                    <ul dir="ltr" style="">
                        <li><a href="/">Home</a></li>
                        @auth
                            <li><a href="/advertises/my-ads">My Ads</a></li>
                            <li style="margin-top: 1em"><a onclick="return confirm('Are you sure to exit')" href="/logout">Logout</a></li>
                            <script type="text/javascript">
                                function logoutUser(e){
                                    console.log(confirm('Are you sure to exit'))
                                    if(!confirm('Are you sure to exit'))
                                        e.preventDefault();
                                }
                            </script>
                        @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Sign up</a></li>
                        @endif
                        <li style="border-top: 1px solid gray; padding-top: 1em; margin-top: 1em;">
                            <form class="col-md-12" action="/advertises/search" method="post">
                                <input placeholder="Search" class="form-control" type="" name="search-field">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12">
                    @yield('content')
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/bootstrap.esm.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>