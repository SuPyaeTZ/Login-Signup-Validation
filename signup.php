<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    <script>      
   $(document).ready(function() {
    // Function to generate a random CAPTCHA code
    function generateCaptcha() {
        return Math.random().toString(36).substring(2, 8).toUpperCase();
    }

    // Function to refresh CAPTCHA code
    $('#refresh_captcha').click(function() {
        var newCaptcha = generateCaptcha();
        $('#captcha_code').text(newCaptcha);
    });

    // Form submission validation
    $('form').submit(function() {
        var name = $('input[name="name"]').val();
        var username = $('input[name="uname"]').val();
        var password = $('input[name="password"]').val();
        var rePassword = $('input[name="re_password"]').val();

        // Validate name
        if (name.trim() === '') {
            alert("Name is required");
            return false;
        }

        // Validate username
        if (username.trim() === '') {
            alert("Username is required");
            return false;
        }

        // Validate password
        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
        if (!passwordPattern.test(password)) {
            alert("Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and be at least 8 characters long.");
            return false;
        }

        // Validate re-entered password
        if (password !== rePassword) {
            alert("Passwords do not match");
            return false;
        }

        // Verify reCAPTCHA
        var response = $('input[name="captcha_code"]').val().toUpperCase();
        var captchaCode = $('#captcha_code').text().toUpperCase();
        if (response !== captchaCode) {
            alert("CAPTCHA code is incorrect");
            return false;
        }

        // Allow form submission
        return true;
    });
    

    // Function to generate a random CAPTCHA code
    function generateCaptcha() {
        return Math.random().toString(36).substring(2, 8).toUpperCase();
    }
});
    </script>
</head>
<body>
<?php
    function generateCaptcha() {
        return substr(md5(uniqid(mt_rand(), true)), 0, 6);
    }
   ?>
   
   <?php
// PHP validation
  function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = isset($_GET['name']) ? sanitizeInput($_GET['name']) : '';
$uname = isset($_GET['uname']) ? sanitizeInput($_GET['uname']) : '';

// Further server-side validation can be added here
?>
 <?php
   $name = ""; // Initialize $name variable
   $uname = ""; // Initialize $uname variable
   
   // Check if the variables are set before using them
   if (isset($_POST['name'])) {
       $name = $_POST['name'];
   }
   
   if (isset($_POST['uname'])) {
       $uname = $_POST['uname'];
   }

   // Validate Full Name
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST['name']);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

      
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
<form action="signup-check.php" method="post" onsubmit="return validateForm()">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        
        <label>Full Name</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>"><br>

        <label>User Name</label>
        <input type="text" id="uname" name="uname" placeholder="User Name" value="<?php echo $uname; ?>"><br>

           <div class="main-input">
                <div class="password">
                    <label for="password">Password</label>
                     <label><input type="checkbox" onclick="toggleVisibility('password')" id="show-password1"></label>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Password"> 
                </div>

           <div class="main-input">
                    <div class="password">
                        <label for="re_password">Confirm Password</label>
                        <label><input type="checkbox" onclick="toggleVisibility('re_password')" id="show-password2"></label>
                    </div>
                    <input type="password" id="re_password" name="re_password" placeholder="Confirm Password"> 
            </div>

        
            <label for="captcha_code">CAPTCHA Code: <span id="captcha_code"><?php echo generateCaptcha(); ?></span></label><br>
            <input type="text" id="captcha_input" name="captcha_code" placeholder="Enter CAPTCHA Code" required><br>
        
        <button type="submit">Sign Up</button>
        <p>Already have an account?<a href="index.php" class="ca">Login</a></p>
       
    </form>
    <script>
        function toggleVisibility(id) {  
        var passwordField = document.getElementById(id);  
        passwordField.type = passwordField.type === "password" ? "text" : "password";  
    } 

// JavaScript validation
  document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('name').addEventListener('input', function() {
    var name = this.value;
    if (!name.match(/^[a-zA-Z ]*$/)) {
      alert('Name can only contain letters and spaces.');
      this.value = ''; // Clear the input
    }
  });
        
        document.getElementById("uname").addEventListener("input", function() {
            var nameRegex = /^[a-zA-Z-' ]*$/;
            if (!nameRegex.test(this.value)) {
                alert('Username can only contain letters and numbers.');
            } else {
                this.setCustomValidity("");
            }
        });


  document.getElementById('uname').addEventListener('input', function() {
    var uname = this.value;
    if (!uname.match(/^[a-zA-Z0-9]*$/)) {
      alert('Username can only contain letters and numbers.');
      this.value = ''; // Clear the input
    }
  });
});

    function validateForm() {
    var name = document.getElementById("name").value;
    var uname = document.getElementById("uname").value;
    var password = document.getElementById("password").value;
    var re_password = document.getElementById("re_password").value;
    var captcha_code = document.getElementById("captcha_input").value;

    if (name == "") {
        alert("Name must be filled out");
        return false;
    }
    if (uname == "") {
        alert("User Name must be filled out");
        return false;
    }
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    if (re_password == "") {
        alert("Confirm Password must be filled out");
        return false;
    }
    if (captcha_code == "") {
        alert("CAPTCHA Code must be filled out");
        return false;
    }
    // You can add more validation rules as needed
}
        function toggleVisibility(id) {
        var passwordInput = document.getElementById(id);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
        }
</script>

</body>
</html>
