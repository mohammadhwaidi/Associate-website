<?php

use App\Http\Controllers\ProfileController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\MemberPanel\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventEnrollmentController;
use App\Http\Controllers\InternshipEnrollmentController;
use App\Http\Controllers\InternshipController;
use App\Models\Testimonial;
use App\Http\Controllers\FrontController;


Route::middleware(['auth', 'role:member'])->prefix('member')->group(function () {


    // Internshipsmm
    Route::get('dashboard/internships', [InternshipController::class, 'mindex'])->name('member.internships.index');
    Route::get('dashboard/internships/create', [InternshipController::class, 'mcreate'])->name('member.internships.create');
    Route::post('dashboard/internships', [InternshipController::class, 'mstore'])->name('member.internships.store');
    Route::get('dashboard/internships/{id}', [InternshipController::class, 'mshow'])->name('member.internships.show');
    Route::get('dashboard/internships/{id}/edit', [InternshipController::class, 'medit'])->name('member.internships.edit');
    Route::put('dashboard/internships/{id}', [InternshipController::class, 'mupdate'])->name('member.internships.update');
    Route::delete('dashboard/internships/{id}', [InternshipController::class, 'mdestroy'])->name('member.internships.destroy');
    Route::get('dashboard/internships/{id}/enrollments', [InternshipController::class, 'mshowEnrollments'])->name('member.internships.show_enrollments');

    Route::get('dashboard/posts', [PostController::class, 'mindex'])->name('member.posts.index');
    Route::get('dashboard/posts/create', [PostController::class, 'mcreate'])->name('member.posts.create');
    Route::post('dashboard/posts', [PostController::class, 'mstore'])->name('member.posts.store');
    Route::get('dashboard/posts/{id}', [PostController::class, 'mshow'])->name('member.posts.show');
    Route::get('dashboard/posts/{id}/edit', [PostController::class, 'medit'])->name('member.posts.edit');
    Route::put('dashboard/posts/{id}', [PostController::class, 'mupdate'])->name('member.posts.update');

    Route::delete('dashboard/posts/{id}', [PostController::class, 'mDestroy'])->name('member.posts.destroy');


    Route::get('dashboard/events', [EventController::class, 'mindex'])->name('member.events.index');
    Route::get('dashboard/events/create', [EventController::class, 'mcreate'])->name('member.events.create');
    Route::post('dashboard/events', [EventController::class, 'mstore'])->name('member.events.store');
    Route::get('dashboard/events/{id}', [EventController::class, 'mshow'])->name('member.events.show');
    Route::get('dashboard/events/{id}/edit', [EventController::class, 'medit'])->name('member.events.edit');
    Route::put('dashboard/events/{id}', [EventController::class, 'mupdate'])->name('member.events.update');
    Route::delete('dashboard/events/{id}', [EventController::class, 'mdestroy'])->name('member.events.destroy');
    Route::get('dashboard/events/{id}/enrollments', [EventController::class, 'mshowEnrollments'])->name('member.events.show_enrollments');


    Route::get('dashboard/slideshows', [SlideShowController::class, 'mindex'])->name('member.slideshows.index');
    Route::get('dashboard/slideshows/create', [SlideShowController::class, 'mcreate'])->name('member.slideshows.create');
    Route::post('dashboard/slideshows', [SlideShowController::class, 'mstore'])->name('member.slideshows.store');
    Route::get('dashboard/slideshows/{id}', [SlideShowController::class, 'mshow'])->name('member.slideshows.show');
    Route::get('dashboard/slideshows/{id}/edit', [SlideShowController::class, 'medit'])->name('member.slideshows.edit');
    Route::put('dashboard/slideshows/{id}', [SlideShowController::class, 'mupdate'])->name('member.slideshows.update');
    Route::delete('dashboard/slideshows/{id}', [SlideShowController::class, 'mdestroy'])->name('member.slideshows.destroy');

    Route::get('dashboard/activities', [ActivityController::class, 'mindex'])->name('member.activities.index');
    Route::get('dashboard/activities/create', [ActivityController::class, 'mcreate'])->name('member.activities.create');
    Route::post('dashboard/activities', [ActivityController::class, 'mstore'])->name('member.activities.store');
    Route::get('dashboard/activities/{id}', [ActivityController::class, 'mshow'])->name('member.activities.show');
    Route::get('dashboard/activities/{id}/edit', [ActivityController::class, 'medit'])->name('member.activities.edit');
    Route::put('dashboard/activities/{id}', [ActivityController::class, 'mupdate'])->name('member.activities.update');
    Route::delete('dashboard/activities/{id}', [ActivityController::class, 'mdestroy'])->name('member.activities.destroy');


    Route::get('dashboard/testimonials', [TestimonialController::class, 'mindex'])->name('member.testimonials.index');
    Route::get('dashboard/testimonials/create', [TestimonialController::class, 'mcreate'])->name('member.testimonials.create');
    Route::post('dashboard/testimonials', [TestimonialController::class, 'mstore'])->name('member.testimonials.store');
    Route::get('dashboard/testimonials/{id}', [TestimonialController::class, 'mshow'])->name('member.testimonials.show');
    Route::get('dashboard/testimonials/{id}/edit', [TestimonialController::class, 'medit'])->name('member.testimonials.edit');
    Route::put('dashboard/testimonials/{id}', [TestimonialController::class, 'mupdate'])->name('member.testimonials.update');
    Route::delete('dashboard/testimonials/{id}', [TestimonialController::class, 'mdestroy'])->name('member.testimonials.destroy');


});

