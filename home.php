<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Horseplay Hotel</title>
    <link rel="stylesheet" href="/myapplication/seatworkreservation/style.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand">
                <h1>Horseplay</h1>
                <span>Luxury Hotel</span>
            </a>
            <div class="nav-links">
                <a href="home.php" class="active">Home</a>
                <a href="profile.php">Company Profile</a>
                <a href="reservation.php">Reservations</a>
                <a href="contacts.php">Contact Us</a>
                <a href="admin/admin_login.php" class="admin-link">Admin Portal</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Horseplay Hotel</h1>
            <p>Experience Luxury & Comfort</p>
        </div>
    </section>

    <main class="main-content">
        <section class="section">
            <h2 class="section-title">Experience Unparalleled Luxury</h2>
            <p class="section-description">
                Discover the perfect blend of comfort, elegance, and exceptional service at Horseplay Hotel. 
                Our commitment to excellence ensures that every stay is memorable and every guest feels special.
            </p>
        </section>

        <section class="section">
            <h2 class="section-title">Our Amenities</h2>
            <div class="amenities-grid">
                <div class="amenity-card">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Infinity Pool</h3>
                    <p>Enjoy our stunning rooftop pool with panoramic views</p>
                </div>
                <div class="amenity-card">
                    <i class="fas fa-spa"></i>
                    <h3>Luxury Spa</h3>
                    <p>Rejuvenate with our world-class spa treatments</p>
                </div>
                <div class="amenity-card">
                    <i class="fas fa-utensils"></i>
                    <h3>Fine Dining</h3>
                    <p>Experience culinary excellence at our restaurants</p>
                </div>
                <div class="amenity-card">
                    <i class="fas fa-dumbbell"></i>
                    <h3>Fitness Center</h3>
                    <p>Stay active with our state-of-the-art gym</p>
                </div>
                <div class="amenity-card">
                    <i class="fas fa-wifi"></i>
                    <h3>High-Speed WiFi</h3>
                    <p>Stay connected throughout your stay</p>
                </div>
                <div class="amenity-card">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>24/7 Concierge</h3>
                    <p>Round-the-clock service for your needs</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>