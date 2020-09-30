<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "store";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("\nНе удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "\nConnected successfully\n\n";

// Create sql
$sql = "INSERT INTO guestbook (name, email, message, subject)
VALUES ('John', 'john@example.com', 'Hi, It is John Doe', 1);";

if (mysqli_query($conn, $sql)) {
    echo "\nNew record created successfully\n";
} else {
    echo "\nError: " . $sql . "\n" . mysqli_error($conn). "\n";
}

mysqli_close($conn);
