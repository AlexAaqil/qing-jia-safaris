# TODOS
~~- remove the unique iteneraries property.~~
~~- add the logic to always update the image name when the title is updated.~~
~~- fix the inconsistencies with the ck editor when adding and editing tours.~~
~~- add a tour categories crud functionality.~~
~~- add a destinations table to be used instead of activities.~~
~~- add the page for viewing tour details.~~
~~- add the page for viewing destinations details.~~
~~- add feature for deleting existing tour images during editing.~~
~~- add feature for sorting existing tour images during editing.~~
~~- fix ckeditor's styles esp the lists.~~
~~- tour details images to use cover instead of contain~~
~~- add the functionality for booking tours.~~
~~- correct hero text from adventure to adventures~~
~~- slider on Home Page big five~~
~~- add TikTok on the socials~~
~~- correct logout functionality for guests navbar~~
~~- show currently active page on the navbars~~
~~- bookings page should be a searchable table by name and booking code~~
~~- adjust the validation message for itineraries inputs~~
- edit tours
- send an email to clients after they book a tour with the booking code
- proper arrangment for tour details page to avoid too much white space
- add the charts for showing bookings and sales

# Features
- Authentication with roles.
- User Management.
- Tours Management (CRUD, images, pricing logic).
- Booking Management (Filter by status, export, print invoices).
- Manage Payments (Track by method / status).
- Client Management (Search, view history).
- Content Editor (Update homepage content, blog posts, contact info).
- Reports with filters for: month, country, guide or vehicle type.
- Export CSV for records/taxes.

## Pages
Home
About
Tours
Tour details page
Booking form
Reviews, testimonials, post-trip feedback
Blog/Articles
Contact/WhatsApp Integration



# DB DESIGN
```
users {
    id
    uuid
    first_name
    last_name
    email
    phone_number
    secondary_phone_number
    role
    status
    string(notes); // e.g VIP client from Germany
    timestamps();
}

tour_categories {
    id();
    uuid();
    string('title')->unique();
    string('slug')->index();
    text('description')->nullable();
    string('image')->nullable();
}

tours {
    id();
    uuid();
    string('title')->unique();
    string('slug')->index();
    boolean('is_featured')->default(false);
    boolean('is_published')->default(true);
    string('summary');
    text('description')->nullable();
    unsignedTinyInteger('duration_days')->nullable();
    unsignedTinyInteger('duration_nights')->nullable();
    string('currency');
    decimal('price', 10, 2)->nullable();
    decimal('price_ranges_to', 10, 2)->nullable();

    foreignId('tour_category_id')->constrained('tour_categories')->onDelete('cascade');
    timestamps();
}

tour_itineraries {
    id();
    uuid();
    string('title')->unique();
    text('description');
    unsignedTinyInteger('day_number');

    foreignId('tour_id')->constrained('tours')->onDelete('cascade');
    timestamps();
}

tour_images {
    id();
    uuid();
    string('image');
    string('caption')->nullable();
    unsignedTinyInteger('sort_order')->default(0);

    foreignId('tour_id')->constrained('tours')->onDelete('cascade');
    index(['tour_id', 'sort_order']);
    timestamps();
}

bookings {
    id();
    uuid();
    string('booking_code');
    string('first_name');
    string('last_name');
    string('email');
    string('phone_number');
    unsignedTinyInteger('number_of_adults');
    unsignedTinyInteger('number_of_children')->nullable();
    date('date_of_travel')->nullable();
    text('additional_information')->nullable();
    text('comments')->nullable();
    unsignedTinyInteger('status')->nullable();
    unsignedTinyInteger('payment_status')->nullable();
    unsignedTinyInteger('payment_method')->nullable();
    decimal('total_amount', 10, 2)->nullable();
    decimal('amount_paid', 10, 2)->nullable();
    $table->string('ip_address')->nullable();
    $table->text('user_agent')->nullable();

    foreignId('tour_id')->constrained('tours')->onDelete('cascade');
    timestamps();
}

payments {
    id();
    uuid();
    unsignedTinyInteger('status')->nullable();
    unsignedTinyInteger('method')->nullable();
    decimal('amount_paid', 10, 2)->nullable();
    string('response_code')->nullable();
    string('response_description')->nullable();
    string('merchant_request_id')->nullable();
    string('checkout_request_id')->nullable();
    string('transaction_reference')->nullable();
    string('response_description')->nullable();
    text('customer_message')->nullable();
    date('transaction_date')->nullable();

    foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
    timestamps();
}

destinations {
    id();
    uuid();
    string('title')->unique();
    string('slug')->index();
    text('description')->nullable();
    string('image')->nullable();
    timestamps();
}

reviews {
    user_id
    tour_id
    rating
    comment
}
```



