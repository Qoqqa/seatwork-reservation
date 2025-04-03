<!DOCTYPE html>
<html lang="en">

<head>
    <title>Horseplay Hotel - Luxury & Comfort</title>
    <link rel="stylesheet" href="style.css">
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
                <a href="home.php">Home</a>
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
            <h2 class="section-title">Your Luxury Stay Awaits</h2>
            <p class="section-description">
                Discover the perfect blend of comfort, elegance, and exceptional service at Horseplay Hotel. 
                Our commitment to excellence ensures that every stay is memorable and every guest feels special.
            </p>
            <div class="form-actions">
                <a href="reservation.php" class="btn btn-primary">Book Your Stay</a>
                <a href="contacts.php" class="btn btn-secondary">Contact Us</a>
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