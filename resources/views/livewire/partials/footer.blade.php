<footer>
    <div class="container">
        <div class="content">
            <div class="logo">
                <img src="{{ asset('assets/images/qing-jia-safaris-logo.png') }}" alt="Qing Jia Safaris Logo">
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
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}" wire:navigate>About</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}" wire:navigate>Packages</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}" wire:navigate>Tours</a>
                    <a href="{{ Route::has('contact-page') ? route('about-page') : '#' }}" wire:navigate>Contact</a>
                </div>
            </div>

            <div class="packages">
                <h3>Packages</h3>
                <div class="links">
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}">Luxury Tours</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}">Mid-range Tours</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}">Budget Tours</a>
                </div>
            </div>

            <div class="connect">
                <h3>Connect With Us</h3>
                <div class="socials">
                    <a href="{{ config('app.instagram') }}">
                        <x-svgs.instagram />
                    </a>
                    <a href="{{ config('app.facebook') }}">
                        <x-svgs.facebook />
                    </a>
                    <a href="{{ config('app.whatsapp') }}">
                        <x-svgs.whatsapp />
                    </a>
                </div>
                <p>Follow us for updates and insights</p>
            </div>
        </div>

        <div class="copyrights">
            <p class="text">&copy; 2025 {{ config('app.name') }}. All rights reserved.</p>
            <div class="documents">
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/terms">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
