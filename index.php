
<script src="./assets/css/tailwind.css"></script>
<?php 
session_start();
require_once 'includes/db.php';

 $product_author = $_SESSION[ 'user_name' ];
 $get_data = $conn->prepare('SELECT * FROM product_data WHERE product_author = ? ');
 $get_data->bind_param("i" , $product_author);
 $get_data->execute();
 $product_data =  $get_data->get_result();

?>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen">

    <!-- Header (Optional - Can be extended later) -->
    <header class="bg-white dark:bg-gray-800 shadow-sm py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Our Store</a>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Home</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Products</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">About</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Banner Section -->
    <section class="bg-indigo-700 dark:bg-indigo-900 text-white py-20 md:py-32 rounded-b-lg shadow-lg">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 animate-fade-in-down">
                Discover Amazing Products
            </h1>
            <p class="text-lg md:text-xl mb-10 opacity-90 animate-fade-in-up">
                High-quality items for every need. Shop now and experience the difference!
            </p>
            <a href="#products" class="inline-block bg-white dark:bg-gray-200 text-indigo-700 dark:text-indigo-900 hover:bg-gray-100 dark:hover:bg-gray-300 text-lg font-semibold px-8 py-4 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Explore Products
            </a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="container mx-auto px-4 py-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-gray-200">Featured Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
           <?php  if ( $product_data->num_rows ) {
                                    while($product = $product_data->fetch_assoc()):
                                    $error = "<p style='color:red;' class='error-msg'>Email already existe.</p>";
                                    ?>
            <!-- Product Card 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
                <img src="<?php echo $product ['product_image']?>" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2 text-gray-800 dark:text-gray-200"><?php echo $product ['product_name']?></h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4"><?php echo $product ['product_description']?></p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo $product ['product_price']?></span>
                        <span class="text-sm text-green-600 dark:text-green-400">In Stock</span>
                    </div>
                    <a href="#" class="block w-full bg-indigo-600 text-white text-center py-3 rounded-md hover:bg-indigo-700 transition duration-200 font-semibold shadow-md">View Details</a>
                </div>
            </div>
                                   <?php  endwhile; 
                            } else {
                                $error = "<p style='color:red;' class='error-msg'>Email not found.</p>";
                            }
                            ?>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 py-8 mt-16 shadow-inner rounded-t-lg">
        <div class="container mx-auto px-4 text-center text-gray-600 dark:text-gray-400">
            <p>&copy; 2023 Our Store. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition duration-200">Privacy Policy</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition duration-200">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
<script>
const dropdownButton = document.getElementById('logout-dropdown-button');   const dropdownMenu = document.getElementById('logout-dropdown-menu');   dropdownButton.addEventListener('click', () => {     dropdownMenu.classList.toggle('hidden');   });   // Close dropdown if clicked outsidewindow.addEventListener('click', (event) => { if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) { dropdownMenu.classList.add('hidden'); } });

</script>