# Enums
```
TOUR_CATEGORIES = [
    kenya
    tanzania
    kenya-tanzania
]

TOUR_LEVELS = [
    budget
    midrange
    luxury
]

BOOKING_STATUSES = [
    PENDING = 0;
    CONFIRMED = 1;
    CANCELLED = 2;
    COMPLETED = 3;
]

PAYMENT_STATUSES = [
    PENDING = 0;
    PAID = 1;
    FAILED = 2;
]

PAYMENT_METHODS = [
    KCBMPESAEXPRESS = 0;
    STRIPE = 1;
    PAYPAL = 2;
]
```

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Company Profile
Qing Jia Safaris – Discover East Africa Like Never Before

Welcome to Qing Jia Safaris, your trusted gateway to unforgettable adventures across Kenya and Tanzania. We are a premier tour operating company passionate about crafting authentic, enriching, and memorable safari experiences tailored to suit every traveler’s dream. Whether you’re looking for thrilling game drives, peaceful beach escapes, or challenging mountain climbs, Qing Jia Safaris brings East Africa’s finest attractions to life with unmatched professionalism and care.

At Qing Jia Safaris, we pride ourselves on offering a wide range of unique and immersive tour packages:
1.Game Drives: Explore the world-famous Masai Mara, Serengeti, Ngorongoro Crater, Amboseli, and Tsavo parks in style. Our expertly guided game drives provide front-row seats to the Great Migration, Big Five sightings, and countless other wildlife wonders.
2.Beach Experiences: Unwind on the pristine beaches of Diani, Zanzibar, and Watamu. We offer tailor-made coastal getaways that combine relaxation, water sports, and cultural encounters with the Swahili coast.
3.Mountain Climbing: Conquer Africa’s iconic peaks with our guided climbs to Mount Kilimanjaro, Mount Kenya, and Mount Meru. Our packages cater to all skill levels, ensuring both safety and a sense of achievement.
4.Walking Safaris: For those seeking a closer connection with nature, our walking safaris offer a thrilling way to explore wildlife-rich landscapes, guided by professional rangers in safe and controlled environments.
5.Cycling and Trekking Tours: Discover hidden gems off the beaten path with our cycling and trekking experiences through scenic trails, rural villages, and wildlife corridors across the Great Rift Valley and beyond.
6.Sundowner Services: Experience the magic of African sunsets with our specially arranged sundowners—a perfect blend of panoramic views, gourmet snacks, and refreshing drinks in the heart of the wilderness.
7.Lakes and Ocean Excursions: From the tranquil shores of Lake Naivasha, Lake Nakuru, and Lake Victoria, to the deep blue waters of the Indian Ocean, our lake and ocean tours promise unmatched beauty, birdlife, and water-based adventures.

Premium Transportation – Safari in Comfort

All our tours are conducted in customized 4x4 Safari Land Cruiser Jeeps, built for comfort, safety, and perfect wildlife viewing. These vehicles feature pop-up roofs, ample legroom, and on-board amenities to ensure a smooth and enjoyable journey across all terrains.

Accommodation for Every Traveler

