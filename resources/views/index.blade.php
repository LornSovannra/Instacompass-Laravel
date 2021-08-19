<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/header.css" type="text/css">
</head>
<body>
    <main>
        <header>
            @include('layouts.header')
        </header>
        <section>
            <div id="section-wrapper">
                <div class="content-wrapper">

                    <!-- Post Area -->
                    <div class="post-area-wrapper">
                        <div class="post-area">
                            <div class="post-area-top">
                                <img src="{{ $auth -> user_profile_image }}" alt="">
                                <p>What's on your mind, {{ $auth -> name }}?</p>
                            </div>
                            <div class="post-area-bottom">
                                <div class="post-area-bottom-left">
                                    <i class="fas fa-video"></i>
                                    <p>Live Video</p>
                                </div>
                                <div class="post-area-bottom-mid">
                                    <i class="fas fa-images"></i>
                                    <p>Photo/Video</p>
                                </div>
                                <div class="post-area-bottom-right">
                                    <i class="far fa-smile"></i>
                                    <p>Feeling/Activity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Post Area -->

                    @foreach ($posts as $post)
                        <!-- Content -->
                        <div class="content">
                            <div class="card-top">
                                <a style="text-decoration: none; color: black;" href="{{-- {{ route("user.post.profile", $post -> user_post_name) }} --}}">
                                    <div class="card-top-left">
                                        <img src="./{{ $post -> user_post_profile_image }}" alt="">
                                        <p>{{ $post -> user_post_name }}</p>
                                    </div>
                                </a>
                                <div class="card-top-right">
                                    <i class="fas fa-ellipsis-h"></i>
                                </div>
                            </div>
                            <div class="caption-date">
                                <div class="date">
                                    <p>{{ $post -> user_post_date }} {{-- MINUTES AGO --}}</p>
                                </div>
                                <div class="caption">
                                    <p>{{ $post -> user_post_caption }}</p>
                                </div>
                            </div>
                            <div class="card-mid">
                                <img src="./{{ $post -> user_post_image }}" alt="">
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
                        <!-- End Content -->
                    @endforeach
                </div>

                <aside>
                    <div class="profile">

                        <div class="profile_image">
                            <img src="./{{ $auth -> user_profile_image }}" alt="">
                        </div>
    
                        <div class="profile_name">
                            <div class="profile_name_left">
                                <h3>{{ $auth -> name }}</h3>
                            </div>
                            <div>
                                <a href="{{ route("edit") }}" class="profile_name_right">
                                    <p>Edit Profile</p>
                                    <i class="fas fa-atom"></i>
                                </a>
                            </div>
                        </div>
    
                        <div class="profile_activity">
                            <div>
                                <p>{{ $auth -> user_post }} posts</p>
                            </div>
                            <div>
                                <p>{{ $auth -> user_follower }} followers</p>
                            </div>
                            <div>
                                <p>{{ $auth -> user_following }} following</p>
                            </div>
                        </div>
    
                        <div class="profile_bio">
                            <p>{{ $auth -> user_bio }}</p>
                        </div>

                    </div>
                </aside>
            </div>
        </section>

        <!-- Post Pop Up -->
        <div class="post-pop-up-wrapper">
            <div class="post-pop-up">
                
                <div class="post-pop-up-top">
                    <h3>Create Post</h3>
                    <div class="close-post-pop-up"><i class="far fa-times-circle"></i></div>
                </div>
                
                @if ($errors->any())
                    <ul style="list-style: none; color: red; margin: 0 0 1em 0;">
                        @foreach ($errors -> all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route("post") }}" enctype="multipart/form-data" class="post-pop-up-bottom">
                    @csrf
                    <div>
                        <textarea name="user_post_caption" placeholder="What's on your mind, {{ $auth -> name }}?"></textarea>
                    </div>
                    <input name="user_post_name" type="text" hidden value="{{ $auth -> name }}">
                    <input name="user_post_image" class="input_post_upload_photo" type="file" hidden>
                    <input name="user_post_profile_image" type="text" hidden value="{{ $auth -> user_profile_image }}">
                    <div class="post_upload_photo">
                        <i class="fas fa-photo-video"></i>
                        <i class="far fa-smile-beam"></i>
                        <i class="fas fa-map-marker-alt"></i>
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <button type="submit" name="btn_users_posts">Post</button>
                </form>
            </div>
        </div>
        <!-- End Post Pop Up -->

        <!-- Post Details -->
        <div class="post-details-wrapper">
            <div class="post-details">
                <div><p>Report</p></div>
                <div><p>Unfollow</p></div>
                <div><p>Go to post</p></div>
                <div><p>Share to...</p></div>
                <div><p>Copy Link</p></div>
                <div><p>Emblem</p></div>
                <div class="post-details-cancel"><p>Cancel</p></div>
            </div>
        </div>
        <!-- End Post Detaails -->
    </main>

    <script>
        /* Post Pop Up */
        const what_is_on_your_mind = document.querySelector(".post-area-top p");
        const live_video = document.querySelector(".post-area-bottom-left");
        const photo_video = document.querySelector(".post-area-bottom-mid");
        const feeling_activity = document.querySelector(".post-area-bottom-right");
        const post_pop_up_wrapper = document.querySelector(".post-pop-up-wrapper");
        const close_post_pop_up_wrapper = document.querySelector(".close-post-pop-up");

        what_is_on_your_mind.addEventListener("click", () => {
            post_pop_up_wrapper.style.display = "flex";
        })

        live_video.addEventListener("click", () => {
            post_pop_up_wrapper.style.display = "flex";
        })

        photo_video.addEventListener("click", () => {
            post_pop_up_wrapper.style.display = "flex";
        })

        feeling_activity.addEventListener("click", () => {
            post_pop_up_wrapper.style.display = "flex";
        })

        close_post_pop_up_wrapper.addEventListener("click", () => {
            post_pop_up_wrapper.style.display = "none";
        })
        /* End Post Pop Up */

        /* Post Details */
        let post_detail = document.querySelector(".card-top-right");
        let post_details_wrapper = document.querySelector(".post-details-wrapper");
        const post_details_cancel = document.querySelector(".post-details-cancel");

        post_detail.addEventListener("click", () => {
            post_details_wrapper.style.display = "flex";
        })

        post_details_cancel.addEventListener("click", () => {
            post_details_wrapper.style.display = "none";
        })
        /* End Post Details */

        const post_upload_photo = document.querySelector(".post_upload_photo");
        const input_post_upload_photo = document.querySelector(".input_post_upload_photo");

        post_upload_photo.addEventListener("click", () => {
            input_post_upload_photo.click();
        })
    </script>
</body>
</html>