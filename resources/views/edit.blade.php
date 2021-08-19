<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Instagram</title>
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/323-3231916_mary-kay-official-site-instagram-iphone-app-png.png">
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <link rel="stylesheet" href="./css/edit.css">
    <link rel="stylesheet" href="./css/header.css" type="text/css">
</head>
<body>
    <main>
        <header>
            @include('layouts.header')
        </header>
        <section>

            <div class="edit_wrapper">
                <div class="edit">
                    <div class="edit_left">
                        <div>Edit Profile</div>
                        <div>Professtional Account</div>
                        <div>Change Password</div>
                        <div>Apps and Websites</div>
                        <div>Email and SMS</div>
                        <div>Push Notifications</div>
                        <div>Manage Contacts</div>
                        <div>Privacy and Security</div>
                        <div>Login Activity</div>
                        <div>Emails from Instagram</div>
                    </div>
                    <form method="POST" action="{{ route("update.profile") }}" enctype="multipart/form-data" class="edit_right">
                        @csrf

                        @if ($errors -> all())
                            <ul style="display: flex; list-style: none; color: red; justify-content: center; margin: 1em 0 0 0;">
                                @foreach ($errors -> all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="edit_right_wrapper">
                            <div class="edit_profile">
                                <img src="./{{ $auth -> user_profile_image }}" alt="">
                                <div class="change_profile">
                                    <h2>{{ $auth -> name }}</h2>
                                    <p class="btn_change_profile">Change Profile</p>
                                </div>
                            </div>
                            <div class="username">
                                <Label>Username</Label>
                                <input name="user_name" type="text" value="{{ $auth -> name }}">
                            </div>
                            <div class="bio">
                                <label>Bio</label>
                                <textarea name="user_bio">{{ $auth -> user_bio }}</textarea>
                            </div>
                            <div class="email">
                                <label>Email</label>
                                <input disabled type="text" value="{{ $auth -> email }}">
                            </div>
                            <div class="phone_number">
                                <label>Phone Number</label>
                                <input name="user_phone_number" type="text" value="{{ $auth -> user_phone_number }}">
                            </div>
                            <div class="gender">
                                <label>Gender</label>
                                <input name="user_gender" type="text" value="{{ $auth -> user_gender }}">
                            </div>

                            <div class="save_change">
                                <button type="submit" name="btn_save_change">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="modal_change_profile_wrapper">
            <div class="modal_change_profile">
                <form method="POST" action="{{ route("update.profile.image") }}" class="profile_image" enctype="multipart/form-data">
                    <div>
                        <p>Change Profile Photo</p>
                    </div>
                    <div class="upload_photo">
                        <input class="input_upload_photo" hidden name="user_profile_image" type="file">
                        <p>Upload Photo</p>
                        <button type="submit" class="btn_upload_photo" hidden name="btn_upload_photo">Upload</button>
                    </div>
                    <div class="remove_current_photo">
                        <button type="submit" class="btn_remove_photo" name="btn_remove_photo">Remove Current Photo</button>
                    </div>
                    <div class="cancel">
                        <p>Cancel</p>
                    </div>
                    @csrf
                    @method("PUT")
                </form>
            </div>
        </div>
    </main>

    <script>
    
        const btn_change_profile = document.querySelector(".btn_change_profile");
        const cancel = document.querySelector(".cancel");
        const modal_change_profile_wrapper = document.querySelector(".modal_change_profile_wrapper");

        btn_change_profile.addEventListener("click", () => {
            modal_change_profile_wrapper.style.display = "flex";
        })

        cancel.addEventListener("click", () => {
            modal_change_profile_wrapper.style.display = "none";
        })

        const upload_photo = document.querySelector(".upload_photo");
        const input_upload_photo = document.querySelector(".input_upload_photo");
        const btn_upload_photo = document.querySelector(".btn_upload_photo");

        upload_photo.addEventListener("click", () => {
            input_upload_photo.click();
        })

        input_upload_photo.addEventListener("change", () => {
            btn_upload_photo.click();
        })

    </script>
</body>
</html>