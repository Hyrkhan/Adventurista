<?php
require_once("config.php");

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT id, fullname, pw FROM wanderlogusers WHERE username=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["pw"])) {
                // Successful login
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["fullname"];

                // Provide a JSON response for successful login
                echo json_encode(["success" => true, "redirect" => "index2.php"]);
                exit();
            } else {
                // Incorrect password
                echo json_encode(["success" => false, "message" => "Incorrect password"]);
                exit();
            }
        } else {
            // User not found
            echo json_encode(["success" => false, "message" => "User not found"]);
            exit();
        }
    } else {
        // Handle query error
        echo json_encode(["success" => false, "message" => "Query error: " . mysqli_error($conn)]);
        exit();
    }
}

mysqli_close($conn);
?>