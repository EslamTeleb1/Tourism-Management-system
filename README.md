<p align="center">
Tour Management 
</p>

##

A small tour management laravel web app that is using to CRUD tours and bookings an Multi langauge support with built in auth for managing tours.

## how to run

-   npm install
-   go to the main branch
-   npm run dev (for auth)
-   php artisan serve

## Main func

-   not very good UI
-   auth added just for showing that fun
-   tour name changes depend on the langauge
-   manage tours was added
-   manage booking was added

## REST API

-   Tour

  - GET /tour: to retrieve a list of tours.
  - GET /tour/{id}: to retrieve a specific tour by ID.
  - POST /tour: to create a new tour.
  - PUT /tour/{id}: to update an existing tour.
  - DELETE /tour/{id}: to delete a tour.

-   Booking
   -  GET /booking: to retrieve a list of bookings.
   -  GET /booking/{id}: to retrieve a specific booking by ID.
   -  POST /booking: to create a new booking.
   -  PUT /booking/{id}: to update an existing booking.
   -  DELETE /booking/{id}: to delete a booking.

## some achievable upgrades

-   add a review about each booking
-   Add and manage multi vendor for each booking
-   Create reports for the bookings and tours tables
-   Add custom/auth roles for admin and users
-   UI/UX improvments
