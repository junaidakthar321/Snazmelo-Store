<?php
session_start();
require_once '../includes/db.php';

$error = '';




if ( $_SERVER [ 'REQUEST_METHOD' ] == 'POST' ) {

    $user_name = $_POST[ 'username' ];
    $user_password_raw =$_SESSION[ 'user_password' ] ;
    $user_password = password_hash( $user_password_raw, PASSWORD_DEFAULT );
    $user_email_s = $_SESSION[ 'user_email' ];
    $user_phone = $_POST[ 'phone' ];
    $user_role = $_POST[ 'user_role' ];

    $user_email = $_POST['email'];
    $user_id = $_SESSION['id'];
    $user_u = $conn->prepare( 'UPDATE user_data SET  user_name = ?, user_password = ?, user_orgpass = ?,  user_phone = ?, user_role = ? WHERE id = ?' );
    $user_u->bind_param( 'sssssi', $user_name, $user_password, $user_password_raw, $user_phone, $user_role,  $user_id );
    $user_u->execute();
    if ( $user_u->execute() ) {
        $user_v = $conn->prepare( 'SELECT * FROM user_data WHERE user_email = ?' );
        $user_v->bind_param( 's', $user_email );
        $user_v->execute();
        $update = $user_v->get_result();
        $update_user = $update->fetch_assoc();

        $error = "<p style='color:green;' class='error-msg'>Everythings Update.</p>";

         $_SESSION[ 'id' ] = $update_user [ 'id' ];
         $_SESSION[ 'user_name' ] = $update_user [ 'user_name' ];
         $_SESSION[ 'user_password' ] = $update_user [ 'user_password' ];
         $_SESSION[ 'user_orgpass' ] = $update_user [ 'user_orgpass' ];
         $_SESSION[ 'user_email' ] = $update_user [ 'user_email' ];
         $_SESSION[ 'user_phone' ] = $update_user [ 'user_phone' ];
         $_SESSION[ 'user_role' ] = $update_user [ 'user_role' ];
    }
    ;
}


?>


<section class='dark bg-gray-900 h-screen flex items-center justify-center'>
    <div class="flex items-center justify-center min-h-[calc(100vh-16rem)] max-w-[700px] w-full mx-auto">
        <form method="POST"
            class="max-w-[700px] w-full mx-auto bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-700">
            <h2 class="text-2xl font-bold text-center text-white">Your Profile</h2>
            <div class='space-y-2'><?php echo $error;?></div>
            <div class="space-y-2">
                <label for="username" class="block text-sm font-medium">Name</label>
                <input type='text' id='username' name='username' value=<?php echo $_SESSION[ 'user_name' ];?>
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="space-y-2">
                <label for="current_password" class="block text-sm font-medium">
                    Current Password
                    <button type="button" onclick="togglePasswordFields()"
                        class="ml-2 px-3 py-1 text-xs font-medium text-blue-400 hover:text-white border border-blue-500 hover:bg-blue-600 rounded-md transition duration-200">
                        Change Password
                    </button>
                </label>
                <input type="password" id="current_password" name="current_password" value="********"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div id="change-password-fields" class="space-y-2 hidden">
                <div class="space-y-2">
                    <label for="new_password" class="block text-sm font-medium">New Password</label>
                    <input type="password" id="new_password" name="new_password"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label for="confirm_password" class="block text-sm font-medium">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type='email' id='email' name='email' value=<?php echo $_SESSION[ 'user_email' ];?>
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="space-y-2">
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input type="text" id="phone" name="phone" value="123-456-7890"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="space-y-2">
                <label for="user_role" class="block text-sm font-medium">Role</label>
                <input type="text" id="user_role" name="user_role" value="Admin" readonly
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-not-allowed">
            </div>

            <input type="submit" value="Save Changes" name="submit"
                class="w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200 cursor-pointer">
            <span class="block pt-1 text-center"> Please <a href="#"
                    class="underline text-blue-600 hover:text-blue-800">click here</a> to register.</span>
        </form>
    </div>


</section>

<script>
function togglePasswordFields() {
    const section = document.getElementById("change-password-fields");
    section.classList.toggle("hidden");
}
</script>