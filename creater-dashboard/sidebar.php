<!-- Sidebar -->
 <?php
    $url = "http://localhost/Snazmelo-Store";
 ?>
        <aside class="w-64 bg-gray-800 shadow-lg fixed inset-y-0 left-0 z-50 flex-col md:flex hidden-mobile">
            <div class="p-6 border-b border-gray-700">
                <a href="#" class="text-2xl font-bold text-indigo-500">Creator Dashboard</a>
            </div>
            <nav class="flex-grow p-4 space-y-2">
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home w-5 h-5"></i>
                    <span>Home</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg bg-gray-700 text-white transition-colors duration-200">
                    <i class="fas fa-chart-line w-5 h-5"></i>
                    <span>Analytics</span>
                </a>
                <a href='<?php echo  $url."/admin/profile.php";?>'

                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <i class="fas fa-users w-5 h-5"></i>
                    <span>Profile</span>
                </a>
                <a href="<?php echo  $url."/creater-dashboard/product.php";?>" class="flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200" >
                <i class="fas fa-box w-5 h-5"></i>
                    <span>Products</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <i class="fas fa-cog w-5 h-5"></i>
                    <span>Settings</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <i class="fas fa-sign-in-alt w-5 h-5"></i>
                    <span>Log In</span>
                </a>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <a href="../admin/logout.php"
                    class="flex items-center space-x-3 p-3 rounded-lg text-red-400 hover:bg-gray-700 hover:text-red-300 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt w-5 h-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>