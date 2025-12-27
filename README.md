🚗 Online Car Rental System

A web-based Online Car Rental System developed using PHP, MySQL, HTML, CSS, and JavaScript.
This application allows users to browse available vehicles, make bookings, manage reservations, and handle user authentication.
An admin panel is included to manage vehicles, bookings, and users efficiently.

📌 Features
👤 User Features

-User registration & login authentication

-Browse available cars with detailed information

-Search cars based on availability

-Book vehicles online

-View booking history

-Update profile & change password

-Submit testimonials and feedback

-Contact support via contact page

🛠 Admin Features

-Admin login panel

-Add, update, and delete vehicle listings

-Manage user bookings

-View user testimonials

-Manage registered users

🧰 Tech Stack
Technology	Description
Frontend	HTML, CSS, JavaScript
Backend	PHP
Database	MySQL
Server	Apache (XAMPP/WAMP)

📁 Project Structure
Online-Car-Rental-System/
│
├── admin/                # Admin panel files
├── assets/               # CSS, JS, Images
├── includes/             # Reusable PHP components
├── sqlfile/              # Database SQL file
│
├── index.php              # Home page
├── car-listing.php        # Vehicle listings
├── vehical-details.php   # Vehicle details page
├── check_availability.php
├── search-carresult.php
├── my-booking.php
├── profile.php
├── update-password.php
├── logout.php
├── contact-us.php
└── README.md

⚙️ Installation & Setup

Clone the repository

git clone https://github.com/shubha123A/Online-Car-Rental-System.git


Move the project

Copy the folder to htdocs (XAMPP) or www (WAMP)

Database Setup

Open phpMyAdmin

Create a new database (e.g., carrental)

Import the SQL file from:

/sqlfile/carrental.sql


Configure Database

Update database credentials in:

/includes/config.php


Run the project

http://localhost/Online-Car-Rental-System/

🔐 Security Measures

Secure user authentication

Password encryption

Input validation

Optimized SQL queries to prevent SQL injection

📈 Future Enhancements

-Online payment gateway integration

-Email/SMS booking notifications

-Advanced car filtering options

-Role-based access control

-UI/UX improvements

👩‍💻 Author

Shubha A

GitHub: shubha123A

