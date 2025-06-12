<?php
session_start();
require_once '../includes/db.php';
$error = '';
// Initialize a variable to hold the upload message
$upload_message = '';
 
if (isset($_POST['submit'])) {
    $target_dir = "../uploads/";
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
       $upload_message = "<p class='text-green'>Uploaded successfully: <a href='$target_file'>$file[name]</a></p>";
    } else if ($uploadOk) {
        $upload_message = "<p class='text-green'>Failed to upload file.</p>";
    }

    $product_name = $_POST[ 'product_name' ];
    $product_price = $_POST[ 'product_price' ];
    $product_description = $_POST[ 'product_description' ];
    $product_image = $target_file;
    $product_author = $_SESSION[ 'id' ];
    $product_status = 0;
    $product_data = $conn->prepare( 'INSERT INTO product_data (product_name, product_price, product_description, product_image, product_author, product_status) VALUES (?, ?, ?, ?, ?, ?)' );
    $product_data->bind_param("sissii", $product_name, $product_price, $product_description, $product_image, $product_author , $product_status);
    $product_data->execute();
}

?>

<?php
  require "header.php"
?>



<section class="w-full bg-gray-800 shadow-2xl p-8 w-full mx-auto h-screen">

    <h1 class="text-4xl font-bold text-center mb-10 text-white">
        Add New Product
    </h1>

    <!-- Form action updated to submit to the same page for PHP processing -->
    <form action="" method="POST" class="space-y-6 max-w-[700px] mx-auto" enctype="multipart/form-data">
        <!-- Product Name Input -->
        <div>
            <label for="product-name" class="block text-gray-300 text-lg font-medium mb-2">Product Name</label>
            <input type="text" id="product-name" name="product_name" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                              focus:ring-2 focus:ring-purple-500 focus:border-transparent
                              placeholder-gray-400 text-base" placeholder="e.g., Ultra Smartwatch X" required>
        </div>

        <!-- Price Input -->
        <div>
            <label for="product-price" class="block text-gray-300 text-lg font-medium mb-2">Price ($)</label>
            <input type="number" id="product-price" name="product_price" step="0.01" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                              focus:ring-2 focus:ring-purple-500 focus:border-transparent
                              placeholder-gray-400 text-base" placeholder="e.g., 199.99" required min="0">
        </div>

        <!-- Description Textarea -->
        <div>
            <label for="product-description" class="block text-gray-300 text-lg font-medium mb-2">Description</label>
            <textarea id="product-description" name="product_description" rows="5" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                                 focus:ring-2 focus:ring-purple-500 focus:border-transparent
                                 placeholder-gray-400 text-base resize-y"
                placeholder="Provide a detailed description of the product..." required></textarea>
        </div>

        <!-- Image URL Input -->
        <div>
            <label for="product-image" class="block text-gray-300 text-lg font-medium mb-2">Product Image</label>
            <input type="file" id="product-image" name="product_image" class="custom-file-input w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                              focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                accept="image/png, image/jpeg, image/gif">
            <p class="text-gray-400 text-sm mt-1">Accepted: JPG, PNG, GIF. Max size: 5MB.</p>
        </div>

        <!-- Submit Button -->
        <button type="submit" name="submit" class="w-full py-4 px-6 rounded-full text-xl font-semibold
                           bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg
                           hover:from-blue-700 hover:to-blue-900
                           focus:outline-none focus:ring-4 focus:ring-blue-300
                           transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95">
            Add Product
        </button>

        <?php echo $upload_message; ?>
    </form>

</section>