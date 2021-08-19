<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Instagram</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        header{
            border-bottom: 1px solid gray;
            background: white;
            position: sticky;
            top: 0;
        }

        .header-wrapper{
            max-width: 1400px;
            margin: 0 auto;
            /* display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            align-items: center;
            text-align: center; */
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        #logo img{
            width: 130px;
        }

        .search-wrapper{
            border: 1px solid gray;
            width: 220px;
            padding: 0 .5em;
        }

        #search input{
            outline: none;
            border: none;
            height: 30px;
        }

        #search input:hover .fa-search{
            display: none;
        }

        #menu{
            display: flex;
        }

        #menu .fa-home,
        #menu .fa-facebook-messenger,
        #menu .fa-compass,
        #menu .fa-heart{
            font-size: 23px;
            margin-left: 10px;
            color: black;
        }

        #menu img{
            width: 23px;
            height: 23px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 10px;
            border: 1px solid gray;
            padding: .1em;
            transform: scale(1.3);
        }

        #menu .fa-home:hover,
        #menu .fa-facebook-messenger:hover,
        #menu .fa-compass:hover,
        #menu .fa-heart:hover{
            transform: scale(1.1);
            color: gray;
        }

        .profile_span{
            position: absolute;
            background: white;
            z-index: 9999;
            box-shadow: 2px 6px 34px 1px rgba(0,130,255,0.19);
            -webkit-box-shadow: 2px 6px 34px 1px rgba(0,130,255,0.19);
            -moz-box-shadow: 2px 6px 34px 1px rgba(0,130,255,0.19);
            border-radius: 5px;
            list-style: none;
            margin: .7em 0 0 0;
            padding: 1em;
            display: none;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .profile_span a{
            color: black;
            text-decoration: none;
        }

        .profile_span li:not(:nth-child(5)){
            padding: 0 0 1em 0;
        }

        .profile_span form button{
            background: none;
            border: none;
            cursor: pointer;
        }

        .menu_profile_image:hover .profile_span{
            display: flex;
        }

        /* Main */
        main{
            background: whitesmoke;
            height: 100vh;
        }
        
        .profile_wrapper{
            max-width: 940px;
            margin: 0 auto;
        }

        .profile{
            display: flex;
            margin: 2em 0;
            padding: 0 0 3em 0;
            border-bottom: 1px solid gray;
        }

        .profile_left img{
            width: 150px;
            height: 150px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            padding: .1em;
            border: 1px solid black;
        }

        .profile_right{
            margin: 0 0 0 5em;
            max-width: 370px;
        }

        .profile_right_top{
            display: flex;
            align-items: center;
            margin: 0 0 1em 0;
        }
        .profile_name p{
            font-size: 1.5em;
            font-family: sans-serif;
        }

        .edit_profile a{
            color: white;
            text-decoration: none;
        }

        .edit_profile{
            display: flex;
            align-items: center;
            background: #073b4c;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            padding: .3em 1em;
            margin: 0 2em;
            border: 1px solid #073b4c;
            transition: .3s;
        }

        .edit_profile div{
            display: flex;
        }

        .edit_profile div p{
            margin: 0 .5em 0 0;
        }

        .edit_profile a{
            margin: 0 .5em 0 0;
        }

        .edit_profile:hover{
            background: white;
            border: 1px solid #073b4c;
            color: #073b4c;
        }

        .edit_profile a:hover{
            color: #073b4c;
        }

        .profile_details{
            display: flex;
            justify-content: space-between;
            margin: 0 0 1.5em 0;
        }

        .profile_details div p{
            font-size: 1.3em;
        }

        .user_bio p:nth-child(1){
            font-weight: bold;
            font-size: 1em;
            margin: 0 0 1em 0;
        }
    </style>
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
                        <img src="./{{ $user -> user_profile_image }}" alt="">
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
                            <div class="post_details">
                                <p>{{ $user -> user_post }} posts</p>
                            </div>
                            <div class="follower_details">
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
        </section>
    </main>
</body>
</html>