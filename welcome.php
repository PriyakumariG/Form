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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* CSS for the Welcome Page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .welcome-box {
            background-color: #fff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        .welcome-box h1 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .welcome-box p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 25px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .welcome-box {
                padding: 30px;
            }

            .welcome-box h1 {
                font-size: 2rem;
            }

            .welcome-box p {
                font-size: 1rem;
            }

            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <h1>Welcome! 
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $query = mysqli_query($con, "SELECT name FROM test WHERE email='$email'");
                if ($row = mysqli_fetch_assoc($query)) {
                    echo htmlspecialchars($row['name']);
                } else {
                    echo "User";
                }
            } else {
                echo "Guest";
            }
            ?>
        </h1>
        <p>You have successfully logged in.</p>
    </div>
</body>
</html>
