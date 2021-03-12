<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hands on test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
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
                font-size: 84px;
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
        </style>
    </head>
    <body>
        <div style="text-align:center">
        <form action="/log" method="post" >
            @csrf <!-- {{ csrf_field() }} -->
            <h1>Login</h1>
            <p>Hands on Test</p>
            <label>Username</label>
            <input type="text" name="user" required="">
            <br>
            <br>
            <label>Password</label>
            <input type="password"  name="pass" required="">
            <br>
            <label style="color:red">{{$x}}</label>
            <br>
            <input type="submit"  name="Login" value="Sign In">
        </form>
        <form action="/register" method="get" >
            @csrf <!-- {{ csrf_field() }} -->
        <input type="submit" name="SignUp" value="Sign Up">
        </form>
        </div>
    </body>
</html>
