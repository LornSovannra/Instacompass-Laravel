<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Instagram</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">

    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: url("https://images.pexels.com/photos/593316/pexels-photo-593316.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
            background-position: center;
            background-size: cover;
            font-family: sans-serif;
        }
        .container{
            text-align: center;
        }
        .text{
            color: #fff;
            letter-spacing: 1px;
            margin: 10px;
        }
        .page{
            width: 350px;
            background: #fff;
            border-radius: 20px;
            padding-bottom: 15px;
            box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
        }
        .title{
            padding: 30px 0 10px 0;
            text-transform: capitalize;
            font-size: 25px;
            font-family: sans-serif;
            font-weight: bold;
        }
        form{
            width: 75%;
            display: flex;
            flex-direction: column;
            position: relative;
            left:15% ;
            transition: translateX(-50%);
            margin: 20px 0 0 0;
        }
        form input{
            margin: 0 0 1em 0;
            border: 1px solid rgba(0, 0, 0, 0.4);
            border-radius: 15px;
            outline: none;
        }
        form input:focus{
            border: 1px solid rgba(0, 0, 0, 0.7);
            background: #efefef;

        }
        input[type="text"],input[type="password"]{
            padding-left: 10px;
            position: relative;
            height: 35px;
            font-size: 17px;
        }
        input::placeholder{
            font-weight: normal;
            font-size: 13px;
            transition: 0.3s ease;
        }
        input:focus::placeholder{
            position: absolute;
            font-size: 10px;
            transform: translateY(-13px);

        }
        form button{
            border: none;
            background: #043fff;
            padding: .8em 0;
            margin-top: 5px;
            color: #fff;
            border-radius: 3px;
            font-weight: bold;
            text-transform: capitalize;
            letter-spacing: 1px;
            outline: none;
            cursor: pointer;
            border-radius: 15px;
        }
        form button:active{
            background: #2c48fe;
            transform: scals(0.995);

        }
        form .option{
            color: #5a5a5a;
            margin:10px 0;
            font-weight: bold;
            position: relative;

        }
        form.option:before{
            position: absolute;
            content: '-';
            width: 37%;
            height: 2px;
            background: #b6b6b6;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50px;
        }
        form.option::after{
            position: absolute;
            content: '';
            width: 37%;
            height: 2px;
            background: #b6b6b6;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50px;
        }
        .fblink span{
            font-size: 18px;
            color: #021897;
            margin-right: 5px;
        }

        .fblink a{
            text-decoration: none;
            font-weight: bold;
            color: #021897;


        }
        .forget-id{
            margin: 15px;

        }
        .forget-id a{
            text-decoration: none;
            color: red;
            font-size: .9em;
            font-weight: 500;

        }
        .signup{
            position: relative;
            background:1px solid #b6b6b6;
            border-radius: 2px;
            width: 90%;
            left: 50%;
            transform: translateX(-50%);
            margin: 1em 0 0 0;
        }
        .signup a{
            text-decoration: none;
            margin-left:5px;
            color: #008aff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page">
            <div class="title">instacompass</div>
            <x-jet-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
                <input placeholder="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                <button type="submit">Sign In</button>
            </form>
            <div class="forget-id">
                <a href="">Forget password?</a>
            </div>
            <div class="signup">
                <p>Don't have an account?<a href="{{ route("register") }}">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>