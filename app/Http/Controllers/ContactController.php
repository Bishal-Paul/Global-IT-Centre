<?php

namespace App\Http\Controllers;

use App\Models\Bannar;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Counter;
use App\Models\FAQ;
use App\Models\Service;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ContactController extends Controller
{
    function AddContact(){

        return view('backend.contact.add_contact');
    }

    function PostContact(Request $request){
        $request->validate([
            'logo' => ['required', 'image']
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Contact::insert([
                'logo' => $ext,
                'location' => $request->location,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now()
            ]);
        }
        
        return back()->with('success', 'Contacts Inserted Successfully.');
    }

    function ViewContact(){
        $contacts = Contact::all();
        return view('backend.contact.view_contact', compact('contacts'));
    }

    function Contacts()
    {
        $contacts = ContactUs::all();
        return view('backend.contact.contacts', compact('contacts'));
    }



    // SERVICES
    function AddService(){

        return view('backend.service.add_service');
    }

    function PostService(Request $request){
        $request->validate([
            'title' => ['required'],
            'summary' => ['required'],
            'icon' => ['required'],
        ]);
        Service::insert([
            'title' => $request->title,
            'summary' => $request->summary,
            'icon' => $request->icon,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Service Inserted Successfully.');
    }

    function ViewService(){
        $service = Service::all();
        return view('backend.service.view_service', compact('service'));
    }

    function DeleteService($id){
        Service::findOrFail($id)->delete();
        return back()->with('success', 'Service Deleted.');
    }


    // BANNAR PART

    function AddBannar(){

        return view('backend.bannar.add_bannar');
    }

    function PostBannar(Request $request){
        $request->validate([
            'title' => ['required'],
            'text' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Bannar::insert([
                'title' => $request->title,
                'text' => $request->text,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Bannar Inserted.');
    }

    function ViewBannar(){
        $bannar = Bannar::all();
        return view('backend.bannar.view_bannar', compact('bannar'));
    }

    function DeleteBannar($id){
        Bannar::findOrFail($id)->delete();
        return back()->with('success', 'Bannar Deleted.');
    }

    // FAQ PART

    function AddFAQ(){

        return view("backend.FAQ.add_faq");
    }

    function PostFAQ(Request $request){

        FAQ::insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'FAQ Inserted Successfully.');
    }

    function GetFAQ()
    {
        $faq = FAQ::all();
        return view('backend.FAQ.view_faq', compact('faq'));
    }

    function DeleteFAQ($id){
        FAQ::findOrFail($id)->delete();
        return back()->with('success', 'FAQ Deleted.');
    }

    // COUNTER

    function AddCounter(){

        return view('backend.counter.add_counter');
    }

    function PostCounter(Request $request){
        Counter::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'counts' => $request->counts,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Counter Inserted.');
    }

    function ViewCounter(){
        $counter = Counter::all();
        return view('backend.counter.view_counter', compact('counter'));
    }

    function DeleteCounter($id){
        Counter::findOrFail($id)->delete();
        return back()->with('success', 'Counter Deleted.');
    }

    // Testimonial PART

    function AddTestimonial(){

        return view('backend.testimonial.add_testimonial');
    }

    function PostTestimonial(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('thumbnails/' . $ext), 50);

            Testimonial::insert([
                'name' => $request->name,
                'post' => $request->post,
                'message' => $request->message,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Testimonial Inserted.');
    }

    function ViewTestimonial(){
        $testimonial = Testimonial::all();
        return view('backend.testimonial.view_testimonial', compact('testimonial'));
    }

    function DeleteTestimonial($id){
        Testimonial::findOrFail($id)->delete();
        return back()->with('success', 'Testimonial Deleted.');
    }
}
