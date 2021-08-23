<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

class UserController extends Controller
{
    public function UpdateProfile(Request $request)
    {
        $request -> validate([
            "user_name" => "required | min: 2",
            "user_bio" => "required | min:2",
            "user_phone_number" => "required | min: 9",
            "user_gender" => "required | min:4"
        ]);

        $user_id = Auth::id();
        $user =  User::findOrFail($user_id);

        $user -> name = $request -> user_name;
        $user -> user_bio = $request -> user_bio;
        $user -> user_phone_number = $request -> user_phone_number;
        $user -> user_gender = $request -> user_gender;

        DB::table('posts')  -> where("user_post_id", $user_id)
                            -> update([
                                "user_post_name" => $request -> user_name,
                            ]);

        $user -> save();

        return redirect("edit");
    }

    public function UpdateProfileImage(Request $request)
    {
        $auth_id = Auth::id();
        $auth = Auth::id();

        $user =  User::findOrFail($auth_id);

        /* $user_post = DB::select('SELECT user_post_profile_image FROM posts WHERE user_post_id = ?', [$auth_id]); */

        /* $user -> user_profile_image = $request -> user_profile_image -> store("users_profile_images"); */

           /*  $this->validate($request, [
                'user_profile_image' => 'image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10240|required',
            ]); */

            $image_name = $request->file('user_profile_image')->getRealPath();
            //the upload method handles the uploading of the file and can accept attributes to define what should happen to the image

            //Also note you could set a default height for all the images and Cloudinary does a good job of handling and rendering the image.
            Cloudder::upload($image_name, null, array(
                "folder" => "users_profile_images",  "overwrite" => FALSE,
                "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "90"/* , "width" => "250", "height" => "250", "crop" => "scale" */)
            ));

            //Cloudinary returns the publicId of the media uploaded which we'll store in our database for ease of access when displaying it.

            $public_id = Cloudder::getPublicId();

            /* $width = 768;
            $height = 1024; */

            //The show method returns the URL of the media file on Cloudinary
            $image_url = Cloudder::show(Cloudder::getPublicId(), [/* "width" => $width, "height" => $height,  */"quality" => 90, "secure" => "true"]);

            //In a situation where the user has already uploaded a file we could use the delete method to remove the media and upload a new one.
            /* if ($public_id != null) {
                $image_public_id_exist = User::select('public_id')->where('id', Auth::id())->get();
                Cloudder::delete($image_public_id_exist);
            } */

            $user -> user_profile_image = $image_url;

            DB::table('posts')  -> where("user_post_id", $auth_id)
                            -> update([
                                "user_post_profile_image" => $image_url/* $request -> user_profile_image -> store("users_profile_images") */
                            ]);

            $user = User::find(Auth::id());
            $user->public_id = $public_id;
            $user->user_profile_image = $image_url;
            $user->update();
            $user -> save();
        
        return redirect("edit"/* , ["auth" => $auth] */);
    }

    public function RemoveProfileImage(Request $request)
    {
        $auth_id = Auth::id();
        $user = User::findOrFail(Auth::id());

        $user -> user_profile_image = "users_profile_images/default_profile_image.png";

        DB::table('posts')  -> where("user_post_id", $auth_id)
                            -> update([
                                "user_post_profile_image" => 'users_profile_images/default_profile_image.png'/* $request -> user_profile_image -> store("users_profile_images") */
                            ]);

        $user -> save();

        return redirect("edit");
    }

    public function UserPostProfile($id)
    {
        $user = User::findOrFail($id);
        $auth = Auth::user();

        if($id == Auth::id())
        {
            $posts = DB::select('SELECT * FROM posts WHERE user_post_id = ? ORDER BY id DESC', [$id]);

            return redirect("profile");
        }else{
            $posts = DB::select('SELECT * FROM posts WHERE user_post_id = ? ORDER BY id DESC', [$id]);
    
            return view("user-post-profile", ['user' => $user, "auth" => $auth, "posts" => $posts]);
        }

    }

    /* public function findAction(\Illuminate\Http\Request $request) {
        if ($request->has('update.profile.image')) {
            return $this->dispatch(new \App\Jobs\UpdateProfileImage($request));
        } else if ($request->has('remove.profile.image')) {
            return $this->dispatch(new \App\Jobs\RemoveProfileImage($request));
        }
        return 'no action found';
    } */
}