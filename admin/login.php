<?php
require_once '../includes/db.php';

session_start();
$error = '';
if ( isset( $_POST[ 'submit' ] ) ) {
    if ( $_SERVER [ 'REQUEST_METHOD' ] == 'POST' ) {

        $user_email = $_POST[ 'email' ];
        $user_password_raw = $_POST[ 'password' ];

        $user_password = password_hash( $user_password_raw, PASSWORD_DEFAULT );
        $user_v = $conn->prepare( 'SELECT * FROM user_data WHERE user_email = ?' );
        $user_v->bind_param( 's', $user_email );
        $user_v->execute();
        $result = $user_v->get_result();
    }
    if ( $result->num_rows === 1 ) {
        $user = $result->fetch_assoc();

        if ( password_verify( $user_password_raw, $user[ 'user_password' ] ) ) {
            $_SESSION[ 'id' ] = $user [ 'id' ];
            $_SESSION[ 'user_name' ] = $user [ 'user_name' ];
            $_SESSION[ 'user_password' ] = $user [ 'user_password' ];
            $_SESSION[ 'user_orgpass' ] = $user [ 'user_orgpass' ];
            $_SESSION[ 'user_email' ] = $user [ 'user_email' ];
            $_SESSION[ 'user_phone' ] = $user [ 'user_phone' ];
            $_SESSION[ 'user_role' ] = $user [ 'user_role' ];
            $_SESSION['user_profile'] = $user ['profile_image'];
            header( 'Location: ../creater-dashboard/index.php' );
        } else {
            $error = "<p style='color:red;'>Incorrect password.</p>";

        }
    } else {
        $user = $result->fetch_assoc();
        $error = "<p style='color:red;' class='error-msg'>Email not found.</p>" ;

    }
}

?>
<script src='../assets/css/tailwind.css'></script>
<section class='dark bg-gray-900 h-screen flex items-center justify-center'>
    <form method='POST'
        class='max-w-[390px] w-full mx-auto  bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border'>
        <h2 class='text-2xl font-bold text-center text-white'>login</h2>

        <div class='space-y-2'>
            <?php echo $error;
?>
        </div>
        <div class='space-y-2'>
            <label for='email' class='block text-sm font-medium'>Email</label>
            <input type='email' id='email' name='email'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <div class='space-y-2'>
            <label for='password' class='block text-sm font-medium'>Password</label>
            <input type='password' id='password' name='password'
                class='w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
        </div>

        <input type='submit' value='Submit' name='submit'
            class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>

        <span class='block pt-1'> Please <a href='./registration.php'
                class='underline text-blue-600 hover:text-blue-800'>click here</a> to register.</span>
    </form>
</section>