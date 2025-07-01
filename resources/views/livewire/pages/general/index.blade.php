<x-slot name="extra_head">
    <meta name="description" content="Best Tour and Travel Company in Nairobi, we offer memorable safaris, thrilling gamedrives, peaceful beaches escapes and challenging mountain climbs. Book with us Today!" />
    <title>{{ config('app.name') }} | Best Tour and Travel Company in Nairobi, Kenya</title>
</x-slot>

<div class="HomePage">
    <section class="Hero">
        <div class="container">
            <div class="hero_wrapper">
                <div class="overlay"></div>

                <div class="text">
                    <h1>{{ config('app.name') }}</h1>
                    <p class="sub_title">{{ config('app.slogan') }}</p>
                    <p class="punchline">Dependable travel experiences that leave lasting memories</p>
                </div>

                <div
                    class="slideshow"
                    x-data="{
                        images: [
                            '{{ asset('assets/images/lions.jpg') }}',
                            '{{ asset('assets/images/elephants.png') }}',
                            '{{ asset('assets/images/rhinos.jpg') }}',
                            '{{ asset('assets/images/buffalos.jpg') }}',
                            '{{ asset('assets/images/leopard.jpg') }}',
                        ],
                        current: 0,
                        delay: 5000,
                        start() {
                            setInterval(() => {
                                this.current = (this.current + 1) % this.images.length;
                            }, this.delay);
                        }
                    }"
                    x-init="start()"
                >
                    <template x-for="(image, index) in images" :key="index">
                        <div
                            class="absolute inset-0 transition-opacity duration-1000"
                            x-show="current === index"
                            x-transition:enter="opacity-0"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="opacity-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            <img
                                :src="image"
                                alt="{{ config('app.name') }} Online Shopper"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <section class="About">
        <div class="container">
            <p>{{ config('app.name') }} is a premier tour operating company passionate about crafting authentic, enriching, and memorable safari experiences tailored to suit every traveler’s dream.</p>
            <p>Whether you’re looking for thrilling game drives, peaceful beach escapes, or challenging mountain climbs, Qing Jia Safaris brings East Africa’s finest attractions to life with unmatched professionalism and care.</p>
        </div>
    </section>

    <section class="Destinations">
        <div class="container">
            <div class="section_header">
                <h2>Top Destinations</h2>
            </div>

            <div class="destinations_list">
                @foreach($destinations as $destination)
                    <div class="destination">
                        <div class="image">
                            <img src="{{ $destination->image }}" alt="{{ $destination->title }}">
                        </div>
                        <p>{{ $destination['title'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="Packages">
        <div class="container">
            <div class="section_header">
                <h2>Popular Packages</h2>
            </div>

            <div class="packages_list">
                @foreach($tours as $tour)
                    <div class="package">
                        <div class="image">
                            <img src="{{ $tour->image }}" alt="{{ $tour->title }}">
                        </div>

                        <div class="content">
                            <p class="title">{{ $tour->title }}</p>
                            <!-- <p class="description">{{ $tour->summary }}</p> -->
                            <p class="price">
                                <span>$ {{ $tour->price }}</span>
                                @if($tour->price_ranges_to)
                                    <span>- $ {{ $tour->price_ranges_to }}</span>
                                @endif
                            </p>
                            <div class="button_wrapper">
                                <a href="{{ Route::has('tour-details-page') ? route('tour-details-page', $tour->slug) : '#' }}" wire:navigate class="btn_link">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="NextTrip">
        <div class="container">
            <div class="image">
                <img src="{{ asset('assets/images/customer-service.jpg') }}" alt="Customer Service">
            </div>

            <div class="text">
                <h2>Let's plan your next trip</h2>
                <p>At Qing Jia Safaris, client satisfaction and comfort are our highest priorities. From the moment you arrive to your final farewell, we ensure every detail is thoughtfully planned and professionally delivered.</p>
                <p>Our dedicated team of local guides, drivers, and support staff work tirelessly to provide personalized service, cultural insights, and unforgettable memories.</p>
                <p>Book with Qing Jia Safaris today and experience East Africa’s majestic landscapes, diverse wildlife, and vibrant cultures in a way only we can deliver.</p>

                <div class="buttons_group">
                    <a href="{{ Route::has('tours-page') ? route('tours-page') : '#' }}" wire:navigate class="btn">Book a Tour</a>
                    <a href="{{ Route::has('contact-page') ? route('contact-page') : '#' }}" wire:navigate class="btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</div>
