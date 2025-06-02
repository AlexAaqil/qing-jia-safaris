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
Manage Paments (Track by method / status).
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
