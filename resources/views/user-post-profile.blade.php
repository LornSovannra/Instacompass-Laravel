<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Instacompass</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <script defer src="../js/header.js"></script>
    
    <link rel="stylesheet" href="../css/user_post_profile.css">
</head>
<body>
    <main>
        <header>
            <div class="header-wrapper">
                <div id="logo">
                    <a href="{{ route("home") }}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/1280px-Instagram_logo.svg.png" alt="Instagram">
                    </a>
                </div>
                <div id="search">
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search">
                    </div>
                </div>
                <div id="menu-wrapper">
                    <div id="menu">
                        <a href="{{ route("home") }}"><i class="fas fa-home"></i></a>
                        <a href=""><i class="fab fa-facebook-messenger"></i></a>
                        <a href=""><i class="far fa-compass"></i></a>
                        <a href=""><i class="far fa-heart"></i></a>
                        <ul class="menu_profile">
                            @if ($auth -> user_profile_image == "users_profile_images/default_profile_image.png")
                                <div class="menu_profile_image"><img src="../{{ $auth -> user_profile_image }}" alt="Profile"></div>
                            @else
                                <div class="menu_profile_image"><img src="{{ $auth -> user_profile_image }}" alt="Profile"></div>
                            @endif
                            <ul class="profile_span">
                                <li><a href="{{ route("profile") }}"><i class="far fa-user-circle"></i> Profile</a></li>
                                <li><a href=""><i class="far fa-bookmark"></i> Saved</a></li>
                                <li><a href="{{ route("edit") }}"><i class="fas fa-cog"></i> Setting</a></li>
                                <li><a href=""><i class="fas fa-exchange-alt"></i> Switch Accounts</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
            
                                    <x-jet-dropdown-link name="btn_sign_out" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section>

            <div class="profile_wrapper">
                <div class="profile">
                    <div class="profile_left">
                        @if ($user -> user_profile_image == "users_profile_images/default_profile_image.png")
                            <img src="../{{ $user -> user_profile_image }}" alt="">
                        @else
                            <img src="{{ $user -> user_profile_image }}" alt="">
                        @endif
                    </div>
                    <div class="profile_right">
                        <div class="profile_right_top">
                            <div class="profile_name">
                                <p>{{ $user -> name }}</p>
                            </div>
                            {{-- <a class="edit_profile" href="{{ route("edit") }}">
                                <div>
                                    <p>Edit Profile</p>
                                    <i class="fas fa-atom"></i>
                                </div>
                            </a> --}}
                        </div>
                        <div class="profile_details">
                            <div class="post_details" style="margin: 0 1em 0 0">
                                <p>{{ $user -> user_post }} posts</p>
                            </div>
                            <div class="follower_details" style="margin: 0 1em 0 0">
                                <p>{{ $user -> user_follower }} followers</p>
                            </div>
                            <div class="following_details">
                                <p>{{ $user -> user_following }} following</p>
                            </div>
                        </div>
                        <div>
                            <div class="user_bio">
                                <p>About Me</p>
                                <p>{{ $user -> user_bio }}</p>
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
                                    @if ($post -> user_profile_image == "users_profile_images/default_profile_image.png")
                                    
                                        <img src="../{{ $post -> user_post_profile_image }}" alt="">
                                    @else
                                        <img src="{{ $post -> user_post_profile_image }}" alt="">
                                    @endif
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