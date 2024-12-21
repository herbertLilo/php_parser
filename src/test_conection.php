<?php
try {
    // Use the service name 'mysql_db' as the host
    $pdo = new PDO('mysql:host=mysql_db;port=3306;dbname=xml_data', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>