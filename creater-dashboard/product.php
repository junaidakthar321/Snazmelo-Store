 <?php
 session_start();
require_once '../includes/db.php';
require  "header.php";
 $product_author = $_SESSION[ 'id' ];
 $get_data = $conn->prepare('SELECT * FROM product_data WHERE product_author = ? ');
 $get_data->bind_param("i" , $product_author);
 $get_data->execute();
 $product_data =  $get_data->get_result();
   


?>

 <body class='bg-gray-900 text-gray-100 font-sans antialiased'>

     <div class='flex min-h-screen'>

         <div class="flex-1 flex flex-col main-content-wrapper md:ml-64">
             <!-- Header -->
             <header class="bg-gray-800 shadow-md p-4 flex items-center justify-between z-40">
                 <button id="sidebar-toggle-btn"
                     class="text-gray-400 hover:text-white md:hidden focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-2">
                     <i class="fas fa-bars text-xl"></i>
                 </button>
                 <h1 class="text-xl sm:text-2xl font-semibold text-white ml-4 md:ml-0">Products Overview</h1>

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

             <!-- Main Content Area -->
             <main class="flex-1 overflow-y-auto p-4 sm:p-6 bg-gray-900">
                 <section class="min-h-screen flex flex-col items-center p-6 bg-gray-900 text-gray-100 font-sans">

                     <h1 class="text-4xl md:text-5xl font-bold text-center mb-12 text-white">
                         Discover Our Collection
                     </h1>

                     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
                         <div class="w-full max-w-6xl text-center mt-12">
                         </div>
                         <div class="w-full max-w-6xl text-center mt-12">
                             <a href='<?php echo $url."/creater-dashboard/add-product.php";?>' class="block py-4 px-                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                10 rounded-full text-xl font-semibold
                              bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg
                              hover:from-blue-700 hover:to-blue-900
                              focus:outline-none focus:ring-4 focus:ring-blue-300
                              transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95">
                                 Add Product
                             </a>
                         </div>
                         <div class="w-full max-w-6xl text-center mt-12">

                         </div>
                         <?php  if ( $product_data->num_rows ) {
                                    while($product = $product_data->fetch_assoc()):
                                    $error = "<p style='color:red;' class='error-msg'>Email already existe.</p>";
                                    ?>
                         <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden p-6 flex flex-col items-center text-center
                        transform transition-all duration-300 hover:scale-105">
                             <img src=" <?php echo $product['product_image'];?>" alt="Awesome Product 1"
                                 class="w-full h-48 object-cover rounded-md mb-4 shadow-md">
                             <h2 class="text-2xl font-semibold mb-2 text-white">
                                 <?php echo $product['product_name'];?>
                             </h2>
                             <p class="text-xl font-bold text-blue-300 mb-3">
                                 <?php echo $product['product_price'];?>
                             </p>
                             <div class="flex items-center space-x-1 text-gray-400 text-sm mb-5">
                                 <span class="text-yellow-400">⭐</span>
                                 <span>4.8 (1.2k reviews)</span>
                             </div>
                             <a href="#" class="w-full py-3 px-6 rounded-full text-lg font-medium
                                  bg-gradient-to-r from-purple-600 to-indigo-700 text-white shadow-lg
                                  hover:from-purple-700 hover:to-indigo-800
                                  focus:outline-none focus:ring-4 focus:ring-purple-500
                                  transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                                 More Details
                             </a>
                         </div>

                         <?php  endwhile; 
                            } else {
                                $error = "<p style='color:red;' class='error-msg'>Email not found.</p>";
                            }
                            ?>
                         <div class="w-full max-w-6xl text-center mt-12">

                         </div>

                         <div class="w-full max-w-6xl text-center mt-12">
                         </div>
                     </div>

                 </section>

                 <!-- Main Content Wrapper -->
                 <?php require './sidebar.php';?>
         </div>