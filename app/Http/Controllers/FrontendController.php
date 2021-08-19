<?php

namespace App\Http\Controllers;

use App\Models\Bannar;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Counter;
use App\Models\Course;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\Service;
use App\Models\Teacher;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    function Index(Request $request){

        if($request->search){
            return $request->search;
        }

        $service = Service::take(6)->get();
        $course = Course::orderBy('id','desc')->get();
        $faq = FAQ::orderBy('id','desc')->take(3)->get();
        $latest_course = Course::latest()->take(3)->get();
        $contact = Contact::latest()->take(1)->first();
        $bannar = Bannar::orderBy('id', 'desc')->get();
        $counter = Counter::orderBy('id', 'desc')->take(4)->get();
        $testimonial = Testimonial::take(3)->get();
        $event = Event::take(6)->get();
        $blog = Blog::take(6)->get();
        return view('frontend.index', compact('service', 'bannar', 'contact', 'course', 'latest_course', 'faq', 'counter', 'testimonial', 'event', 'blog'));
    }

    function Courses(){
        $course = Course::orderBy('id', 'desc')->Paginate(12);
        $contact = Contact::latest()->take(1)->first();
        $event = Event::take(6)->get();
        return view('frontend.courses', compact('course', 'contact', 'event'));
    }

    function CourseDetails($title){
        $course = Course::where('title', $title)->first();
        $event = Event::all();
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('title','desc')->get();
        $contact = Contact::latest()->take(1)->first();
        $faq = FAQ::latest()->take(3)->get();
        return view('frontend.course_details', compact('course', 'contact', 'courses', 'faq', 'teachers', 'event'));
    }

    function Teachers(){
        $event = Event::all();
        $teachers = Teacher::orderBy('id','desc')->get();
        return view('frontend.teachers', compact('teachers', 'event'));
    }

    function TeachersProfile($id){
        $teacher = Teacher::where('id', $id)->first();
        $teachers = Teacher::orderBy('id', 'desc')->get();
        return view('frontend.teacher_profile', compact('teacher', 'teachers'));
    }

    function FAQ(){
        $faq = FAQ::all();
        return view('frontend.faq', compact('faq'));
    }

    function AboutUs(){
        $service = Service::take(6)->get();
        $event = Event::take(6)->get();
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $counter = Counter::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.about_us', compact('service', 'counter', 'teachers', 'event'));
    }

    function Events(){
        $event = Event::take(12)->get();
        return view('frontend.events', compact('event'));
    }

    function EventDetails($title){
        $event = Event::where('title', $title)->first();
        $all_event = Event::latest()->get();
        $course = Course::orderBy('id', 'desc')->get();
        return view('frontend.event_details', compact('event', 'all_event', 'course'));
    }

    function Blog(){
        $blog = Blog::orderBy('id', 'desc')->get();
        return view('frontend.blogs', compact('blog'));
    }

    function BlogDetails($title){
        $blog = Blog::where('title', $title)->first();
        $all_blogs = Blog::all();
        $events = Event::all();
        $course = Course::all();
        $comment = BlogComment::where('id', $blog->id)->get();
        return view('frontend.blog_details', compact('blog', 'comment', 'all_blogs', 'events', 'course'));
    }

    function ContactUs(){
        $contact = Contact::latest()->take(1)->get();
        return view('frontend.contact_us', compact('contact'));
    }

    function PostContactUs(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'message' => ['required'],
        ]);
        ContactUs::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Thank You. We will contact with you.');
    }
}
