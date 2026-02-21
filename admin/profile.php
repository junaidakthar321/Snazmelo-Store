<?php
session_start();
require_once '../includes/db.php';
require '../creater-dashboard/header.php';
require '../creater-dashboard/topbar.php';
require '../includes/functions.php';
$upload_message = '';
$user_email = $_SESSION['user_email'];
$error = '';

$user_v = $conn->prepare('SELECT * FROM user_data WHERE `user_email` = ?');
$user_v->bind_param('s', $user_email);
$user_v->execute();
$result = $user_v->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        $target_dir = "profile-images/";
        $profile_image = uploadImage('profile_img', '../profile-images/' );

        if (isset($profile_image['success'])) {
            $upload_message ="Image uploaded successfully: " . $profile_image['file_name'];
            $new_profile_img =  $url . $target_dir . $profile_image['file_name'];
        } else {
            $upload_message = "Error: " . $profile_image['error'];
            $new_profile_img =  $_SESSION['user_profile'];
        }
        
        $user_name = $_POST['username'];
        $user_password_raw = $_POST['current_password'];
        $user_password = password_hash($user_password_raw, PASSWORD_DEFAULT);
        $user_email_s = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_role = $_POST['user_role'];
        print_r($new_profile_img);
        $user_u = $conn->prepare('UPDATE user_data SET user_name = ?, user_password = ?, user_orgpass = ?, user_phone = ?, profile_image = ?, user_role = ? WHERE user_email = ?');
        $user_u->bind_param('sssssss', $user_name, $user_password, $user_password_raw, $user_phone, $new_profile_img, $user_role, $user_email_s);
    
        if ($user_u->execute()) {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email_s;
            $_SESSION['user_phone'] = $user_phone;
            $_SESSION['user_profile'] =  $new_profile_img;
            $_SESSION['user_role'] = $user_role;
            $error = "<p style='color:green;'>Everything Updated.</p>";
        }
    }
?>


<main class="flex-1 overflow-y-auto p-4 sm:p-6 bg-gray-900">
    <section class='dark bg-gray-900 h-screen flex items-center justify-center'>
        <div class='flex items-center justify-center min-h-[calc(100vh-16rem)] max-w-[700px] w-full mx-auto'>
            <form method='POST' enctype="multipart/form-data"
                class='max-w-[700px] w-full mx-auto bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-700'>

                <h2 class='text-2xl font-bold text-center text-white'>Your Profile</h2>
                <div class='space-y-2'><?php echo $error; ?></div>

                <div class='space-y-2'>
                    <label for='username' class='block text-sm font-medium'>Name</label>
                    <input type='text' id='username' name='username' value='<?php echo $user['user_name']; ?>'
                        class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
                </div>

                <div class='space-y-2'>
                    <label for='current_password' class='block text-sm font-medium'>
                        Current Password
                        <button type='button' onclick='togglePasswordFields()'
                            class='ml-2 px-3 py-1 text-xs font-medium text-blue-400 hover:text-white border border-blue-500 hover:bg-blue-600 rounded-md transition duration-200'>
                            Change Password
                        </button>
                    </label>
                    <input type='password' id='current_password' name='current_password'
                        value='<?php echo $user['user_orgpass']; ?>'
                        class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
                </div>

                <div id='change-password-fields' class='space-y-2 hidden'>
                    <label for='new_password' class='block text-sm font-medium'>New Password</label>
                    <input type='password' id='new_password' name='new_password'
                        class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>

                    <label for='confirm_password' class='block text-sm font-medium'>Confirm New
                        Password</label>
                    <input type='password' id='confirm_password' name='confirm_password'
                        class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
                </div>

                <label for='email' class='block text-sm font-medium'>Email</label>
                <input type='email' id='email' name='email' value='<?php echo $user['user_email']; ?>'
                    class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>

                <label for='phone' class='block text-sm font-medium'>Phone</label>
                <input type='text' id='phone' name='phone' value='<?php echo $user['user_phone']; ?>'
                    class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>

                <label for='user_role_select' class='block text-sm font-medium text-gray-300'>User
                    Role</label>
                <select id='user_role_select' name='user_role'
                    class='block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-white cursor-pointer'>
                    <option value='1' <?php echo $user['user_role'] == '1' ? 'selected' : ''; ?>>Customer
                    </option>
                    <option value='0' <?php echo $user['user_role'] == '0' ? 'selected' : ''; ?>>Creator
                    </option>
                </select>

                <label for='profile-image' class='block text-sm font-medium text-gray-300'>Profile
                    Image</label>
                <input type='file' id='profile-image' name='profile_img'
                    class='w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-purple-500'
                    accept='image/png, image/jpeg, image/gif'>

                <input type='submit' value='Save Changes' name='submit'
                    class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200 cursor-pointer'>
            </form>
        </div>
    </section>



    <footer class="mt-6 sm:mt-8 text-center text-gray-500 text-xs sm:text-sm">
        &copy; 2025 Responsive Dark Dashboard. All rights reserved.
    </footer>
</main>
</div>
<?php require '../creater-dashboard/sidebar.php'; ?>
</div>
</body>
<?php
} else {
    echo "<p style='color:red;'>No data found.</p>";
}
$user_v->close();
?>
<script>
function togglePasswordFields() {
    const section = document.getElementById('change-password-fields');
    section.classList.toggle('hidden');
}
</script>