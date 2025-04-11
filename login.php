<?php 
session_start(); 
include "connect.php";

// Define maximum login attempts and lockout duration
$max_attempts = 3;
$lockout_duration = 30;

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Check login attempts for the user's IP address
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $try_time_threshold = time() - $lockout_duration;
        $sql_attempts = "SELECT COUNT(*) AS attempts FROM login_attempts WHERE ip_address='$ip_address' AND try_time > $try_time_threshold";
        $result_attempts = mysqli_query($conn, $sql_attempts);
        $row_attempts = mysqli_fetch_assoc($result_attempts);
        $login_attempts = $row_attempts['attempts'];

        $remaining_attempts = $max_attempts - $login_attempts;

        if ($login_attempts >= $max_attempts) {
            header("Location: index.php?error=Your account has been temporarily locked. Please try again later. Please wait 30 seconds");
            exit();
        } else {
            // Hash the password using password_hash()
            $sql = "SELECT * FROM users WHERE user_name=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $uname);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if (password_verify($pass, $row['password'])) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];

                    // Reset login attempts
                    $sql_reset_attempts = "DELETE FROM login_attempts WHERE ip_address='$ip_address'";
                    mysqli_query($conn, $sql_reset_attempts);

                    header("Location: home.php");
                    exit();
                } else {
                    // Record login attempt
                    $try_time = time();
                    $sql_record_attempt = "INSERT INTO login_attempts (ip_address, try_time) VALUES ('$ip_address', $try_time)";
                    mysqli_query($conn, $sql_record_attempt);

                    header("Location: index.php?error=Incorrect User name or password. Please enter valid details. $remaining_attempts attempts remaining.");
                    exit();
                }
            } else {
                header("Location: index.php?error=Incorrect User name or password. Please enter valid details. $remaining_attempts attempts remaining.");
                exit();
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
