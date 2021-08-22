<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

class PostController extends Controller
{
    public function Home()
    {
        $auth = Auth::user();
        $posts = Post::all() -> sortDesc();

        return view("index", ["auth" => $auth, "posts" => $posts]);
    }

    public function Profile()
    {
        $auth = Auth::user();

        $posts = DB::select('SELECT * FROM posts WHERE user_post_id = ? ORDER BY id DESC', [Auth::id()]);

        return view("profile", ['auth' => $auth, "posts" => $posts]);
    }

    public function Edit()
    {
        $auth = Auth::user();

        return view("edit", ['auth' => $auth]);
    }

    public function Post(Request $request)
    {
            /* $this->validate($request, [
                'user_post_image' => 'image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10240',
            ]); */

            if($request->file('user_post_image') != null)
            {
                
                $image_name = $request->file('user_post_image')->getRealPath();
    
                //the upload method handles the uploading of the file and can accept attributes to define what should happen to the image
    
                //Also note you could set a default height for all the images and Cloudinary does a good job of handling and rendering the image.
                Cloudder::upload($image_name, null, array(
                    "folder" => "users_post_images",  "overwrite" => FALSE,
                    "resource_type" => "image", /* "responsive" => TRUE, "transformation" => array( *//* "quality" => "1920", */ /* "width" => "250", "height" => "250", */ /* "crop" => "scale" */
                ));
    
                //Cloudinary returns the publicId of the media uploaded which we'll store in our database for ease of access when displaying it.
    
                $public_id = Cloudder::getPublicId();
    
                /* $width = 250;
                $height = 250; */
    
                //The show method returns the URL of the media file on Cloudinary
                $image_url = Cloudder::show(Cloudder::getPublicId());
    
                //In a situation where the user has already uploaded a file we could use the delete method to remove the media and upload a new one.
                if ($public_id != null) {
                    $image_public_id_exist = User::select('public_id')->where('id', Auth::id())->get();
                    Cloudder::delete($image_public_id_exist);
                }
            }

            
            
            $post = Post::find(Auth::id());
            
            $request -> validate([
                "user_post_caption" => "required | min:2"
            ]);
            
        $post = new Post();

        if($request->file('user_post_image') != null)
        {
            $post->public_id = $public_id;
            $post->user_post_image = $image_url;
        }

        $post -> user_post_id = Auth::id();
        $post -> user_post_name = $request -> user_post_name;
        $post -> user_post_caption = $request -> user_post_caption;
        if($request->file('user_post_image') != null)
        {
            $post -> user_post_image = $image_url;
        }
        $post -> user_post_profile_image = $request -> user_post_profile_image;
        $post -> is_user_post_delete = 1;

        $post -> save();

        return redirect("/");
    }
}