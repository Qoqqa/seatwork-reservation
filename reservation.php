<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservation - Horseplay Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function showSummary() {
            document.getElementById("reservationForm").style.display = "none";
            document.getElementById("summary").style.display = "block";
        }

        function showForm() {
            document.getElementById("reservationForm").style.display = "block";
            document.getElementById("summary").style.display = "none";
        }
    </script>
</head>

<body>
    <?php
    require 'admin/db.php';

    $summary = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $room = $_POST['room'] ?? null;
        $capacity = $_POST['capacity'] ?? null;
        $payment = $_POST['payment'] ?? null;

        // CALCULATION 
        $startDate = new DateTime($from);
        $endDate = new DateTime($to);
        $days = $startDate->diff($endDate)->days;

        if ($days <= 0) {
            $summary = "Invalid reservation dates.";
        } else {
            $rates = [
                "Single" => ["Regular" => 100, "Deluxe" => 300, "Suite" => 500],
                "Double" => ["Regular" => 200, "Deluxe" => 500, "Suite" => 800],
                "Family" => ["Regular" => 500, "Deluxe" => 750, "Suite" => 1000]
            ];
            $ratePerDay = $rates[$capacity][$room];
            $subtotal = $ratePerDay * $days;
            $discount = 0;
            $additionalCharge = 0;

            if ($payment === "Cash") {
                if ($days >= 6) {
                    $discount = $subtotal * 0.15;
                } elseif ($days >= 3) {
                    $discount = $subtotal * 0.10;
                }
            } elseif ($payment === "Credit") {
                $additionalCharge = $subtotal * 0.10;
            } elseif ($payment === "Cheque") {
                $additionalCharge = $subtotal * 0.05;
            }

            $total = $subtotal - $discount + $additionalCharge;

            // INSERT INTO DATABASE
            $stmt = $pdo->prepare("INSERT INTO reservations (name, contact_number, reservation_from, reservation_to, room_type, room_capacity, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $number, $from, $to, $room, $capacity, $payment]);

            // SUMMARY
            $summary = "<h2>Reservation Summary</h2>";
            $summary .= "<p>Name: $name</p>";
            $summary .= "<p>Contact Number: $number</p>";
            $summary .= "<p>Room Type: $room</p>";
            $summary .= "<p>Room Capacity: $capacity</p>";
            $summary .= "<p>Payment Type: $payment</p>";
            $summary .= "<p>Reservation Dates: $from to $to ($days days)</p>";
            $summary .= "<p>Rate per Day: $$ratePerDay</p>";
            $summary .= "<p>Subtotal: $$subtotal</p>";
            $summary .= "<p>Discount: $$discount</p>";
            $summary .= "<p>Additional Charge: $$additionalCharge</p>";
            $summary .= "<p>Total Bill: $$total</p>";
        }
    }
    ?>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand">
                <h1>Horseplay</h1>
                <span>Luxury Hotel</span>
            </a>
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="profile.php">Company Profile</a>
                <a href="reservation.php" class="active">Reservations</a>
                <a href="contacts.php">Contact Us</a>
                <a href="admin/admin_login.php" class="admin-link">Admin Portal</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Book Your Stay</h1>
            <p>Experience Luxury & Comfort</p>
        </div>
    </section>

    <main class="main-content">
        <section class="section">
            <h2 class="section-title">Make a Reservation</h2>
            <!-- Reservation Form -->
            <div class="form-container" id="reservationForm" style="<?= $summary ? 'display:none;' : '' ?>">
                <form action="reservation.php" method="post">
                    <div class="form-group">
                        <label for="name">Contact Name:</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Contact Number:</label>
                        <input type="text" name="number" id="number" required>
                    </div>
                    <div class="form-group">
                        <label>Reservation Date:</label>
                        <div class="date-inputs">
                            <div>
                                <label for="from">From:</label>
                                <input type="date" name="from" id="from" required>
                            </div>
                            <div>
                                <label for="to">To:</label>
                                <input type="date" name="to" id="to" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Room Type:</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="room" value="Regular" required>
                                Regular
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="room" value="Deluxe">
                                De Luxe
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="room" value="Suite">
                                Suite
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Room Capacity:</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="capacity" value="Family" required>
                                Family
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="capacity" value="Double">
                                Double
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="capacity" value="Single">
                                Single
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Payment Type:</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="payment" value="Cash" required>
                                Cash
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="payment" value="Cheque">
                                Cheque
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="payment" value="Credit">
                                Credit Card
                            </label>
                        </div>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">Submit Reservation</button>
                        <button type="reset" class="btn btn-secondary">Clear Entry</button>
                    </div>
                </form>
            </div>
            <div id="summary" class="summary-container" style="<?= $summary ? 'display:block;' : 'display:none;' ?>">
                <?= $summary ?>
                <button onclick="showForm()" class="btn btn-primary">Return to Reservation Form</button>
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