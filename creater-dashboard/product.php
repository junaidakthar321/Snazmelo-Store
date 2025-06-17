 <?php
 session_start();
require_once '../includes/db.php';
require  "header.php";
require  "./topbar.php";
 $product_author = $_SESSION[ 'user_name' ];
 $get_data = $conn->prepare('SELECT * FROM product_data WHERE product_author = ? ');
 $get_data->bind_param("i" , $product_author);
 $get_data->execute();
 $product_data =  $get_data->get_result();



?>


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
                 <<<<<<< Updated upstream <img src=" <?php echo $product['product_image'];?>" alt="Awesome Product 1"
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
                     <a href='<?php echo $url."/creater-dashboard/product-details.php?prod=".$product['product_id'];?>'
                         class="w-full py-3 px-6 rounded-full text-lg font-medium
=======
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
>>>>>>> Stashed changes
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