Qing Jia Safaris understands that every traveler has different preferences and budgets. That’s why we offer a diverse range of accommodation options, all carefully selected for quality and location:
Budget: Comfortable, clean, and value-driven guesthouses and camps.
Midrange: Well-appointed lodges and tented camps offering excellent service and amenities.
Luxury: High-end safari lodges, beach resorts, and exclusive tented camps providing world-class comfort, fine dining, and personalized service.

Our Promise to You

At Qing Jia Safaris, client satisfaction and comfort are our highest priorities. From the moment you arrive to your final farewell, we ensure every detail is thoughtfully planned and professionally delivered. Our dedicated team of local guides, drivers, and support staff work tirelessly to provide personalized service, cultural insights, and unforgettable memories.

Book with Qing Jia Safaris today and experience East Africa’s majestic landscapes, diverse wildlife, and vibrant cultures in a way only we can deliver.



## Categories of Tours
Category of Tours

Budget Tours - Includes affordable housing, Transport 4x4 safari Van
Mid Range - Depends on the client's preference,  Transport 4x4 safari Landcruiser (Jeep)
Luxury Tours - includes Luxury hotels

tours can be shared or private



## Tours to reference
Kenya Safari:
- Discover Kenya’s diverse landscapes and wildlife on this 6-day safari. Explore the Masai Mara's iconic savannahs, teeming with the Big Five and Source: SafariBookings.com https://share.google/F6SYE4AMqeMro7ACJ
- This 6-day Leisure Safari, provides an immersive experience through Kenya’s Three remarkable national parks. Start in Tsavo west and East, one of Source: SafariBookings.com https://share.google/xaHd2DhaV6vrlasH5
- At Pavilion Safaris, we invite you to discover extraordinary safari adventures in Kenya and exciting tours to destinations beyond. With a passion for wildlife. Go through these products and improve - Source: Pavillion Safaris https://share.google/BVSwdViXcPvqLbzkw




# Packages

## KENYA SAFARI TOUR: 3 DAYS, 2 NIGHTS FROM NAIROBI TO TSAVO WEST AND TSAVO EAST NATIONAL PARKS
Embark on a thrilling 3-day, 2-night Kenya Safari Tour through Tsavo West and Tsavo East National Parks, starting from Nairobi. Stay in luxurious Lodges within these two remote parks while exploring Kenya’s stunning landscapes and diverse wildlife, including the Big Five and the Tsavo’s famous "Red Elephants." Day one takes you to Tsavo West, featuring the Shetani Lava Flow and Mzima Springs, followed by a game drive. On day two, journey to Tsavo East, home to vast elephant herds, lions, and the Yatta Plateau, before returning to the lodge for a sunset view over the waterhole. The adventure concludes with a final game drive and a scenic transfer to Mombasa’s North or South Coast, reknown for its pristine beaches and rich culture—a perfect end to an unforgettable safari.
Tsavo West and Tsavo East National Parks, located in southeastern Kenya, together form one of the largest national parks in the world. Their combined size (over 22,000 km²) allows for off-the-beaten-path safaris, fewer crowds, and a more intimate experience with nature compared to more commercial parks like Maasai Mara. The two parks offer an unmatched diversity of landscapes and wildlife.
While they are often grouped together, each has distinct characteristics that attract different kinds of tourists.
Tsavo East National Park – “Theatre of the Wild” has Vast Open Plains flat, and open savannah landscapes, ideal for spotting large herds of animals.
It offers a classic African safari experience with unobstructed views of wildlife.
Red Elephants
	•	One of the park’s most iconic sights is its elephants, which appear red due to wallowing in the park’s rich, red volcanic soil.
	•	These “red elephants” are unique to Tsavo and make for striking photography.
Galana River
	•	This river provides a vital water source and a scenic backdrop where visitors can see crocodiles, hippos, and various animals gathering to drink.
	•	The Lugard Falls, a series of rapids on the Galana, adds geological interest.
Aruba Dam
	•	A man-made dam that attracts diverse wildlife, especially during dry seasons, making it a popular spot for game viewing and birdwatching.
Mudanda Rock
	•	A 1.6 km-long inselberg that functions like a natural water catchment.
	•	It offers panoramic views of the surrounding plains and a good vantage point for spotting wildlife.
