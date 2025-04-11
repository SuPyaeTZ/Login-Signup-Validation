<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <form action="change-p.php" method="post" onsubmit="return validateForm()">
        <h2>Change Password</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <div class="main-input">
            <div class="password">
                <label for="password">Old Password</label>
                <label><input type="checkbox" onclick="toggleVisibility('op')" id="show-op-password"> </label>
            </div>
            <input type="password" name="op" id="op" placeholder="Old Password" required>
        </div>

        <div class="main-input">
            <div class="password">
                <label for="newPassword">New Password</label>
                <label><input type="checkbox" onclick="toggleVisibility('np')" id="show-np-password"></label>
            </div>
            <input type="password" name="np" id="np" placeholder="New Password" required>
        </div>
        <br>

        <div class="main-input">
            <label for="confirmNewPassword">Confirm New Password</label>
            <input type="password" id="confirmNewPassword" name="c_np" placeholder="Confirm New Password" required>
        </div>
        <br>

        <button type="submit">CHANGE</button>
        <a href="home.php" class="ca">HOME</a>
    </form>
    <script>
    function validateForm() {
        var oldPassword = document.getElementById("op").value;
        var newPassword = document.getElementById("np").value;
        var confirmNewPassword = document.getElementById("confirmNewPassword").value;

        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

        if (!passwordPattern.test(newPassword)) {
            alert("New password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and be at least 8 characters long.");
            return false;
        }

        if (newPassword !== confirmNewPassword) {
            alert("New password and confirm password do not match.");
            return false;
        }

        return true;
    }

    function toggleVisibility(fieldId) {
        var field = document.getElementById(fieldId);
        var checkbox = document.getElementById("show-" + fieldId + "-password");
        field.type = checkbox.checked ? "text" : "password";
    }
    </script>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
