<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Instacompass</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <script defer src="./js/header.js"></script>

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
                        <img src="{{ $auth -> user_profile_image }}" alt="">
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
                            <div class="post_details" style="margin: 0 1em 0 0">
                                <p>{{ $auth -> user_post }} posts</p>
                            </div>
                            <div class="follower_details" style="margin: 0 1em 0 0">
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

            @foreach ($posts as $post)
                <!-- Content -->
                <div class="content_wrapper">
                    <div class="content">
                        <div class="card-top">
                            <a style="text-decoration: none; color: black;" href="{{-- {{ route("user.post.profile", $post -> user_post_id) }} --}}">
                                <div class="card-top-left">
                                    <img src="{{ $post -> user_post_profile_image }}" alt="">
                                    <div>
                                        <p>{{ $post -> user_post_name }}</p>
                                        <p style="color: gray; font-size: 10px;">{{ $post -> user_post_date}}</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-top-right">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="caption-date">
                            {{-- <div class="date">
                                <p>{{ $post -> user_post_date }}</p>
                            </div> --}}
                            <div class="caption" style="padding: .5em 0 0 0;">
                                <p>{{ $post -> user_post_caption }}</p>
                            </div>
                        </div>
                        <div class="card-mid">
                            <img src="{{ $post -> user_post_image }}" alt="">
                        </div>
                        <div class="card-bottom">
                            <div class="card-bottom-left">
                                <div>
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="fab fa-telegram-plane"></i>
                                </div>
                            </div>
                            <div class="card-bottom-right">
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="like">
                            <p>999 likes</p>
                        </div>
    
                        <div class="comment">
                            <div class="comment-wrapper">
                                <i class="far fa-smile"></i>
                                <input type="text" placeholder="Add a comment...">
                                <p>Post</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            @endforeach
        </section>
    </main>
</body>
</html>