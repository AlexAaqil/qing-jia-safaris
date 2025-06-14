<nav x-data="{ open:false }" @click.outside="open = false" class="guest_nav relative">
    <div class="container">
        <div class="branding">
            <a href="/" wire:navigate>
                <img src="{{ asset('assets/images/qing-jia-safaris-logo.png') }}" alt="Qing Jia Safaris Logo" width="50" height="50">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="burger_menu" @click="open = !open">
            <span :class="open ? 'rotate-45 translate-y-1.5' : ''"></span>
            <span :class="open ? 'opacity-0' : ''"></span>
            <span :class="open ? '-rotate-45 -translate-y-1.5' : ''"></span>
        </div>

        <div class="nav_links" :class="{ 'open' : open }">
            @php
                $links = [
                    ['href' => 'home-page', 'text' => 'Home'],
                    ['href' => 'about-page', 'text' => 'About Us'],
                    ['href' => 'about-page', 'text' => 'Tours'],
                    ['href' => 'about-page', 'text' => 'Activities'],
                    ['href' => 'contact-page', 'text' => 'Contact'],
                ];
            @endphp

            <div class="main_links">
                @auth
                    <a href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}" wire:navigate>Dashboard</a>
                @endif
                @foreach ($links as $link)
                    <a href="{{ Route::has($link['href']) ? route($link['href']) : '#' }}" wire:navigate>{{ $link['text'] }}</a>
                @endforeach
            </div>

            <div class="other_links">
                @auth
                    <button wire:click="logout" class="btn btn_danger">Logout</button>
                @else
                    <a href="{{ Route::has('login') ? route('login') : '#' }}">Book Now</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
