<?php
require_once 'includes/db.php'; 

if ($_SERVER ["REQUEST_METHOD"] == "POST") {

   $user_name = $_POST["username"];
   $user_password = $_POST["password"];
   $user_email = $_POST["email"];
   $user_phone = $_POST["phone"];
   $user_role= $_POST["user_role"];
   $add_ud = "INSERT INTO user_data (user_name, user_password, user_email, user_phone, user_role)
           VALUES ('$user_name', '$user_password', '$user_email', '$user_phone', '$user_role')";
    if (mysqli_query($conn, $add_ud)) {
        echo "User registered successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}










?>
<form method = "POST">
    <div class="form-details">
        <label for = "username">Name</label>
        <input type="text" id = "username" name = "username">
    </div>
    <div class="form-details">
        <label for = "password">Password</label>
        <input type="text" id = "password" name = "password">
    </div>
    <div class="form-details">
        <label for = "email">Email</label>
        <input type="text" id = "email" name = "email">
    </div>
    <div class="form-details">
        <label for = "phone">Phone</label>
        <input type="text" id = "phone" name = "phone">
    </div>
    <div class="form-details">
        <label for = "user_role">Role</label>
        <input type="text" id = "user_role" name = "user_role">
    </div>
    <input type="submit" value = "submit" name = "submit">
    <p>Ayan Bsdk</p>
</form>