Route::get('/activities', function () {
    $activities = Activity::orderBy('created_at', 'desc')->paginate(5);// Fetch testimonials from the database
    return view('activities', ['activities' => $activities]);
})->name('activities');

Route::get('/internship/enrollment', [FrontController::class, 'showInternshipEnrollmentForm'])->name('internshipEn');
Route::post('/internship/enrollment', [FrontController::class, 'storeInternshipEnrollment'])->name('storeInternshipEnrollment');

Route::get('/internship', [FrontController::class, 'internship'])->name('internship');



Route::get('/events/enrollment', [FrontController::class, 'showEventEnrollmentForm'])->name('eventsEn');
Route::post('/events/enrollment', [FrontController::class, 'Estore'])->name('storeEventEnrollment');
Route::get('/events', [FrontController::class, 'events'])->name('events');


Route::get('/testimonials', function () {
    $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
    return view('testimonials', ['testimonials' => $testimonials]);
})->name('testimonials');

Route::post('/testimonials', [FrontController::class, 'storeTestimonial'])->name('testimonials.store');



Route::get('/posts/{id}', [PostController::class, 'show'])->name('blog');

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/blog', [FrontController::class, 'blog'])->name('blog');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');


Route::get('/', [FrontController::class, 'guestIndex'])->name('welcome');
Route::get('/test', [FrontController::class, 'guestIndex2'])->name('welcometest');



Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});


