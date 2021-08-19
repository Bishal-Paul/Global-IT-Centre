<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FRONTEND
Route::get('/', [FrontendController::class, 'Index']);
Route::get('/about-us', [FrontendController::class, 'AboutUs']);
Route::get('/contact-us', [FrontendController::class, 'ContactUs']);
Route::post('/post-contact-us', [FrontendController::class, 'PostContactUs']);
Route::get('/blog', [FrontendController::class, 'Blog']);
Route::get('/blog-details/{title}', [FrontendController::class, 'BlogDetails']);
Route::get('/events', [FrontendController::class, 'Events']);
Route::get('/event-details/{title}', [FrontendController::class, 'EventDetails']);
Route::get('/courses', [FrontendController::class, 'Courses']);
Route::get('/course-details/{title}', [FrontendController::class, 'CourseDetails']);
Route::get('/teachers', [FrontendController::class, 'Teachers']);
Route::get('/teacher-profile/{id}', [FrontendController::class, 'TeachersProfile']);
Route::get('/frequently-asked-questions', [FrontendController::class, 'FAQ']);

// BACKEND 

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return view('backend.dashboard');
})->name('admindashboard');


// CONTACT
Route::get('/add-contact', [ContactController::class, 'AddContact']);
Route::post('/post-contact', [ContactController::class, 'PostContact']);
Route::get('/view-contact', [ContactController::class, 'ViewContact']);
Route::get('/contacts', [ContactController::class, 'Contacts']);

// SERVICE
Route::get('/add-service', [ContactController::class, 'AddService']);
Route::post('/post-service', [ContactController::class, 'PostService']);
Route::get('/view-service', [ContactController::class, 'ViewService']);
Route::get('/delete-service/{id}', [ContactController::class, 'DeleteService']);

// Bannar
Route::get('/add-bannar', [ContactController::class, 'AddBannar']);
Route::post('/post-bannar', [ContactController::class, 'PostBannar']);
Route::get('/view-bannar', [ContactController::class, 'ViewBannar']);
Route::get('/delete-bannar/{id}', [ContactController::class, 'DeleteBannar']);

// FAQ
Route::get('/add-faq', [ContactController::class, 'AddFAQ']);
Route::post('/post-faq', [ContactController::class, 'PostFAQ']);
Route::get('/view-faq', [ContactController::class, 'GetFAQ']);
Route::get('/delete-faq/{id}', [ContactController::class, 'DeleteFAQ']);

// COUNTER
Route::get('/add-counter', [ContactController::class, 'AddCounter']);
Route::post('/post-counter', [ContactController::class, 'PostCounter']);
Route::get('/view-counter', [ContactController::class, 'ViewCounter']);
Route::get('/delete-counter/{id}', [ContactController::class, 'DeleteCounter']);

// Testimonial
Route::get('/add-testimonial', [ContactController::class, 'AddTestimonial']);
Route::post('/post-testimonial', [ContactController::class, 'PostTestimonial']);
Route::get('/view-testimonial', [ContactController::class, 'ViewTestimonial']);
Route::get('/delete-testimonial/{id}', [ContactController::class, 'DeleteTestimonial']);

// EVENTS
Route::get('/add-event', [EventController::class, 'AddEvent']);
Route::post('/post-event', [EventController::class, 'PostEvent']);
Route::get('/view-event', [EventController::class, 'ViewEvent']);
Route::get('/delete-event/{id}', [EventController::class, ' ']);

// COURSES
Route::get('/add-course', [CourseController::class, 'AddCourse']);
Route::post('/post-course', [CourseController::class, 'PostCourse']);
Route::get('/view-course', [CourseController::class, 'ViewCourse']);
Route::get('/edit-course/{id}', [CourseController::class, 'EditCourse'])->name('EditCourse');
Route::post('/update-course', [CourseController::class, 'UpdateCourse']);
Route::get('/delete-course/{id}', [CourseController::class, 'DeleteCourse']);

// TEACHERS
Route::get('/add-teacher', [TeacherController::class, 'AddTeacher']);
Route::post('/post-teacher', [TeacherController::class, 'PostTeacher']);
Route::get('/view-teacher', [TeacherController::class, 'ViewTeacher']);
Route::get('/edit-teacher/{id}', [TeacherController::class, 'EditTeacher'])->name('EditTeacher');
Route::post('/update-teacher', [TeacherController::class, 'UpdateTeacher']);
Route::get('/delete-teacher/{id}', [TeacherController::class, 'DeleteTeacher']);

// Blogs
Route::get('/add-blog', [BlogController::class, 'AddBlog']);
Route::post('/post-blog', [BlogController::class, 'PostBlog']);
Route::get('/view-blog', [BlogController::class, 'ViewBlog']);
Route::get('/delete-blog/{id}', [BlogController::class, 'DeleteBlog']);
Route::post('/post-blog-comment', [BlogController::class, 'PostComment']);










