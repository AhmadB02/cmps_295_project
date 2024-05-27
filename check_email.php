<?php

$con=new mysqli("localhost","root","","myhmsdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }
}

$conn->close();
?>