Tsavo West National Park – “Land of Lava, Springs, and Magical Scenery”
Mzima Springs
	•	A series of crystal-clear natural springs fed by underground water from Chyulu Hills.
	•	Famous for its underwater viewing chamber where visitors can watch hippos and fish in their natural environment.
Shetani Lava Flow
	•	A dramatic black lava field formed from recent volcanic activity, offering a stark contrast to the park’s green vegetation.
	•	The name “Shetani” means “devil” in Swahili, linked to local legends about its formation.
Rhino Sanctuary
	•	Tsavo West hosts one of Kenya’s largest rhino sanctuaries, offering a rare chance to see black rhinos in a protected, semi-wild environment.
Rich Biodiversity and Dense Vegetation
	•	Unlike the open plains of Tsavo East, Tsavo West features more woodland and forested areas, harboring a different mix of wildlife, including leopards and diverse bird species.
Inclusions
Transport in 4×4  Landcruiser safari jeep with pop up roof
Pick up from the Airport or hotel
Accommodation as per itinerary
All meals (Bed, Lunch and Dinner)
Services of our Professional Guide/Driver
All park entrance fees
All game drives
Statutory taxes

Price
Nationality
Destinations
Activity
Travel by
Accommodations


## 7-DAY PHOTOGRAPHY TOUR PACKAGE ITINERARY WITH A FOCUS ON BIRDS
Embark on a 7-day photography tour package through Kenya’s most iconic wildlife destinations, starting with a scenic drive from Nairobi to Meru National Park, where you’ll capture raptors, vibrant birds like the Lilac-breasted roller, and stunning savannah sunsets. Spend a full day in Meru photographing rare species such as the Somali ostrich and Grevy’s zebra before heading to Ol Pejeta Conservancy, a haven for rhinos and unique birds like Jackson’s hornbill. Next, visit Lake Nakuru National Park, famous for its flamingo-covered shores and pelicans, followed by the legendary Maasai Mara, where you’ll photograph majestic eagles, bustards, and even take a hot-air balloon safari for breathtaking aerial shots.
Your adventure concludes with a visit to a Maasai village and final wildlife captures before returning to Nairobi. This photography-focused tour ensures optimal lighting, expert guidance, and ample opportunities to photograph Kenya’s most spectacular birds and wildlife in their natural habitats, leaving you with unforgettable memories and stunning images.

Inclusions
Transport in safari van with pop up roof and 4×4 JEEP
Pick up from the Airport
Accommodation as per itinerary
All meals (B L D)
Services of our Professional Guide/Driver
All park entrance fees
All game drives
Statutory taxes

Price
Nationality
Destinations
Activity
Travel by
Accommodations


## NAIROBI CITY EXCURSION ITINERARY.
Begin your Nairobi excursion with a pick-up from your hotel at 05:30 am, diving into the city’s highlights starting with a short morning game drive at Nairobi National Park. The park is located within the vicinity of Nairobi City making Nairobi uniquely the only city within Africa with a National Park. Here you will have an opportunity to witness all the big five wild animals except the elephant. After a half day touring the park, you will then have choices visiting museums and animal conservation centres including:
i.Karen Blixen Museum to explore colonial history and the famed Out of Africa legacy.
ii.Giraffe Centre famed for its Rothschild giraffes.
iii.David Sheldrick Elephant Orphanage to witness rescued elephants.
iv.In the evening, savor a delicious Kenyan dinner at The Carnivore Restaurant or Nyama Choma
v.Your day concludes with a drop-off at your hotel, leaving you with unforgettable memories of Nairobi’s rich culture, wildlife, and heritage—all in one seamless experience.

Inclusions
Transport in a pop up roof 4×4 Safari Landcruiser (jeep)
Pick up from the Airport or hotel
Services of our Professional Guide/Driver
All park entrance fees
All game drives
Statutory taxes

Price
Nationality
Destinations
Activity
Travel by
Accommodations


