# Features
- User Management.
- Authentication with roles.
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

## User Dashboard
View past and upcoming bookings.
Chat with admin.
Make Payments.
Upload documents.

## Admin Dashboard
Manage Tours (CRUD, images, pricing logic).
Manage Bookings (Filter by status, export, print invoices).
Manage Clients (Search, view history).
Manage Payments (Track by method / status).
Content Editor (Update homepage content, blog posts, contact info).
Role Management (Admin, Agent, Manager).
Notification Center (New bookings, payments received).



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

tours {
    id
    title
    slug
    category
    description
    price
    duration
    level
    json(itenerary);
    higlights
}

bookings {
    id
    user_id
    tour_id
    status
    people
    total_price
    start_date
    json(extras);
}

payments {
    id
    booking_id
    amount
    method
    status
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
TOUR_LEVELS = [
    budget
    midrange
    luxury
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
Embark on a thrilling 3-day, 2-night Kenya Safari Tour through Tsavo West and Tsavo East National Parks, starting from Nairobi. Stay at the luxurious Salt Lick Safari Lodge while exploring Kenya’s stunning landscapes and diverse wildlife, including the Big Five and Tsavo’s famous "Red Elephants." Day one takes you to Tsavo West, featuring the Shetani Lava Flow and Mzima Springs, followed by a game drive. On day two, journey to Tsavo East, home to vast elephant herds, lions, and the Yatta Plateau, before returning to the lodge for a sunset view over the waterhole. The adventure concludes with a final game drive and a scenic transfer to Mombasa’s North or South Coast, known for its pristine beaches and rich culture—a perfect end to an unforgettable safari.

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
Begin your Nairobi excursion with a pick-up from your hotel, diving into the city’s highlights starting with the Karen Blixen Museum to explore colonial history and the famed Out of Africa legacy. Next, encounter Rothschild giraffes at the Giraffe Centre, followed by a heartwarming visit to the David Sheldrick Elephant Orphanage to witness rescued elephants. Savor a delicious Kenyan meal at The Carnivore Restaurant or Nyama Choma, then immerse yourself in vibrant crafts at the Maasai Market for unique souvenirs. Your day concludes with a drop-off at your hotel, leaving you with unforgettable memories of Nairobi’s rich culture, wildlife, and heritage—all in one seamless experience.

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
This 7-day Kenya budget safari begins with a pickup from Nairobi, taking you straight to the world-famous Maasai Mara for thrilling game drives where you'll spot the Big Five against stunning savannah backdrops. After two nights at Miti Mingi Eco Camp, you'll visit a Maasai village before heading to Lake Nakuru National Park, renowned for its flamingos and rhinos, with an optional boat ride on Lake Naivasha. The adventure continues to Amboseli National Park, where you'll enjoy breathtaking views of Mount Kilimanjaro while tracking elephants, zebras, and cheetahs.
Throughout the tour, you'll stay in budget-friendly accommodations like Buraha Zenoni Hotel and Nyati Safari Camp, with all meals and drinking water included. The itinerary balances wildlife encounters with cultural experiences, including Crescent Island walks and Hell’s Gate National Park exploration. The safari concludes with a return to Nairobi, leaving you with unforgettable memories of Kenya’s iconic landscapes and wildlife—all at an affordable price.

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
Designed for both adventure and indulgence, this journey includes stays in luxury safari camps and beachfront hotels, ensuring seamless transitions from the wild to the waves. The experience concludes with a flight back to Nairobi, leaving you with unforgettable memories of Kenya’s diverse landscapes—from the savannahs of the Mara to the turquoise waters of the Indian Ocean. Perfect for those seeking the ultimate blend of excitement and tranquility.

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

