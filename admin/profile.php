<?php
require_once '../includes/db.php'; 
 $error = "";
 session_start();

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
   
    // $user_name = $_POST["username"];
    $user_password_raw = $_POST["password"];
    $user_password = password_hash($user_password_raw, PASSWORD_DEFAULT);
    $user_email = $_POST["email"];
    $user_phone = $_POST["phone"];
    $user_role= $_POST["user_role"];
    $user_v = $conn->prepare("SELECT * FROM user_data WHERE user_email = ?");
    $user_v->bind_param("s", $user_email);
    $user_v->execute();
    $result = $user_v->get_result();

    if($result->num_rows === 1) {
      $user_v->close(); 
      $error = "<p style='color:red;' class='error-msg'>Email already existe.</p>";
    } else {

      $add_ud = $conn->prepare("INSERT INTO user_data (user_name, user_password, user_email, user_phone, user_role) VALUES (?, ?, ?, ?, ?)");
      $add_ud->bind_param("ssssi", $user_name, $user_password, $user_email, $user_phone, $user_role);
      $add_ud->execute();
    }

   
 
}

?>
<script src="../assets/css/tailwind.css"></script>
<section class="dark bg-gray-900 h-screen flex items-center justify-center">
<form method="POST" class="max-w-[390px] w-full mx-auto bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border">
  <h2 class="text-2xl font-bold text-center text-white">Profile</h2>
   <div class="space-y-2">
            <?php echo $error;?>
        </div>
  <div class="space-y-2">
    <label for="username" class="block text-sm font-medium">Name</label>
    <input type="text" id="username" name="username"value= <?php echo $_SESSION["user_name"]; ?>
           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <div class="space-y-2">
    <label for="password" class="block text-sm font-medium">Password</label>
    <input type="password" id="password" name="password" value= <?php echo $_SESSION["user_password"]; ?>
           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <div class="space-y-2">
    <label for="email" class="block text-sm font-medium">Email</label>
    <input type="email" id="email" name="email" value= <?php echo $_SESSION["user_email"]; ?>
           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <div class="space-y-2">
    <label for="phone" class="block text-sm font-medium">Phone</label>
    <input type="text" id="phone" name="phone" value= <?php echo $_SESSION["user_phone"]; ?>
           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <div class="space-y-2">
    <label for="user_role" class="block text-sm font-medium">Role</label>
    <input type="text" id="user_role" name="user_role" value= <?php echo $_SESSION["user_role"]; ?>
           class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <input type="submit" value="Submit" name="submit"
         class="w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200">
          <span class="block pt-1"> Please <a href="../index.php" class="underline text-blue-600 hover:text-blue-800">click here</a> to register.</span>
</form>
</section>
