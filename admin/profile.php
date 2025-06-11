

           <?php
           session_start();
require_once '../includes/db.php';
require '../creater-dashboard/header.php';
     $upload_message = '';


$user_email = $_SESSION[ 'user_email' ];
$error = '';
$user_v = $conn->prepare( 'SELECT * FROM user_data WHERE `user_email` = ?' );
$user_v->bind_param( 's', $user_email );
$user_v->execute();
$result = $user_v->get_result();
if ( $result->num_rows === 1 ) {
    $user = $result->fetch_assoc();   
     
    
    
    
    
    
    
    
    
    ?>
<body class = 'bg-gray-900 text-gray-100 font-sans antialiased'>

<div class = 'flex min-h-screen'>
        <div class="flex-1 flex flex-col main-content-wrapper md:ml-64">
            <!-- Header -->
            <header class="bg-gray-800 shadow-md p-4 flex items-center justify-between z-40">
                <button id="sidebar-toggle-btn" class="text-gray-400 hover:text-white md:hidden focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl sm:text-2xl font-semibold text-white ml-4 md:ml-0">User Profile</h1>
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search..."
                            class="bg-gray-700 text-gray-100 placeholder-gray-400 rounded-lg py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-32 md:w-48 transition-all duration-200 text-sm">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>

                    <div class="relative">
                        <button id="notifications-button" class="text-gray-400 hover:text-white relative focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-2">
                            <i class="fas fa-bell text-xl"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                        <div id="notifications-menu"
                            class="absolute right-0 mt-2 w-64 bg-gray-700 rounded-md shadow-lg py-1 hidden z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">New message from
                                Jane</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Order #1234
                                shipped</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">You have 1 new
                                follower</a>
                        </div>
                    </div>

                    <div class="relative">
                        <button id="profile-button"
                            class="flex items-center space-x-1 sm:space-x-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-1">
                            <img class="h-8 w-8 sm:h-9 sm:w-9 rounded-full object-cover"
                                src='<?php echo $_SESSION["user_profile"]? $_SESSION["user_profile"]: " https://placehold.co/150x150/808080/FFFFFF?text=JD" ?>' alt="User Avatar">
                            <span class="hidden sm:inline text-gray-200 text-sm"><?php echo $_SESSION["user_name"]?></span>
                            <i class="fas fa-chevron-down text-gray-400 text-xs hidden sm:inline"></i>
                        </button>
                        <div id="profile-menu"
                            class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg py-1 hidden z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-600 rounded-md">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 bg-gray-900">
                <?php // require '../admin/profile.php'; ?> 
     

    <section class = 'dark bg-gray-900 h-screen flex items-center justify-center'>
    <div class = 'flex items-center justify-center min-h-[calc(100vh-16rem)] max-w-[700px] w-full mx-auto'>
    <form method = 'POST' class = 'max-w-[700px] w-full mx-auto bg-gray-900 text-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-700' enctype="multipart/form-data">
    <h2 class = 'text-2xl font-bold text-center text-white'>Your Profile</h2>
    <div class = 'space-y-2'><?php echo $error;
    ?></div>
    <div class = 'space-y-2'>
    <label for = 'username' class = 'block text-sm font-medium'>Name</label>
    <input type = 'text' id = 'username' name = 'username' value = '<?php echo $user['user_name'];?>'

    class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>

    <div class = 'space-y-2'>
    <label for = 'current_password' class = 'block text-sm font-medium'>
    Current Password
    <button type = 'button' onclick = 'togglePasswordFields()'

    class = 'ml-2 px-3 py-1 text-xs font-medium text-blue-400 hover:text-white border border-blue-500 hover:bg-blue-600 rounded-md transition duration-200'>
    Change Password
    </button>
    </label>
    <input type = 'password' id = 'current_password' name = 'current_password' value = '<?php echo $user ['user_orgpass']; ?>'

    class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>

    <div id = 'change-password-fields' class = 'space-y-2 hidden'>
    <div class = 'space-y-2'>
    <label for = 'new_password' class = 'block text-sm font-medium'>New Password</label>
    <input type = 'password' id = 'new_password' name = 'new_password'

    class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>

    <div class = 'space-y-2'>
    <label for = 'confirm_password' class = 'block text-sm font-medium'>Confirm New Password</label>
    <input type = 'password' id = 'confirm_password' name = 'confirm_password'

    class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>
    </div>

    <div class = 'space-y-2'>
    <label for = 'email' class = 'block text-sm font-medium'>Email</label>
    <input type = 'email' id = 'email' name = 'email' value = '<?php  echo $user [ 'user_email' ] ?>' class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>

    <div class = 'space-y-2'>
    <label for = 'phone' class = 'block text-sm font-medium'>Phone</label>
    <input type = 'text' id = 'phone' name = 'phone' value = '<?php echo $user [ 'user_phone' ]; ?>'

    class = 'w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500'>
    </div>

       <div class="space-y-2">
            <label for="user_role_select" class="block text-sm font-medium text-gray-300">User Role</label>
            <div class="relative">
                <select id="user_role_select" name="user_role"
                    class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           text-white appearance-none pr-8 cursor-pointer">
                    <option value="1">Customer</option>
                    <option value="0">Creator</option>
                </select>
                <!-- Custom arrow for select box in dark theme -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>

       <div class="space-y-2">
        <label for="profile-image" class="block text-sm font-medium text-gray-300">Profile Image</label>
                      
                
               <input type="file" id="product-image" name="product_image"
                       class="custom-file-input w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                              focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                       accept="image/png, image/jpeg, image/gif">
                <p class="text-gray-400 text-sm mt-1">Accepted: JPG, PNG, GIF. Max size: 5MB.</p>
            </div>

    <input type = 'submit' value = 'Save Changes' name = 'submit'

    class = 'w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200 cursor-pointer'>
    <span class = 'block pt-1 text-center'> Please <a href = '#' class = 'underline text-blue-600 hover:text-blue-800'>click here</a> to register.</span>
    </form>
    </div>

    </section>

    <script>

    function togglePasswordFields() {
        const section = document.getElementById( 'change-password-fields' );
        section.classList.toggle( 'hidden' );
    }
    </script>

    <?php
     $refresh="";
    if ( isset( $_POST[ 'submit' ] ) ) {
        $error = 'request submint';
   

    $target_dir = "../profile-images/";
$uploadOk = 1;
$file = $_FILES['product_image'];
$imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$target_file = $target_dir . basename($file['name']);
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];


// Check if file is a real image
if (!getimagesize($file['tmp_name'])) {
    echo "Not a valid image.";
    $uploadOk = 0;
}

// Check file size (5MB max)
if ($file["size"] > 5 * 1024 * 1024) {
    echo "File is too large.";
    $uploadOk = 0;
}

// Check file type
if (!in_array($imageFileType, $allowed_types)) {
    echo "Only JPG, JPEG, PNG, and GIF allowed.";
    $uploadOk = 0;
}

// Upload file
if ($uploadOk && move_uploaded_file($file["tmp_name"], $target_file)) {
    $upload_message = "<p class='text-green'>Uploaded successfully: <a href='$target_file'>{$file['name']}</a></p>";
    $profile_image = $target_file;
} else if ($uploadOk) {
    $upload_message = "<p class='text-red'>Failed to upload file.</p>";
     $profile_image = "placeholder not found";
}


    $product_image = $target_file;



            $user_name = $_POST[ 'username' ];
            $user_password_raw = $_POST[ 'current_password' ] ;
            $user_password = password_hash( $user_password_raw, PASSWORD_DEFAULT );
            $user_email_s = $_POST[ 'email' ];
            $user_phone = $_POST[ 'phone' ];
            $user_role = $_POST[ 'user_role' ];

            $user_email = $_POST[ 'email' ];

            $user_u = $conn->prepare( 'UPDATE user_data SET  user_name = ?, user_password = ?, user_orgpass = ?,  user_phone = ?, profile_image = ?, user_role = ? WHERE user_email = ?' );
            $user_u->bind_param( 'sssssss', $user_name, $user_password, $user_password_raw, $user_phone, $profile_image, $user_role,  $user_email );
            
            
            if ( $user_u->execute() ) {
                // session_unset();
                $_SESSION[ 'id' ] = $user [ 'id' ];
                $_SESSION[ 'user_name' ] = $user [ 'user_name' ];
                $_SESSION[ 'user_password' ] = $user [ 'user_password' ];
                $_SESSION[ 'user_orgpass' ] = $user [ 'user_orgpass' ];
                $_SESSION[ 'user_email' ] = $user [ 'user_email' ];
                $_SESSION[ 'user_phone' ] = $user [ 'user_phone' ];
                $_SESSION[ 'user_profile' ] = $user [ 'profile_image'];
                $_SESSION[ 'user_role' ] = $user [ 'user_role' ];
                $error = "<p style='color:green;' class='error-msg'>Everythings Update.</p>";
            $refresh = `
                        <div id="logout-popup-overlay" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
                            <!-- Popup Content -->
                            <div id="logout-popup-content" class="bg-gray-800 rounded-lg shadow-xl p-8 max-w-sm w-full mx-4 relative">
                                <!-- Close Button (optional, but good for UX) -->
                                <button id="close-popup-btn" class="absolute top-4 right-4 text-gray-400 hover:text-gray-200 focus:outline-none">
                                    <i class="fas fa-times text-xl"></i>
                                </button>

                                <h2 class="text-2xl font-bold text-white text-center mb-6">Confirm Logout</h2>
                                <p class="text-center text-gray-300 mb-8">Are you sure you want to log out?</p>

                                <div class="flex flex-col space-y-4">
                                    <button id="confirm-logout-btn" class="w-full py-3 bg-red-600 text-white font-semibold rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                    <button id="cancel-logout-btn" class="w-full py-3 bg-gray-600 text-white font-semibold rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>`;
            
            }
            ;
        };

} else {

    ?> <p style = 'color:red;'>not data found.</p>
    <?php
}
$user_v->close();

?>
<div><?php echo $refresh ;?></div>
                <?php //require 'product.php'; ?>
                <div class="">
                <?php //require './add-product.php'; ?>
        </div>
               

                <!-- Footer -->
                <footer class="mt-6 sm:mt-8 text-center text-gray-500 text-xs sm:text-sm">
                    &copy; 2025 Responsive Dark Dashboard. All rights reserved.
                </footer>
            </main>
        </div>

    <?php require '../creater-dashboard/sidebar.php';?>
</div>
