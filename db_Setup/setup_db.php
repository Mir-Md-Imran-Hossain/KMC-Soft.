<?php
include 'db.php';

// Users টেবিল তৈরি
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('Admin', 'Manager', 'Counter', 'Lab', 'Doctor'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql_users);

// Doctors টেবিল তৈরি
$sql_doctors = "CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name_bn VARCHAR(100),
    name_en VARCHAR(100),
    specialty_bn TEXT,
    specialty_en TEXT,
    schedule TEXT,
    fee DECIMAL(10,2),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$conn->query($sql_doctors);

// প্রি-লোড ইউজার + ডাক্তার (যদি না থাকে)
$insert_users = "INSERT IGNORE INTO users (email, password, role) VALUES 
('admin@kmc', MD5('Password'), 'Admin'),
('manager@kmc', MD5('manager'), 'Manager'),
('sohel.counter@kmc', MD5('sohel'), 'Counter'),
('aleya.lab@kmc', MD5('aleya'), 'Lab'),
('dr.rajib@kmc', MD5('rajib'), 'Doctor')";
$conn->query($insert_users);

// ডাক্তার প্রি-লোড (উদাহরণ Dr. Rajib)
$insert_doctors = "INSERT IGNORE INTO doctors (user_id, name_bn, name_en, specialty_bn, specialty_en, schedule, fee) VALUES 
((SELECT id FROM users WHERE email='dr.rajib@kmc'), 'ডাঃ মীর মোঃ মহিউদ্দিন (রাজিব)', 'Dr. Mir Md Mohiuddin (Rajib)', 'নাক-কান-গলা বিশেষজ্ঞ ও সার্জন', 'ENT Specialist & Surgeon', 'রোগী দেখেন বৃহস্পতিবার সকাল ১০ টা থেকে বিকেল ০৫ টা পর্যন্ত', 500.00)";
$conn->query($insert_doctors);

// অন্য ডাক্তারদের জন্য একইভাবে অ্যাড করো (পুরো লিস্ট তোমার চাহিদা অনুসারে)

echo "ডাটাবেস সেটআপ কমপ্লিট! phpMyAdmin-এ চেক করো।";
?>