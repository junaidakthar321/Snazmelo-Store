<?php
require_once '../includes/db.php';

$error = '';
if ( $_SERVER [ 'REQUEST_METHOD' ] == 'POST' ) {

    $user_name = $_POST[ 'username' ];
    $user_email = $_POST[ 'email' ];
    $user_phone = $_POST[ 'phone' ];
    $user_role = $_POST[ 'user_role' ];
    $user_v = $conn->prepare( 'SELECT * FROM user_data WHERE user_email = ?' );
    $user_v->bind_param( 's', $user_email );
    $user_v->execute();
    $user_password_raw = $_POST[ 'password' ];
    $user_password = password_hash( $user_password_raw, PASSWORD_DEFAULT );
    $result = $user_v->get_result();

    if ( $result->num_rows === 1 ) {
        $user_v->close();

        $error = "<p style='color:red;' class='error-msg'>Email already existe.</p>";
    } else {
        // $error = "<p style='color:red;' class='error-msg'>Email not found.</p>";
        $add_ud = $conn->prepare( 'INSERT INTO user_data (user_name, user_password, user_orgpass, user_email, user_phone, user_role) VALUES (?, ?, ?,?, ?, ?)' );
        $add_ud->bind_param( 'sssssi', $user_name, $user_password, $user_password_raw, $user_email, $user_phone, $user_role );
        
        if ( $add_ud->execute() ) {
            header( 'Location: login.php' );
        }
    }

}

?>
<script src='../assets/css/tailwind.css'></script>
<section class='dark bg-gray-900 h-screen flex items-center justify-center'>
    <form method='POST'
        class='max-w-[390px] w-full mx-auto bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border'>
        <h2 class='text-2xl font-bold text-center text-white'>Register</h2>
        <div class='space-y-2'>
            <?php echo $error;
?>
        </div>
        <div class='space-y-2'>
            <label for='username' class='block text-sm font-medium'>Name</label>
            <input type='text' id='username' name='username'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <div class='space-y-2'>
            <label for='password' class='block text-sm font-medium'>Password</label>
            <input type='password' id='password' name='password'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <div class='space-y-2'>
            <label for='email' class='block text-sm font-medium'>Email</label>
            <input type='email' id='email' name='email'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <div class='space-y-2'>
            <label for='phone' class='block text-sm font-medium'>Phone</label>
            <input type='text' id='phone' name='phone'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <div class="space-y-2">
            <label for="user_role_select" class="block text-sm font-medium text-gray-300">User Role</label>
            <div class="relative">
                <select id="user_role_select" name="user_role" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           text-white appearance-none pr-8 cursor-pointer">
                    <option value="1">Customer</option>
                    <option value="0">Creator</option>
                </select>
                <!-- Custom arrow for select box in dark theme -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>

        <input type='submit' value='Submit' name='submit'
            class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>
        <span class='block pt-1'> Please <a href='./login.php' class='underline text-blue-600 hover:text-blue-800'>click
                here</a> to register.</span>
    </form>
</section>