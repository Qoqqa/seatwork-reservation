# Horseplay Hotel Reservation System

A hotel reservation system built with PHP and MySQL.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- phpMyAdmin (for database management)

## Database Structure

The system uses a MySQL database named `hotel_reservation` with two tables:
- `admins`: Stores administrator login credentials
- `reservations`: Stores all hotel room reservations

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/seatwork-reservation.git
```

2. Import the database:
- Open phpMyAdmin
- Create a new database named 'hotel_reservation'
- Import the `database.sql` file which contains the two tables (admins, reservations)

3. Configure the database connection:
- Copy `config.example.php` to `config.php`
- Update the database credentials in `config.php`:
```php
$host = 'localhost';
$dbname = 'hotel_reservation';
$username = 'your_username';
$password = 'your_password';
```

4. Set up your web server:
- Point your web server to the project directory
- Ensure the server has PHP and MySQL support enabled

5. Access the application:
- Open your browser and navigate to: `http://localhost/seatworkreservation`
- Admin panel: `http://localhost/seatworkreservation/admin`

## Features

- User reservation system
- Admin dashboard for managing reservations
- Room booking management
- Payment type selection
- Responsive design

## Admin Access

Default admin credentials (stored in the `admins` table):
- Username: admin
- Password: password123

(Remember to change these credentials in production)

## Database Tables

### admins
- Stores administrator credentials
- Used for admin panel authentication

### reservations
- Stores all hotel room bookings
- Fields include: guest name, contact number, check-in/out dates, room type, capacity, and payment type 