<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["pw"];
    $confirm_password = $_POST["cpw"];

    // TODO: Add validation for password matching and other checks
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO wanderlogusers (fullname, username, pw) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $username, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            header("Location: index.html"); // Redirect to login page
            exit();
        } else {
            // Registration failed
            echo "Error: Registration failed.";
            error_log("Error: " . mysqli_stmt_error($stmt)); // Log detailed error
            echo "Error: ".mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Registration failed
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>