<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{

	public function getIndex() {
		$posts = Post::paginate(3);

		return view('blogs.index')->withPosts($posts);
	}
    //
    public function getSingle($slug){


    	$post=Post::where('slug','=',$slug)->first();
        // print_r($post['image']);exit();
    	return view('blogs.single')->withPost($post);
    	// return $slug;
    }
}
