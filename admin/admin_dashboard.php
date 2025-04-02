<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

require 'db.php';

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO reservations (name, contact_number, reservation_from, reservation_to, room_type, room_capacity, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['contact_number'], $_POST['reservation_from'], $_POST['reservation_to'], $_POST['room_type'], $_POST['room_capacity'], $_POST['payment_type']]);
    } elseif (isset($_POST['edit'])) {
        $stmt = $pdo->prepare("UPDATE reservations SET name = ?, contact_number = ?, reservation_from = ?, reservation_to = ?, room_type = ?, room_capacity = ?, payment_type = ? WHERE id = ?");
        $stmt->execute([$_POST['name'], $_POST['contact_number'], $_POST['reservation_from'], $_POST['reservation_to'], $_POST['room_type'], $_POST['room_capacity'], $_POST['payment_type'], $_POST['id']]);
    } elseif (isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
}

// Fetch all reservations
$reservations = $pdo->query("SELECT * FROM reservations ORDER BY reservation_from DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard - Horseplay Hotel</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-sidebar">
        <div class="logo">
            <h2>Horseplay Hotel</h2>
            <p>Admin Panel</p>
        </div>
        <a href="../index.php">← View Website</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="admin_logout.php">Logout</a>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <h1>Reservation Management</h1>
            <button type="button" class="btn btn-create" onclick="showCreateForm()">Create New Reservation</button>
        </div>
        
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Guest Name</th>
                        <th>Contact</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Room Type</th>
                        <th>Capacity</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reservation['id']) ?></td>
                            <td><?= htmlspecialchars($reservation['name']) ?></td>
                            <td><?= htmlspecialchars($reservation['contact_number']) ?></td>
                            <td><?= htmlspecialchars($reservation['reservation_from']) ?></td>
                            <td><?= htmlspecialchars($reservation['reservation_to']) ?></td>
                            <td><?= htmlspecialchars($reservation['room_type']) ?></td>
                            <td><?= htmlspecialchars($reservation['room_capacity']) ?></td>
                            <td><?= htmlspecialchars($reservation['payment_type']) ?></td>
                            <td class="action-buttons">
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                                    <button type="submit" name="delete" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                </form>
                                <button type="button" class="btn btn-edit" onclick="showEditForm(<?= htmlspecialchars(json_encode($reservation)) ?>)">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>Edit Reservation</h2>
            <form method="post" id="editForm">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="edit_name">Guest Name</label>
                    <input type="text" name="name" id="edit_name" required>
                </div>
                <div class="form-group">
                    <label for="edit_contact">Contact Number</label>
                    <input type="text" name="contact_number" id="edit_contact" required>
                </div>
                <div class="form-group">
                    <label for="edit_from">Check In</label>
                    <input type="date" name="reservation_from" id="edit_from" required>
                </div>
                <div class="form-group">
                    <label for="edit_to">Check Out</label>
                    <input type="date" name="reservation_to" id="edit_to" required>
                </div>
                <div class="form-group">
                    <label for="edit_room">Room Type</label>
                    <select name="room_type" id="edit_room" required>
                        <option value="Regular">Regular</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Suite">Suite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_capacity">Room Capacity</label>
                    <select name="room_capacity" id="edit_capacity" required>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Family">Family</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_payment">Payment Type</label>
                    <select name="payment_type" id="edit_payment" required>
                        <option value="Cash">Cash</option>
                        <option value="Credit">Credit</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="submit" name="edit" class="btn">Save Changes</button>
                    <button type="button" class="btn btn-cancel" onclick="hideEditForm()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Modal -->
    <div id="createModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>Create New Reservation</h2>
            <form method="post" id="createForm">
                <div class="form-group">
                    <label for="create_name">Guest Name</label>
                    <input type="text" name="name" id="create_name" required>
                </div>
                <div class="form-group">
                    <label for="create_contact">Contact Number</label>
                    <input type="text" name="contact_number" id="create_contact" required>
                </div>
                <div class="form-group">
                    <label for="create_from">Check In</label>
                    <input type="date" name="reservation_from" id="create_from" required>
                </div>
                <div class="form-group">
                    <label for="create_to">Check Out</label>
                    <input type="date" name="reservation_to" id="create_to" required>
                </div>
                <div class="form-group">
                    <label for="create_room">Room Type</label>
                    <select name="room_type" id="create_room" required>
                        <option value="Regular">Regular</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Suite">Suite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="create_capacity">Room Capacity</label>
                    <select name="room_capacity" id="create_capacity" required>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Family">Family</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="create_payment">Payment Type</label>
                    <select name="payment_type" id="create_payment" required>
                        <option value="Cash">Cash</option>
                        <option value="Credit">Credit</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="submit" name="add" class="btn">Create Reservation</button>
                    <button type="button" class="btn btn-cancel" onclick="hideCreateForm()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function showEditForm(reservation) {
        document.getElementById('edit_id').value = reservation.id;
        document.getElementById('edit_name').value = reservation.name;
        document.getElementById('edit_contact').value = reservation.contact_number;
        document.getElementById('edit_from').value = reservation.reservation_from;
        document.getElementById('edit_to').value = reservation.reservation_to;
        document.getElementById('edit_room').value = reservation.room_type;
        document.getElementById('edit_capacity').value = reservation.room_capacity;
        document.getElementById('edit_payment').value = reservation.payment_type;
        document.getElementById('editModal').style.display = 'block';
    }

    function hideEditForm() {
        document.getElementById('editModal').style.display = 'none';
    }

    function showCreateForm() {
        document.getElementById('createModal').style.display = 'block';
    }

    function hideCreateForm() {
        document.getElementById('createModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target == document.getElementById('editModal')) {
            hideEditForm();
        }
        if (event.target == document.getElementById('createModal')) {
            hideCreateForm();
        }
    }
    </script>
</body>
</html>