<?php
echo "Hello from the docker container";

$mysqli = new mysqli("db", "root", "example", "company1");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    fav_color VARCHAR(255) NOT NULL
)";
$mysqli->query($sql);

$sql = "INSERT INTO users (name, fav_color) VALUES('Lil Sneazy', 'Yellow')";
$mysqli->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Nick Jonas', 'Brown')";
$mysqli->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Maroon 5', 'Maroon')";
$mysqli->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Tommy Baker', '043A2B')";
$mysqli->query($sql);

$sql = 'SELECT * FROM users';
$users = [];

if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->name . " " . $user->fav_color;
    echo "<br>";
}

$mysqli->close();
?>