<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class TeacherController extends Controller
{
    function AddTeacher(){

        return view('backend.teachers.add_teacher');
    }

    function PostTeacher(Request $request){
        $request->validate([
            'name' => ['required'],
            'post' => ['required'],
            'bio' => ['required'],
            'email' => ['required'],
            'education' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Teacher::insert([
                'name' => $request->name,
                'post' => $request->post,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'education' => $request->education,
                'bio' => $request->bio,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Teachers Profile Created Successfully.');
    }

    function ViewTeacher(){
        $teachers = Teacher::all();
        return view('backend.teachers.view_teacher', compact('teachers'));
    }

    function EditTeacher($id){
        $teacher = Teacher::where('id', $id)->first();
        return view('backend.teachers.edit_teacher', compact('teacher'));
    }

    function UpdateTeacher(Request $request){
        $id = $request->id;
        if ($request->hasFile('image')) {
            $id = $request->id;
            $image = $request->file('image');
            $old_image = Teacher::findOrFail($request->id)->image;

            if (file_exists(public_path('thumbnails/' . $old_image))) {
                unlink(public_path('thumbnails/' . $old_image));
            }

            $ext1 = Str::lower(Str::random(5)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnails/' . $ext1), 50);

            Teacher::findOrFail($request->id)->update([
                'name' => $request->name,
                'post' => $request->post,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'education' => $request->education,
                'bio' => $request->bio,
                'image' => $ext1,
                'updated_at' => Carbon::now()
            ]);
        } else {
            Teacher::findOrFail($request->id)->update([
                'name' => $request->name,
                'post' => $request->post,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'education' => $request->education,
                'bio' => $request->bio,
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect(route('EditTeacher', $id))->with('success', 'Teachers Info Updated Successfully');
    }

    function DeleteTeacher($id){
        Teacher::findOrFail($id)->delete();
        return back()->with('success', 'Teachers Profile Deleted.');
    }
}
