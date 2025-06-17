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
                    <li><a href="#"
                            class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Home</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Products</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">About</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition duration-200">Contact</a>
                    </li>
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
            <a href="#products"
                class="inline-block bg-white dark:bg-gray-200 text-indigo-700 dark:text-indigo-900 hover:bg-gray-100 dark:hover:bg-gray-300 text-lg font-semibold px-8 py-4 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Explore Products
            </a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="container mx-auto px-4 py-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-gray-200">Featured Products
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php  if ( $product_data->num_rows  ) {
                                    while($product = $product_data->fetch_assoc()):
                                    $error = "<p style='color:red;' class='error-msg'>Email already existe.</p>";
                                    ?>
            <!-- Product Card 1 -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
                <img src="<?php echo $product ['product_image']?>" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2 text-gray-800 dark:text-gray-200">
                        <?php echo $product ['product_name']?></h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        <?php echo $product ['product_description']?></p>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="text-2xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo $product ['product_price']?></span>
                        <span class="text-sm text-green-600 dark:text-green-400">In Stock</span>
                    </div>
                    <button id="openPanelBtn" class="block w-full bg-indigo-600 text-white text-center py-3 rounded-md hover:bg-indigo-700 transition duration-200 font-semibold shadow-md">View Details</button>
                </div>
            </div>
            <?php  endwhile; 
                            } else {
                                $error = "<p style='color:red;' class='error-msg'>Email not found.</p>";
                            }
                            ?>

        </div>
    </section>
<!-- side pannel -->
 <div>

    <!-- Side Panel Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black z-40 sidebar-overlay"></div>

    <!-- Product Details Side Panel -->
    <div id="productSidebar" class="sidebar fixed top-0 right-0 h-full w-full max-w-sm bg-gray-800 shadow-2xl z-50 overflow-y-auto p-6">
        <!-- Close Button -->
        <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-white text-3xl focus:outline-none">
            &times; <!-- HTML entity for multiplication sign, commonly used for close -->
        </button>

        <h2 id="sidebarTitle" class="text-3xl font-bold text-blue-400 mb-6 border-b border-gray-700 pb-4">Product Name Goes Here</h2>

        <div class="flex flex-col items-center mb-6">
            <!-- Product Image -->
            <img id="sidebarImage" src="https://placehold.co/400x300/1f2937/a8a29e?text=Product+Image" alt="Product Image" class="w-full h-48 object-cover rounded-lg mb-4 shadow-md">

            <!-- Product Description -->
            <p id="sidebarDescription" class="text-gray-300 text-center mb-4 leading-relaxed">
                This is a detailed description of the product. It highlights its key features, benefits, and specifications. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

            <!-- Price Information -->
            <div class="flex items-baseline mb-4">
                <span id="sidebarPrice" class="text-4xl font-extrabold text-green-400 mr-2">$99.99</span>
                <span id="sidebarOldPrice" class="text-lg text-gray-500 line-through">$129.99</span>
            </div>
        </div>

        <!-- Quantity Selector -->
        <div class="mb-6">
            <label for="quantity" class="block text-gray-300 text-sm font-medium mb-2">Quantity:</label>
            <div class="flex items-center border border-gray-700 rounded-lg overflow-hidden">
                <button id="decreaseQuantity" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-lg font-bold focus:outline-none rounded-l-md">-</button>
                <input type="number" id="quantity" value="1" min="1" class="w-20 text-center bg-gray-800 text-white border-none focus:ring-0 focus:outline-none appearance-none [-moz-appearance:_textfield] [&::-webkit-outer-spin-button]:m-0 [&::-webkit-inner-spin-button]:m-0">
                <button id="increaseQuantity" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-lg font-bold focus:outline-none rounded-r-md">+</button>
            </div>
        </div>

        <!-- Add to Cart Button -->
        <button id="addToCartBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
            Add to Cart
        </button>

        <p class="text-gray-500 text-xs text-center mt-6">Product ID: <span id="sidebarProductId">PID-12345</span></p>

    </div>

 </div>
    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 py-8 mt-16 shadow-inner rounded-t-lg">
        <div class="container mx-auto px-4 text-center text-gray-600 dark:text-gray-400">
            <p>&copy; 2023 Our Store. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#"
                    class="text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition duration-200">Privacy
                    Policy</a>
                <a href="#"
                    class="text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition duration-200">Terms
                    of Service</a>
            </div>
        </div>
    </footer>