## KENYA AND TANZANIA SAFARI TOUR.
This 12-day Kenya and Tanzania safari tour begins in Nairobi, with clients arriving at Jomo Kenyatta International Airport. The adventure kicks off in Masai Mara, where you’ll enjoy game drives, witness the Great Migration (July–October), and visit a Maasai village. Next, explore Lake Nakuru, famous for flamingos and rhinos, before heading to Amboseli for breathtaking views of Mount Kilimanjaro and elephant encounters. Crossing into Tanzania, the tour continues to Tarangire National Park, known for its massive elephant herds, followed by the legendary Serengeti, where you’ll track the Great Migration and big cats. The journey culminates with a descent into the Ngorongoro Crater, a wildlife-rich haven, before concluding in Arusha with options for flights or a shuttle back to Nairobi.
Throughout the tour, you’ll stay in comfortable camps and lodges, enjoy guided game drives, and experience the best of East Africa’s wildlife and landscapes. Optional activities, such as a boat ride on Lake Naivasha or a visit to Olduvai Gorge, add extra adventure. The package ensures seamless logistics, including airport transfers, meals, and expert guides, leaving you with unforgettable memories of Kenya and Tanzania’s iconic parks.
Departure options include flights from Kilimanjaro or Arusha Airport or a shuttle back to Nairobi, making this safari a flexible and immersive East African experience.

Inclussions
Transport on a Safari van in Kenya and 4×4 Land cruiser in Tanzania.
Entrance fees for above mentioned safari destinations.
Game drives as per the itinerary.
All Meals
Professional and knowledgeable driver guide.
2 Liter bottled drinking water while on the tour.
Documentation required for entrance in Kenya and Tanzania.
Things of personal nature use and personal travel insurance.
Any activity not mentioned on the above itinerary.
Tipping
Drinks such as the alcoholics and soft drinks.

Price
Nationality
Destinations
Activity
Travel by
Accommodations


## 8 DAYS BEST KENYA TANZANIA TOUR
Embark on an unforgettable 8-day Kenya and Tanzania safari tour, exploring East Africa’s most iconic destinations. Begin in Kenya’s Maasai Mara, where thrilling game drives reveal lions, elephants, and the Great Migration (seasonal), followed by a visit to Lake Nakuru, famous for flamingos and rhinos. Cross into Tanzania to discover the vast plains of the Serengeti, teeming with wildlife, before descending into the breathtaking Ngorongoro Crater, a UNESCO site packed with diverse species. Along the way, enjoy cultural encounters, scenic landscapes, and stays in comfortable camps and lodges.
This seamless adventure includes airport transfers, guided game drives, and meals, ensuring a hassle-free experience. The tour concludes in Arusha, with options for onward travel. Perfect for wildlife lovers and adventure seekers, this journey offers the ultimate blend of Kenya and Tanzania’s natural wonders in just over a week.

Inclussions
Transport on a Safari van in Kenya and 4×4 Land cruiser in Tanzania.
Entrance fees for above mentioned safari destinations.
Game drives as per the itinerary.
All Meals
Professional and knowledgeable driver guide.
2 Liter bottled drinking water while on the tour.
Documentation required for entrance in Kenya and Tanzania.
Things of personal nature use and personal travel insurance.
Any activity not mentioned on the above itinerary.
Tipping
Drinks such as the alcoholics and soft drinks.

Price
Nationality
Destinations
Activity
Travel by
Accommodations




