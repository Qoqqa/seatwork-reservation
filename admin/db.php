<?php
$host = 'localhost';
$dbname = 'hotel_reservation';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // CREATE DATABASE IF IT DOESN'T EXIST
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");

    // CREATE `admins` TABLE IF IT DOESN'T EXIST
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS admins (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )
    ");

    // CREATE `reservations` TABLE IF IT DOESN'T EXIST
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS reservations (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            contact_number VARCHAR(20) NOT NULL,
            reservation_from DATE NOT NULL,
            reservation_to DATE NOT NULL,
            room_type VARCHAR(50) NOT NULL,
            room_capacity VARCHAR(50) NOT NULL,
            payment_type VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    // INSERT DEFAULT ADMIN IF NOT EXISTS
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO admins (username, password) 
            VALUES ('admin', 'password123')
        ");
    }

    // INSERT DEFAULT RESERVATIONS IF NOT EXISTS
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO reservations (id, name, contact_number, reservation_from, reservation_to, room_type, room_capacity, payment_type, created_at) 
            VALUES 
            (3, 'adadadadada', '09173940164', '2025-04-04', '2025-04-08', 'Deluxe', 'Family', 'Cheque', '2025-04-02 03:48:56'),
            (4, 'VILLENA, LANSERINNO', '09173940163', '2025-04-09', '2025-04-11', 'Deluxe', 'Single', 'Cheque', '2025-04-02 04:17:50')
        ");
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>