</body>
  <script>
        // Get references to the HTML elements
        const openPanelBtn = document.getElementById('openPanelBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const productSidebar = document.getElementById('productSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        const quantityInput = document.getElementById('quantity');
        const decreaseQuantityBtn = document.getElementById('decreaseQuantity');
        const increaseQuantityBtn = document.getElementById('increaseQuantity');
        const addToCartBtn = document.getElementById('addToCartBtn');

        // Function to open the sidebar
        function openSidebar() {
            productSidebar.classList.add('sidebar-open');
            sidebarOverlay.classList.add('overlay-active');

            // Example: Populate with dummy data if needed (in a real app, this would come from a product card click)
            document.getElementById('sidebarTitle').textContent = 'My Awesome Product';
            document.getElementById('sidebarDescription').textContent = 'This product is designed for simplicity and efficiency. It features a sleek design, durable materials, and intuitive controls. Get yours today!';
            document.getElementById('sidebarPrice').textContent = '$99.99';
            document.getElementById('sidebarOldPrice').textContent = '$129.99';
            document.getElementById('sidebarImage').src = 'https://placehold.co/400x300/4a5568/a8a29e?text=Awesome+Product';
            document.getElementById('sidebarProductId').textContent = 'DEMO-PROD-001';
            quantityInput.value = 1; // Reset quantity
        }

        // Function to close the sidebar
        function closeSidebar() {
            productSidebar.classList.remove('sidebar-open');
            sidebarOverlay.classList.remove('overlay-active');

            // Add an event listener to hide the panel fully after the transition
            // This prevents the hidden panel from potentially blocking clicks
            productSidebar.addEventListener('transitionend', function handler() {
                if (!productSidebar.classList.contains('sidebar-open')) {
                    // Only run if the sidebar is actually closing
                    productSidebar.style.display = 'none'; // Ensure display is none after transition
                    sidebarOverlay.style.display = 'none';
                }
                productSidebar.removeEventListener('transitionend', handler); // Clean up listener
            }, { once: true }); // Ensure this handler only runs once
        }

        // Event listener to open the panel
        openPanelBtn.addEventListener('click', () => {
            // First, ensure elements are 'block' for transitions to work
            productSidebar.style.display = 'block';
            sidebarOverlay.style.display = 'block';
            // Then call openSidebar with a slight delay to allow display change to register
            setTimeout(openSidebar, 10);
        });

        // Event listeners to close the panel
        closeSidebarBtn.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar); // Close when clicking outside on the overlay

        // Quantity controls
        decreaseQuantityBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseQuantityBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        // "Add to Cart" button action (inside the sidebar)
        addToCartBtn.addEventListener('click', () => {
            const productId = document.getElementById('sidebarProductId').textContent;
            const quantity = quantityInput.value;
            const productName = document.getElementById('sidebarTitle').textContent;
            alert(`Added ${quantity} of "${productName}" (ID: ${productId}) to cart!`);
            closeSidebar(); // Close panel after adding to cart
            // In a real application, you'd send this data to your backend
            // or update a global cart state.
        });

        // Initial setup to ensure elements are hidden correctly
        productSidebar.style.display = 'none';
        sidebarOverlay.style.display = 'none';
    </script>
<script>
const dropdownButton = document.getElementById('logout-dropdown-button');
const dropdownMenu = document.getElementById('logout-dropdown-menu');
dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
}); // Close dropdown if clicked outsidewindow.addEventListener('click', (event) => { if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) { dropdownMenu.classList.add('hidden'); } });
</script>