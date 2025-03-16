<?php
echo "Hello from the docker container<br>";


$mysqli = new mysqli("db", "root", "example", "company1");


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected to MySQL successfully!<br>";


$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    fav_color VARCHAR(255) NOT NULL
)";
if (!$mysqli->query($sql)) {
    die("Error creating table: " . $mysqli->error);
}


$queries = [
    "INSERT INTO users (name, fav_color) VALUES('Lil Sneazy', 'Yellow')",
    "INSERT INTO users (name, fav_color) VALUES('Nick Jonas', 'Brown')",
    "INSERT INTO users (name, fav_color) VALUES('Maroon 5', 'Maroon')",
    "INSERT INTO users (name, fav_color) VALUES('Tommy Baker', '043A2B')"
];

foreach ($queries as $sql) {
    if (!$mysqli->query($sql)) {
        echo "Error inserting data: " . $mysqli->error . "<br>";
    }
}


$sql = 'SELECT * FROM users';
$users = [];

if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
} else {
    echo "Error retrieving data: " . $mysqli->error . "<br>";
}


foreach ($users as $user) {
    echo "<br>";
    echo $user->name . " " . $user->fav_color;
    echo "<br>";
}


$mysqli->close();
?>