<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\UserGuest\SearchController;
use App\Http\Controllers\User\UserGuest\UserGuestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserGuestController::class, 'home'])->name('home');


Route::name('user.')->prefix('user')->group(function () {


    // Route::get('addToCart', [CartController::class, 'addToCart'])->name('addToCart');

    // Route::get('about-us', [UserGuestController::class, 'aboutUs'])->name('aboutUs');
    Route::get('all-doctors', [UserGuestController::class, 'doctors'])->name('doctors');
    Route::get('services', [UserGuestController::class, 'services'])->name('services');
    Route::get('appointment', [UserGuestController::class, 'appointment'])->name('appointment');
    Route::get('contact', [UserGuestController::class, 'contact'])->name('contact');
    Route::post('contact/submit', [UserGuestController::class, 'contact_submit'])->name('contact.submit');
    Route::post('apppointment/submit', [UserGuestController::class, 'apppointment_submit'])->name('apppointment.submit');

    Route::get('service/{id}/doctors', [UserGuestController::class, 'showServiceDoctors'])->name('serviceDoctors');
    Route::get('doctor/{id}/details', [UserGuestController::class, 'showDoctorDetails'])->name('doctorDetails');


    Route::middleware(['UserAuth'])->group(function () {
        Route::get('book-appointment/{id}', [AppointmentController::class, 'bookAppointment'])->name('bookAppointment');
        Route::get('book-appointment', [AppointmentController::class, 'bookAppointmentPage'])->name('bookAppointmentPage');
        Route::post('submit-appointment', [AppointmentController::class, 'submitAppointment'])->name('appointment.submit');

        Route::post('/notification/mark-as-read/{id}', [AppointmentController::class, 'markAsRead'])->name('notificationMarkAsRead');


        Route::get('appointments', [AppointmentController::class, 'myAppointments'])->name('appointments');
        Route::get('{id}/cancel', [AppointmentController::class, 'cancel'])->name('cancel');
    });

    // navigation search bar
    Route::get('search', [SearchController::class, 'search'])->name('search');
});


require __DIR__ . '/admin_auth.php';
require __DIR__ . '/auth.php';
