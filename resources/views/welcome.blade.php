<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-image: radial-gradient(white, gray);
                
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .imgs{
                
                width:10px;
                z-index: -1;
            }
        </style>
    </head>
    <body>
            
        <div class="flex-center position-ref full-height">
        <img src="https://i.ibb.co/DLfDKfL/logo.png" style="width: 362px;"> 
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif
            
            
            <div class="content">
                <div class="title m-b-md">
                    Mini-CRM
                </div>
                
                 
                <div class="links">
                @if (Route::has('login'))
                
                    @auth
                        <a button type="button" class="btn btn-outline-dark" href="{{ url('/home') }}">Home</a>
                    @else
                        <a button type="button" class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
                    @endauth
               
            @endif
                    
                </div>
            </div>
        </div>
    </body>
</html>
