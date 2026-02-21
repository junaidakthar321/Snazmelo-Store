<?php
    require_once "../includes/db.php";
    $current_path = $_SERVER['REQUEST_URI'];
 ?>

<body class='bg-gray-900 text-gray-100 font-sans antialiased'>
    <div class='flex min-h-screen'>
        <div class="flex-1 flex flex-col main-content-wrapper md:ml-64">
            <header class="bg-gray-800 shadow-md p-4 flex items-center justify-between z-40">
                <button id="sidebar-toggle-btn"
                    class="text-gray-400 hover:text-white md:hidden focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl sm:text-2xl font-semibold text-white ml-4 md:ml-0">
                    <?= strpos($current_path, 'admin/profile.php') !== false ? 'Profile Overview' : '' ?>
                    <?= strpos($current_path, 'creater-dashboard/product.php') !== false ? 'Products Overview' : '' ?>
                </h1>

                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search..."
                            class="bg-gray-700 text-gray-100 placeholder-gray-400 rounded-lg py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-32 md:w-48 transition-all duration-200 text-sm">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>

                    <div class="relative">
                        <button id="profile-button"
                            class="flex items-center space-x-1 sm:space-x-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-1">
                            <img class="h-8 w-8 sm:h-9 sm:w-9 rounded-full object-cover"
                                src='<?php echo $_SESSION["user_profile"]? $_SESSION["user_profile"]: " https://placehold.co/150x150/808080/FFFFFF?text=JD" ?>'
                                alt="User Avatar">
                            <span
                                class="hidden sm:inline text-gray-200 text-sm"><?php echo $_SESSION["user_name"]?></span>
                            <i class="fas fa-chevron-down text-gray-400 text-xs hidden sm:inline"></i>
                        </button>
                        <div id="profile-menu"
                            class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg py-1 hidden z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Your
                                Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-600 rounded-md">Sign
                                out</a>
                        </div>
                    </div>
                </div>
            </header>