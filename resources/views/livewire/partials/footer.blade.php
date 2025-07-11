<footer>
    <div class="container">
        <div class="content">
            <div class="logo">
                <x-app-logo />
            </div>

            <div class="branding">
                <h3>{{ config('app.name') }}</h3>
                <p>{{ config('app.slogan') }}</p>
                <div class="info">
                    <p>
                        <x-svgs.location class="w-5 h-5 mr-2" />
                        {{ config('app.city') }}
                    </p>
                    <p>
                        <x-svgs.email class="w-5 h-5 mr-2" />
                        {{ config('app.email') }}
                    </p>
                </div>
            </div>

            <div class="quick_links">
                <h3>Quick Links</h3>
                <div class="links">
                    <a href="{{ Route::has('login') ? route('login') : '#' }}" wire:navigate>Login</a>
                    <a href="{{ Route::has('home-page') ? route('home-page') : '#' }}" wire:navigate>Home</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}" wire:navigate>About</a>
                    <a href="{{ Route::has('tours-page') ? route('tours-page') : '#' }}" wire:navigate>Tours</a>
                    <a href="{{ Route::has('destinations-page') ? route('destinations-page') : '#' }}" wire:navigate>Destinations</a>
                    <a href="{{ Route::has('contact-page') ? route('about-page') : '#' }}" wire:navigate>Contact</a>
                </div>
            </div>

            <div class="packages">
                <h3>Packages</h3>
                <div class="links">
                    @foreach ($categories as $category)
                        <a href="{{ Route::has('categorized-tours-page') ? route('categorized-tours-page', $category->slug) : '#' }}">{{ Str::title($category->title) }}</a>
                    @endforeach
                </div>
            </div>

            <div class="connect">
                <h3>Connect With Us</h3>
                <div class="socials">
                    <a href="{{ config('app.instagram') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.instagram />
                    </a>
                    <a href="{{ config('app.facebook') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.facebook />
                    </a>
                    <a href="{{ config('app.whatsapp') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.whatsapp />
                    </a>
                    <a href="{{ config('app.tiktok') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.tiktok />
                    </a>
                </div>
                <p>Follow us for updates and insights</p>
            </div>
        </div>

        <div class="copyrights">
            <p class="text">&copy; 2025 {{ config('app.name') }}. All rights reserved.</p>
            <div class="documents">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
