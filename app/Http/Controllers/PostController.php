<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view("profile", ['auth' => $auth]);
    }

    public function Edit()
    {
        $auth = Auth::user();

        return view("edit", ['auth' => $auth]);
    }

    public function Post(Request $request)
    {
        $request -> validate([
            "user_post_caption" => "required | min:2",
            "user_post_image" => "required"
        ]);

        $post = new Post();

        $post -> user_post_name = $request -> user_post_name;
        $post -> user_post_caption = $request -> user_post_caption;
        $post -> user_post_image = $request -> user_post_image -> store("users_post_images");
        $post -> user_post_profile_image = $request -> user_post_profile_image;
        $post -> is_user_post_delete = 1;

        $post -> save();

        return redirect("/");
    }
}