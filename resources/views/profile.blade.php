<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Instacompass/title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>

    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/header.css" type="text/css">
</head>
<body>
    <main>
        <header>
            @include('layouts.header')
        </header>
        <section>

            <div class="profile_wrapper">
                <div class="profile">
                    <div class="profile_left">
                        <img src="./{{ $auth -> user_profile_image }}" alt="">
                    </div>
                    <div class="profile_right">
                        <div class="profile_right_top">
                            <div class="profile_name">
                                <p>{{ $auth -> name }}</p>
                            </div>
                            <a class="edit_profile" href="{{ route("edit") }}">
                                <p>Edit Profile</p>
                                <i class="fas fa-atom"></i>
                            </a>
                        </div>
                        <div class="profile_details">
                            <div class="post_details">
                                <p>{{ $auth -> user_post }} posts</p>
                            </div>
                            <div class="follower_details">
                                <p>{{ $auth -> user_follower }} followers</p>
                            </div>
                            <div class="following_details">
                                <p>{{ $auth -> user_following }} following</p>
                            </div>
                        </div>
                        <div>
                            <div class="user_bio">
                                <p>About Me</p>
                                <p>{{ $auth -> user_bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>