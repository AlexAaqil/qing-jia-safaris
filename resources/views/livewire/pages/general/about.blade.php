<div class="AboutPage">
    <section class="Hero">
        <div class="container">
            <h1>About Us</h1>
            <div class="breadcrumbs">
                <a href="{{ Route::has('home-page') ? route('home-page') : '#' }}" wire:navigate>Home</a>
                <span>About Us</span>
            </div>
        </div>
    </section>

    <section class="About">
        <div class="container">
            <div class="image">
                <img src="{{ asset('assets/images/game-drive.webp') }}" alt="About Qing Jia Safaris">
            </div>

            <div class="text">
                <p>Welcome to Qing Jia Safaris, your trusted gateway to unforgettable adventures across Kenya and Tanzania. We are a premier tour operating company passionate about crafting authentic, enriching, and memorable safari experiences tailored to suit every traveler’s dream. Whether you’re looking for thrilling game drives, peaceful beach escapes, or challenging mountain climbs, Qing Jia Safaris brings East Africa’s finest attractions to life with unmatched professionalism and care.</p>
                <p>Client satisfaction and comfort are our highest priorities. From the moment you arrive to your final farewell, we ensure every detail is thoughtfully planned and professionally delivered. Our dedicated team of local guides, drivers, and support staff work tirelessly to provide personalized service, cultural insights, and unforgettable memories.</p>

                <div class="buttons_group">
                    <a href="{{ Route::has('book-tour') ? route('book-tour') : '#' }}" class="btn" wire:navigate>Book Now</a>
                    <a href="{{ Route::has('contact-page') ? route('contact-page') : '#' }}" class="btn" wire:navigate>Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="Features">
        <div class="container">
            <div class="features_list">
                <div class="feature">
                    <p class="title">Tour Packages</p>
                    <p class="description">At Qing Jia Safaris, we pride ourselves on offering a wide range of unique and immersive tour packages to help you discover East Africa’s majestic landscapes, diverse wildlife, and vibrant cultures in a way only we can deliver.</p>
                </div>

                <div class="feature">
                    <p class="title">Premium Transport</p>
                    <p class="description">All our tours are conducted in customized 4x4 Safari Land Cruiser Jeeps, built for comfort, safety, and perfect wildlife viewing. These vehicles feature pop-up roofs, ample legroom, and on-board amenities to ensure a smooth and enjoyable journey across all terrains.</p>
                </div>

                <div class="feature">
                    <p class="title">Accomodation</p>
                    <p class="description">Qing Jia Safaris understands that every traveler has different preferences and budgets. That’s why we offer a diverse range of accommodation options, all carefully selected for quality and location including budget, mid-range and luxury.</p>
                </div>
            </div>
        </div>
    </section>
</div>
