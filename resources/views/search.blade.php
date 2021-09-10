<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Instacompass</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <link rel="stylesheet" href="./css/search.css">
    <script defer src="./js/header.js"></script>
</head>
<body>
    <main>
        <header>
            @include('layouts.header')
        </header>
        <section>
            @foreach ($users_search_result as $user_search_result)
                <div class="profile">
                    <div class="profile_image">
                        <img src="{{ $user_search_result -> user_profile_image }}" alt="">
                    </div>

                    <div class="profile_name">
                        <div class="profile_name_left">
                            <h3>{{ $user_search_result -> name }}</h3>
                        </div>
                        @if ($user_search_result -> id == $auth -> id)    
                            <div>
                                <a href="{{ route("edit") }}" class="profile_name_right">
                                    <p>Edit Profile</p>
                                    <i class="fas fa-atom"></i>
                                </a>
                            </div>
                        @else
                        <div>
                            <a href="{{ route("user.post.profile", $user_search_result -> id) }}" class="profile_name_right">
                                <p>View Profile</p>
                                <i class="fas fa-atom"></i>
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="profile_activity">
                        <div>
                            <p>{{ $user_search_result -> user_post }} posts</p>
                        </div>
                        <div>
                            <p>{{ $user_search_result -> user_follower }} followers</p>
                        </div>
                        <div>
                            <p>{{ $user_search_result -> user_following }} following</p>
                        </div>
                    </div>

                    <div class="profile_bio">
                        <p>{{ $user_search_result -> user_bio }}</p>
                    </div>
                </div>
            @endforeach
        </section>
    </main>
</body>
</html>