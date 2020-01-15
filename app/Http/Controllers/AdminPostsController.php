<?php

namespace App\Http\Controllers;

use App\Adminpost;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AdminPostsController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $posts = Post::paginate(5);

        return view('admin-pagaes.posts', ['posts' => $posts]);
    }

    public function admin_posts()
    {
        $posts = Adminpost::paginate(5);

        return view('admin-pagaes.adminposts', ['posts' => $posts]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin-post.posts', compact('categories'));
    }

    public function store(Request $request)
    {
        //return 123;

        // $attributes = Validator::make($request->all(), [
        //     'title' => 'required|min:2',
        //     'decriptions' => 'required|min:10',
        //     'post_image' => 'image|nullable',
        //     'category_id' => 'required',
        // ]);

        $attributes =  request()->validate([

            'title' => 'required|min:2',
            'decriptions' => 'required|min:10',
            'post_image' => 'image|nullable',
            'category_id' => 'required',
        ]);

        // if ($attributes->fails()) {
        //     return back()->with('error', $attributes->messages()->all()[0])->withInput();
        // }


        if ($request->hasfile('post_image')) {
            //get file name with extension
            $filenamewithExt = $request->file('post_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            //file name to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('post_image')->storeAs('public/cover_images', $filenametostore);
        } else {
            $filenametostore = 'default.jpg';
        }

        $attributes['post_image'] = $filenametostore;
        $attributes['admin_id'] = auth()->user()->id;

        $post_store = Adminpost::create($attributes);



        //return back()->withSuccess('Post Created Successfully!');

        if (!is_null($post_store)) {
            return response()->json(['status' => 'success', 'msg' => 'Post Created']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Something went wrong']);
        }
    }
}
