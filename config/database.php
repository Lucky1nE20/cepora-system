<?php
// config/database.php - Cepora Metal Fabrication DB Connection
// Setup: Create MySQL DB 'cepora_db', update credentials below

define('DB_HOST', 'localhost');
define('DB_NAME', 'cepora_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // Default XAMPP/WAMP

define('DB_CHARSET', 'utf8mb4');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

echo "Database connected successfully!"; // Remove in production
?>

