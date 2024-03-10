<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
ob_start();

$host = "localhost";
$dbname = "mayalihane";
$username = "root";
$password = "";

// SMTP Ayarları
$smtpConfig = [
    'host' => 'smtp.gmail.com',
    'username' => 'smhkszgalata@gmail.com',
    'password' => 'hbtogrluspkxfrbk',
    'port' => 587,
];


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname; charset=UTF8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $error) {
    echo "Bağlantı sırasında bir hata oluştu: " . $error->getMessage();
}

$listContact = $db->query("SELECT * FROM settings WHERE settingsId = 1")->fetch(PDO::FETCH_ASSOC);