## 7-DAY KENYA BUDGET SAFARI ITINERARY: MAASAI MARA, LAKE NAKURU, LAKE NAIVASHA & AMBOSELI
Embark on a 7-day budget safari beginning in Nairobi with an early morning drive to the Maasai Mara, arriving by midday for lunch and a short evening game drive. Spend the second day on a full-day safari in the Mara, exploring the expansive savannah for sightings of the Big Five and, if in season, the Great Migration, with a picnic lunch in the reserve. On day three, depart early for Lake Nakuru via the scenic Rift Valley, arriving in time for an afternoon game drive to spot flamingos, rhinos, and other wildlife. Day four takes you to nearby Lake Naivasha for a relaxed boat ride among hippos and waterbirds, followed by an optional hike at Hell's Gate National Park.
On day five, travel south through Nairobi to Amboseli National Park at the foot of Mt. Kilimanjaro, arriving in the afternoon to settle in. Spend day six on a full-day game drive in Amboseli, famous for its large elephant herds and breathtaking views of Kilimanjaro. On the final day, enjoy a morning game drive or leisurely breakfast before returning to Nairobi, arriving by late afternoon. Budget accommodations include basic tented camps and guesthouses, with meals and park fees typically included in group safari packages.

Inclusions
Transport in safari van with pop up roof and 4×4 JEEP
Pick up from the Airport
Accommodation as per itinerary
All meals (B L D)
Services of our Professional Guide/Driver
All park entrance fees
All game drives
Statutory taxes

Price
Nationality
Destinations
Activity
Travel by
Accommodations


## 10-DAY WILDLIFE AND BEACH EXPERIENCE ITINERARY
This 10-day Wildlife and Beach Experience combines Kenya’s most thrilling safaris with the serene beauty of Diani’s white-sand beaches. Your adventure begins in the iconic Maasai Mara, where game drives reveal lions, elephants, and the Great Migration (seasonal), followed by visits to Lake Nakuru’s flamingo-filled shores and Amboseli’s elephant herds against the backdrop of Mount Kilimanjaro. Along the way, enjoy optional activities like Maasai village visits, boat rides on Lake Naivasha, and hikes through Hell’s Gate National Park. After six days of wildlife encounters, fly to Diani Beach for pure relaxation, where you’ll unwind with spa treatments, ocean views, and leisurely coastal strolls.
Designed for both adventure and indulgence, this journey includes stays in luxury safari camps and beachfront hotels, ensuring seamless transitions from the wild to the waves. The experience concludes with a flight back to Nairobi, leaving you with unforgettable memories of Kenya’s diverse landscapes—from the savannahs of the Mara to the turquoise waters of the Indian Ocean. Perfect for those seeking the ultimate blend of excitement and tranquillity.
Inclusions
Transport in 4×4 Landcruiser Jeep with pop up roof
Pick up from the Airport/hotel
Accommodation as per itinerary
All meals (B L D)
Services of our Professional Guide/Driver
All park entrance fees
All game drives
Statutory taxes

Price
Nationality
Destinations
Activity
Travel by
Accommodations

## 10 Days Best Kenya Tanzania Tour
Embark on a memorable 10-day midrange safari through Kenya and Tanzania, beginning in Nairobi with a scenic drive to the world-renowned Maasai Mara for two days of game drives among abundant wildlife, including the Big Five and, seasonally, the Great Migration. On day three, travel to Lake Naivasha for a relaxing boat ride among hippos and waterbirds, followed by an optional visit to Hell’s Gate National Park or Crescent Island. Day four takes you south to Amboseli National Park, where you’ll enjoy stunning views of Mount Kilimanjaro and observe large elephant herds during game drives. On day five, cross into Tanzania via the Namanga border post and head to Tarangire National Park, known for its giant baobab trees and impressive elephant population. Day six brings a journey to the Serengeti, with a game drive en route, and a full day in this vast and wildlife-rich park on day seven, tracking lions, cheetahs, and possibly witnessing dramatic predator-prey interactions. On day eight, drive to the Ngorongoro Conservation Area, descending into the crater for a day-long safari among rhinos, lions, and flamingos in this UNESCO World Heritage Site. Day nine offers a cultural interlude with a visit to a local Maasai village or the Olduvai Gorge before traveling to the town of Karatu or Mto wa Mbu for the night. Finally, on day ten, return to Arusha for lunch and a transfer back to Nairobi or to Kilimanjaro International Airport, concluding an unforgettable East African adventure. Accommodations are in midrange lodges and tented camps, with en-suite bathrooms, good meals, and expert local guides throughout