Route::middleware(['auth','role:member'])->group(function () {
    Route::get('member/dashboard',[MemberController::class, 'index'])->name('member.dashboard');
});




Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('dashboard/internships/enrollments', [InternshipEnrollmentController::class, 'index'])->name('admin.internships.enrollments.index');
    Route::get('dashboard/internships/enrollments/create', [InternshipEnrollmentController::class, 'create'])->name('admin.internships.enrollments.create');
    Route::post('dashboard/internships/enrollments', [InternshipEnrollmentController::class, 'store'])->name('admin.internships.enrollments.store');
    Route::get('dashboard/internships/enrollments/{id}', [InternshipEnrollmentController::class, 'show'])->name('admin.internships.enrollments.show');
    Route::get('dashboard/internships/enrollments/{id}/edit', [InternshipEnrollmentController::class, 'edit'])->name('admin.internships.enrollments.edit');
    Route::put('dashboard/internships/enrollments/{id}', [InternshipEnrollmentController::class, 'update'])->name('admin.internships.enrollments.update');
    Route::delete('dashboard/internships/enrollments/{id}', [InternshipEnrollmentController::class, 'destroy'])->name('admin.internships.enrollments.destroy');

    // Internships
    Route::get('dashboard/internships', [InternshipController::class, 'index'])->name('admin.internships.index');
    Route::get('dashboard/internships/create', [InternshipController::class, 'create'])->name('admin.internships.create');
    Route::post('dashboard/internships', [InternshipController::class, 'store'])->name('admin.internships.store');
    Route::get('dashboard/internships/{id}', [InternshipController::class, 'show'])->name('admin.internships.show');
    Route::get('dashboard/internships/{id}/edit', [InternshipController::class, 'edit'])->name('admin.internships.edit');
    Route::put('dashboard/internships/{id}', [InternshipController::class, 'update'])->name('admin.internships.update');
    Route::delete('dashboard/internships/{id}', [InternshipController::class, 'destroy'])->name('admin.internships.destroy');
    Route::get('dashboard/internships/{id}/enrollments', [InternshipController::class, 'showEnrollments'])->name('admin.internships.show_enrollments');

    Route::get('dashboard/internships/{id}/enrollments', [InternshipController::class, 'showEnrollments'])->name('admin.internships.show_enrollments');




    Route::get('dashboard/events/enrollments', [EventEnrollmentController::class, 'index'])->name('admin.events.enrollments.index');
    Route::get('dashboard/events/enrollments/create', [EventEnrollmentController::class, 'create'])->name('admin.events.enrollments.create');
    Route::post('dashboard/events/enrollments', [EventEnrollmentController::class, 'store'])->name('admin.events.enrollments.store');
    Route::get('dashboard/events/enrollments/{id}', [EventEnrollmentController::class, 'show'])->name('admin.events.enrollments.show');
    Route::get('dashboard/events/enrollments/{id}/edit', [EventEnrollmentController::class, 'edit'])->name('admin.events.enrollments.edit');
    Route::put('dashboard/events/enrollments/{id}', [EventEnrollmentController::class, 'update'])->name('admin.events.enrollments.update');
    Route::delete('dashboard/events/enrollments/{id}', [EventEnrollmentController::class, 'destroy'])->name('admin.events.enrollments.destroy');


    Route::get('dashboard/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('dashboard/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('dashboard/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('dashboard/posts/{id}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::get('dashboard/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('dashboard/posts/{id}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('dashboard/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');


    Route::get('dashboard/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('dashboard/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('dashboard/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('dashboard/events/{id}', [EventController::class, 'show'])->name('admin.events.show');
    Route::get('dashboard/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('dashboard/events/{id}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('dashboard/events/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy');
    Route::get('dashboard/events/{id}/enrollments', [EventController::class, 'showEnrollments'])->name('admin.events.show_enrollments');



    Route::get('dashboard/stories', [StoryController::class, 'index'])->name('admin.stories.index');
    Route::get('dashboard/stories/create', [StoryController::class, 'create'])->name('admin.stories.create');
    Route::post('dashboard/stories', [StoryController::class, 'store'])->name('admin.stories.store');
    Route::get('dashboard/stories/{id}', [StoryController::class, 'show'])->name('admin.stories.show');
    Route::get('dashboard/stories/{id}/edit', [StoryController::class, 'edit'])->name('admin.stories.edit');
    Route::put('dashboard/stories/{id}', [StoryController::class, 'update'])->name('admin.stories.update');
    Route::delete('dashboard/stories/{id}', [StoryController::class, 'destroy'])->name('admin.stories.destroy');




    Route::get('dashboard/slideshows', [SlideShowController::class, 'index'])->name('admin.slideshows.index');
    Route::get('dashboard/slideshows/create', [SlideShowController::class, 'create'])->name('admin.slideshows.create');
    Route::post('dashboard/slideshows', [SlideShowController::class, 'store'])->name('admin.slideshows.store');
    Route::get('dashboard/slideshows/{id}', [SlideShowController::class, 'show'])->name('admin.slideshows.show');
    Route::get('dashboard/slideshows/{id}/edit', [SlideShowController::class, 'edit'])->name('admin.slideshows.edit');
    Route::put('dashboard/slideshows/{id}', [SlideShowController::class, 'update'])->name('admin.slideshows.update');
    Route::delete('dashboard/slideshows/{id}', [SlideShowController::class, 'destroy'])->name('admin.slideshows.destroy');

    Route::get('dashboard/activities', [ActivityController::class, 'index'])->name('admin.activities.index');
    Route::get('dashboard/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
    Route::post('dashboard/activities', [ActivityController::class, 'store'])->name('admin.activities.store');
    Route::get('dashboard/activities/{id}', [ActivityController::class, 'show'])->name('admin.activities.show');
    Route::get('dashboard/activities/{id}/edit', [ActivityController::class, 'edit'])->name('admin.activities.edit');
    Route::put('dashboard/activities/{id}', [ActivityController::class, 'update'])->name('admin.activities.update');
    Route::delete('dashboard/activities/{id}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');

    Route::get('dashboard/users', [UserController::class, 'index'])->name('users.index');
    Route::get('dashboard/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('dashboard/users', [UserController::class, 'store'])->name('users.store');
    Route::get('dashboard/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('dashboard/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('dashboard/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('dashboard/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('dashboard/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('dashboard/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('dashboard/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('dashboard/testimonials/{id}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
    Route::get('dashboard/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('dashboard/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('dashboard/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');


    Route::get('dashboard/contact-us', [ContactUsController::class, 'index'])->name('admin.contact.index');
    Route::get('dashboard/contact-us/create', [ContactUsController::class, 'create'])->name('admin.contact.create');
    Route::post('dashboard/contact-us', [ContactUsController::class, 'store'])->name('admin.contact.store');
    Route::get('dashboard/contact-us/{id}', [ContactUsController::class, 'show'])->name('admin.contact.show');
    Route::get('dashboard/contact-us/{id}/edit', [ContactUsController::class, 'edit'])->name('admin.contact.edit');
    Route::put('dashboard/contact-us/{id}', [ContactUsController::class, 'update'])->name('admin.contact.update');
    Route::delete('dashboard/contact-us/{id}', [ContactUsController::class, 'destroy'])->name('admin.contact.destroy');

    Route::get('dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [FrontController::class, 'profileEdit'])->name('Userprofile.edit');
    Route::patch('/profile', [FrontController::class, 'profileUpdate'])->name('Userprofile.update');
    Route::delete('/profile', [FrontController::class, 'destroy'])->name('Userprofile.destroy');
});





require __DIR__.'/auth.php';
