<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
    function AddEvent(){

        return view('backend.events.add_event');
    }

    function PostEvent(Request $request){
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Event::insert([
                'title' => $request->title,
                'description' => $request->description,
                'output' => $request->output,
                'location' => $request->location,
                'organizer' => $request->organizer,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Event Created Successfully.');
    }

    function ViewEvent(){
        $event = Event::all();
        return view('backend.events.view_event', compact('event'));
    }

    function DeleteEvent($id){
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Testimonial Deleted.');
    }
}
