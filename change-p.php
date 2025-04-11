<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "connect.php"; // Include database connection

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
        // Validate input data
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Retrieve form data and validate
        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);

        // Check for empty fields
        if (empty($op) || empty($np) || empty($c_np)) {
            header("Location: change-password.php?error=All fields are required");
            exit();
        } elseif ($np !== $c_np) {
            header("Location: change-password.php?error=The new passwords do not match");
            exit();
        } else {
            // Hash the new password
            $np_hashed = password_hash($np, PASSWORD_DEFAULT);
            $id = $_SESSION['id'];

            // Check if the old password matches the one stored in the database
            $sql = "SELECT password FROM users WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($op, $row['password'])) {
                    // Update the password in the database
                    $sql_2 = "UPDATE users SET password='$np_hashed' WHERE id='$id'";
                    mysqli_query($conn, $sql_2);

                    header("Location: change-password.php?success=Your password has been changed successfully");
                    exit();
                } else {
                    header("Location: change-password.php?error=Incorrect old password");
                    exit();
                }
            } else {
                header("Location: change-password.php?error=Error retrieving user data");
                exit();
            }
        }
    } else {
        header("Location: change-password.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
