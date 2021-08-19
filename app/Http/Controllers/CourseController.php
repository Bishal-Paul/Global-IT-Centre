<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CourseController extends Controller
{
    function AddCourse(){
        return view('backend.course.add_course');
    }
    
    function PostCourse(Request $request){
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Course::insert([
                'title' => $request->title,
                'summary' => $request->summary,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Course Inserted Successfully.');
    }

    function ViewCourse(){
        $course = Course::all();
        return view('backend.course.view_course', compact('course'));
    }

    function EditCourse($id){
        $course = Course::where('id', $id)->first();
        return view('backend.course.edit_course', compact('course'));
    }

    function UpdateCourse(Request $request){
        $id = $request->id;
        if ($request->hasFile('image')) {
            $id = $request->id;
            $image = $request->file('image');
            $old_image = Course::findOrFail($request->id)->image;

            if (file_exists(public_path('thumbnails/' . $old_image))) {
                unlink(public_path('thumbnails/' . $old_image));
            }

            $ext1 = Str::lower(Str::random(5)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnails/' . $ext1), 50);

            Course::findOrFail($request->id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $ext1,
                'updated_at' => Carbon::now()
            ]);
        } else {
            Course::findOrFail($request->id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'description' => $request->description,
                'price' => $request->price,
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect(route('EditCourse', $id))->with('success', 'Course Updated Successfully');
    }

    function DeleteCourse($id){
        
        Course::findOrFail($id)->delete();
        return back()->with('success', 'Course Deleted.');
       
    }
}
