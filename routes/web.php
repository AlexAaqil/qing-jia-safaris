<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\General\Index as HomePage;
use App\Livewire\Pages\General\About;
use App\Livewire\Pages\General\Contact\Index as Contact;
use App\Livewire\Pages\Dashboard\Index as Dashboard;
use App\Livewire\Pages\ContactMessages\Index as ContactMessages;
use App\Livewire\Pages\Users\Index as Users;
use App\Livewire\Pages\Users\Form as CreateUser;
use App\Livewire\Pages\Users\Form as EditUser;
use App\Livewire\Pages\Tours\Categories\Index as TourCategories;
use App\Http\Controllers\Tours\TourCategoryController;
use App\Livewire\Pages\Tours\Tours\Index as Tours;
use App\Http\Controllers\Tours\TourController;
use App\Livewire\Pages\Tours\Destinations\Index as TourDestinations;
use App\Http\Controllers\Tours\DestinationController;

Route::get('/', HomePage::class)->name('home-page');
Route::get('about', About::class)->name('about-page');
Route::get('contact', Contact::class)->name('contact-page');

Route::middleware(['authenticated_user'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['admin_only'])->group(function() {
    Route::get('users', Users::class)->name('users.index');
    Route::get('users/create', CreateUser::class)->name('users.create');
    Route::get('users/{uuid}/edit', EditUser::class)->name('users.edit');

    Route::get('tour-categories', TourCategories::class)->name('tour-categories.index');
    Route::get('tour-categories/create', [TourCategoryController::class, 'create'])->name('tour-categories.create');
    Route::post('tour-categories', [TourCategoryController::class, 'store'])->name('tour-categories.store');
    Route::get('tour-categories/{tour_category}/edit', [TourCategoryController::class, 'edit'])->name('tour-categories.edit');
    Route::patch('tour-categories/{tour_category}', [TourCategoryController::class, 'update'])->name('tour-categories.update');

    Route::get('tours', Tours::class)->name('tours.index');
    Route::get('tours/create', [TourController::class, 'create'])->name('tours.create');
    Route::post('tours', [TourController::class, 'store'])->name('tours.store');
    Route::get('tours/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit');
    Route::patch('tours/{tour}', [TourController::class, 'update'])->name('tours.update');

    Route::get('tour-destinations', TourDestinations::class)->name('tour-destinations.index');
    Route::get('tour-destinations/create', [DestinationController::class, 'create'])->name('tour-destinations.create');
    Route::post('tour-destinations', [DestinationController::class, 'store'])->name('tour-destinations.store');
    Route::get('tour-destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('tour-destinations.edit');
    Route::patch('tour-destinations/{destination}', [DestinationController::class, 'update'])->name('tour-destinations.update');

    Route::get('contact-messages', ContactMessages::class)->name('contact-messages.index');
});

require __DIR__.'/auth.php';
