<x-slot name="extra_head">
    <meta name="description" content="Best Tour and Travel Company in Nairobi, we offer memorable safaris, thrilling gamedrives, peaceful beaches escapes and challenging mountain climbs. Book with us Today!" />
    <title>{{ config('app.name') }} | Best Tour and Travel Company in Nairobi, Kenya</title>
</x-slot>

<div class="HomePage">
    <section class="Hero">
        <div class="container">
            <div class="image">
                <div class="overlay"></div> {{-- This is the magic layer --}}
                <div class="text">
                    <h1>Qing Jia Safaris</h1>
                    <p class="sub_title">{{ config('app.slogan') }}</p>
                    <p class="punchline">Your trusted gateway to unforgettable adventure across Kenya and Tanzania</p>
                </div>
                <img src="{{ asset('assets/images/elephants.png') }}" alt="Hero Image">
                <!-- <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover z-[-1]">
                    <source src="{{ asset('assets/videos/hero.mp4') }}" type="video/mp4">
                </video> -->
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
                                <a href="#" class="btn_link">View</a>
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
            </div>
        </div>
    </section>
</div>
