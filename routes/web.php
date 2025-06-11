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
use App\Livewire\Pages\Tours\Tours\Index as Tours;
use App\Livewire\Pages\Tours\Tours\Form as CreateTour;
use App\Livewire\Pages\Tours\Tours\Form as EditTour;

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

    Route::get('tours', Tours::class)->name('tours.index');
    Route::get('tours/create', CreateTour::class)->name('tours.create');
    Route::get('tours/{uuid}/edit', EditTour::class)->name('tours.edit');

    Route::get('contact-messages', ContactMessages::class)->name('contact-messages.index');
});

require __DIR__.'/auth.php';
