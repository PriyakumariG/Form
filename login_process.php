<?php
session_start();

$server = "localhost:3307";
$username = "root";
$password = "";
$dbname = "phpdb";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// Query to check the credentials
$sql = "SELECT * FROM `test` WHERE `email` = '$email' AND `password` = '$password'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // User found
    $_SESSION['email'] = $email;
    header("Location: welcome.php");
    exit();
} else {
    echo "<script>
    alert('Invalid login credentials. You need to create an account first.');
    window.location.href = 'signup.html';
</script>";
}

mysqli_close($con);
?>
