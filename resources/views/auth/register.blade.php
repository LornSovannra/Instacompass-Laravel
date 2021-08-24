<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/register.css">
    <title>Sign Up | Instagram</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: sans-serif;
            font-size: 15px;
        }

        .container-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            background: url("https://images.pexels.com/photos/373883/pexels-photo-373883.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            background-size: cover;
            background-position: center;
            padding: 0 1em;
        }

        .container{
            text-align: center;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px -1px 34px -3px rgba(0,0,0,0.75);
            border-radius: 20px;
            background: white;
        }

        .row{
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 2em;

        }

        h3{
            color: black;
            font-family: sans-serif;
            font-weight: bold;
            margin: 0 0 1em 0;
        }

        .form-control{
            border-radius: 15px;
        }

        #register_btn{
            border-radius: 15px;
        }

        form p{
            margin: 1em 0 0 0 ;
        }

        form a{
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container-wrapper">
        <div class="container ">
            <div class="row">
                <div>
                    <h3>Sign Up Now</h3>
                </div>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <input placeholder="Username" class="form-control" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">    
                    </div>
                    <div class="mb-3">
                        <input placeholder="Email" class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required>
                    </div>
                    <div class="mb-3">
                        <input placeholder="Password" class="form-control" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" >
                    </div>
                    <div class="mb-3">
                        <input placeholder="Comfirm Password" class="form-control" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" >
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_bio" class="block mt-1 w-full" type="hidden" name="user_bio" required autocomplete="user_bio" :value="old('user_bio')" value="I'm too lazy to describe about it." />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_phone_number" class="block mt-1 w-full" type="hidden" name="user_phone_number" required autocomplete="user_phone_number" :value="old('user_phone_number')" value="000 000 000" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_gender" class="block mt-1 w-full" type="hidden" name="user_gender" required autocomplete="user_gender" :value="old('user_gender')" value="Unknown" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_profile_image" class="block mt-1 w-full" type="hidden" name="user_profile_image" required autocomplete="user_profile_image" :value="old('user_profile_image')" value="users_profile_images/default_profile_image.png" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_post" class="block mt-1 w-full" type="hidden" name="user_post" required autocomplete="user_post" :value="old('user_post')" value="0" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_follower" class="block mt-1 w-full" type="hidden" name="user_follower" required autocomplete="user_follower" :value="old('user_follower')" value="0" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="user_following" class="block mt-1 w-full" type="hidden" name="user_following" required autocomplete="user_following" :value="old('user_following')" value="0" />
                    </div>
                    <div class="mt-4">
                        <x-jet-input id="is_user_active" class="block mt-1 w-full" type="hidden" name="is_user_active" required autocomplete="is_user_active" :value="old('is_user_active')" value="1" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <button type="submit" id="register_btn" class="btn btn-primary btn-block">Sign Up</button>
                    <p>Already have an account? <a href="{{ route("login") }}">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>