<?php

$server = "localhost:3307";
$username = "root";
$password = "";
$dbname = "phpdb";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$password = $_POST['pass'];

// Check if the email already exists
$checkEmail = "SELECT * FROM test WHERE email = '$email'";
$result = mysqli_query($con, $checkEmail);

if (mysqli_num_rows($result) > 0) {
    // Email already exists: show alert and redirect back
    echo "
    <script>
        alert('Email already exists. Please use a different email.');
        window.location.href = 'signup.html';
    </script>
    ";
} else {
    // Insert data into the database
    $sql = "INSERT INTO test(name, email, phone, city, password) VALUES ('$name', '$email', '$phone', '$city', '$password')";

    if (mysqli_query($con, $sql)) {
        // Redirect to login page after successful signup (with alert)
        echo "
        <script>
            alert('Signup successful! Please log in.');
            window.location.href = 'login.html';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Signup failed. Please try again.');
            window.location.href = 'signup.html';
        </script>
        ";
    }
}

mysqli_close($con);
?>
