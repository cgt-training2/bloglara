<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Http\Requests;

use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    } 

    public function index() {
        //
        $posts = Post::orderBy('id', 'asc')->paginate(3);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function store(Request $request) {
       
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'         => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'          => 'required'
        ));
        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
        $post->body = $request->body;
        // if ($request->hasFile('featured_img')) {
        //   $image = $request->file('featured_img');
        //   $filename = time() . '.' . $image->getClientOriginalExtension();
        //   $location = public_path('images/' . $filename);
        //   Image::make($image)->resize(800, 400)->save($location);
        //   $post->image = $filename;
        // }
        $post->save();
        // $post->tags()->sync($request->tags, false);
        Session::flash('success', 'The blog post was successfully save!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function show($id) {

        // print_r(Session::has('success'));exit();
       
        $post=Post::find($id);

        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function edit($id) {
        
        // find the post in the database and save as a var
        $post = Post::find($id);
        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        
        $post=Post::find($id);
        // Validate the data
        if($request->input('slug')==$post->slug){
            $this->validate($request, array(
                    'title' => 'required|max:255',
                    'body'  => 'required'
                ));
        } else{

            $this->validate($request, array(
                    'title' => 'required|max:255',
                    'slug'         => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'body'  => 'required'
                ));
        }   
        // Save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();

        // set flash data with success message
        Session::flash('success', 'This post was successfully Updated.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    
    public function destroy($id) {
        //

        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
