<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    function AddBlog(){

        return view('backend.blog.add_blog');
    }

    function PostBlog(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '-' . $file->getClientOriginalExtension();
            $image = Image::make($file)->save(public_path('thumbnails/' . $ext));

            Blog::insert([
                'title' => $request->title,
                'image' => $ext,
                'category' => $request->category,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Blog Published..');
        }
    }

    function ViewBlog(){
        $blog = Blog::all();
        return view('backend.blog.view_blog',compact('blog'));
    }

    function DeleteBlog($id){
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog Deleted.');
    }

    // Comment

    function PostComment(Request $request){
       $request->validate([
            'name' => ['required'],
            'email'   => ['required'],
            'message'=> ['required'],
       ]);
       BlogComment::insert([
           'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'message' => $request->message,
            'created_at' => Carbon::now()
       ]);
        return back()->with('success', 'Comment Published.');
    }
}
