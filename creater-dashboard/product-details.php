
<?php 
session_start();
require_once '../includes/db.php';
require 'header.php';

$hasFile = isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0;
$productId = isset($_GET['prod']) ? $_GET['prod'] : 'prod123'; 
$is_editing = false;
$is_reading = true;

  $product_edit = $conn->prepare('SELECT * FROM product_data WHERE product_id = ? ');
 $product_edit->bind_param("i" , $productId);
 $product_edit->execute();
 $product_data =  $product_edit->get_result();
  if($product_data->num_rows) {
   $product = $product_data->fetch_assoc();
  }else {
     $error = "<p style='color:red;' class='error-msg'>Data not found.</p>";
  }
  if(isset( $_POST[ 'edit-product' ] ) ){
    $is_editing = true;
    $is_reading = false;
  }
$upload_message = '';
 

   



    

   if(isset($_POST['save-changes'])){
 
    $target_dir = "../uploads/";
    $uploadOk = 1;
    $file = $_FILES['product_image'];
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $target_file = $target_dir . basename($file['name']);
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        
    // Check if file is a real image

   if ($hasFile) {
    if (!getimagesize($_FILES['product_image']['tmp_name'])) {
        echo "Not a valid image.";
        $uploadOk = 0;
    }
    if ($file["size"] > 5 * 1024 * 1024) {
            echo "File is too large.";
            $uploadOk = 0;
        }

        // Check file type
        if (!in_array($imageFileType, $allowed_types)) {
            echo "No image is uploaded";
            $uploadOk = 0;
        }
} else {
  $uploadOk = 1;
}
print_r($uploadOk);
    // Check file size (5MB max)
        
        


    // Upload file
    
 
 
    
 
    $product_name = $_POST[ 'product_name' ];
    $product_price = $_POST[ 'product_price' ];
    $product_description = $_POST[ 'product_description' ];
    $product_image = $target_file;
    $product_status = 0;
    if ($uploadOk == 1 && move_uploaded_file($file["tmp_name"], $target_file )) {
        $upload_message = "<p class='text-green'>Uploaded successfully: <a href='$target_file'>$file[name]</a></p>";
        $product_data = $conn->prepare( 'UPDATE product_data SET product_name = ?, product_price = ?, product_description = ?, product_image = ?,  product_status = ? WHERE product_id = ? ');
        $product_data->bind_param("sissii", $product_name, $product_price, $product_description, $product_image, $product_status, $productId );
    } else if($uploadOk = 0){
        $upload_message = "<p class='text-green'>Failed to upload file.</p>";
        $product_data = $conn->prepare( 'UPDATE product_data SET product_name = ?, product_price = ?, product_description = ?, , product_status = ? WHERE product_id = ? ');
        $product_data->bind_param("sissii", $product_name, $product_price, $product_description,  $product_status, $productId );
       
    }else{
        
    }
       $product_data->execute();
    }


  if(isset( $_POST[ 'cancel-product' ] ) ){
    $is_editing = false;
    $is_reading = true;
  }

  if(isset( $_POST[ 'delete_product' ] ) ){
    print_r("hsdghfsduihguishdgui");
    $delete_data = $conn->prepare( 'DELETE FROM product_data WHERE product_id = ? ');
           $delete_data->bind_param("i", $productId );
           $delete_data->execute();  
            header("Location: product.php"); 
    exit;
}

?>

    <div class="font-sans antialiased h-[100vh] text-gray-900 bg-gray-100 dark:bg-gray-900  bg-white dark:bg-gray-800 shadow-2xl overflow-hidden  mx-auto flex flex-col lg:flex-row w-full">
        <!-- Product Image Section -->
        <div class="lg:w-1/2 p-6 flex items-center justify-center bg-gray-50 dark:bg-gray-700">
            <img
                src="<?php echo $product["product_image"]?>"
                alt=""
                class="w-full h-auto object-contain rounded-lg shadow-md max-h-96"
            />
        </div>

        <!-- Product Details/Edit Form Section -->
        <div class="lg:w-1/2 p-8 flex flex-col justify-between ">
                <!-- Edit Form -->
                 <?php
                 if($is_editing) {      
?>
 <div class = "">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">Edit Product</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit_product">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="product_name"
                                    value="<?php echo $product ["product_name"] ?>"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    required
                                />
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea
                                    id="description"
                                    name="product_description"
                                    rows=""
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    required
                                ><?php echo $product["product_description"] ?></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                                    <input
                                        type="number"
                                        id="price"
                                        name="product_price"
                                        value="<?php echo $product["product_price"]?>"
                                        step="0.01"
                                        class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                        required
                                    />
                                </div>
                                <div>
                                    <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">stock</label>
                                    <input
                                        type="text"
                                        id="stock"
                                        name="stock"
                                        value='1515'
                                        class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">status</label>
                                <input
                                    type="text"
                                    id="category"
                                    name="category"
                                    value='<?php echo $product["product_status"] == 0 ? 'out of stock':'available';?>'
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    required
                                />
                            </div>
                              <div>
            <label for="product-image" class="block text-gray-300 text-lg font-medium mb-2">Product Image</label>
            <input type="file" id="product-image" name="product_image" value = "<?php echo $product['product_image']?>" class="custom-file-input w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600
                              focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                accept="image/png, image/jpeg, image/gif">
            <p class="text-gray-400 text-sm mt-1">Accepted: JPG, PNG, GIF. Max size: 5MB.</p>
        </div>
                        </div>
                        <div class="mt-6 flex space-x-4">
                            <input
                                value ="Save Changes"
                                name ="save-changes"
                                type="submit"
                                class="flex-1 py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-200"
                            >
                                                            
               
                            <input type='submit' value=' Cancel' name='cancel-product'
                                class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>
                          
                            <!-- <button
                                type="button"
                                class="flex-1 py-3 px-6 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                            >
                                Cancel
                            </button> -->
                        </div>
                    </form>
                </div>
<?php
                 
                 }
                 ?>
               
            
                <!-- Display Mode -->
                <?php if($is_reading){ ?>
                <div class = "h-[100vh]">
                    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100 mb-4"><?php echo $product["product_name"]?></h1>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6"><?php echo $product["product_description"]?></p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="p-4 bg-blue-50 dark:bg-blue-950 rounded-lg shadow-sm">
                            <p class="text-sm font-medium text-blue-700 dark:text-blue-300">Price</p>
                            <p class="text-xl font-bold text-blue-900 dark:text-blue-100 mt-1">$<?php echo $product["product_price"]?></p>
                        </div>
                        <div class="p-4 bg-green-50 dark:bg-green-950 rounded-lg shadow-sm">
                            <p class="text-sm font-medium text-green-700 dark:text-green-300">author</p>
                            <p class="text-xl font-bold text-green-900 dark:text-green-100 mt-1"><?php echo $product["product_author"]?></p>
                        </div>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm mb-6">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Status</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200 mt-1"><?php echo $product["product_status"] == 0 ? 'out of stock':'available';?></p>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <form method="POST" action="" class="flex-1">
                            
                            <input type='submit' value=' Edit Product' name='edit-product'
                                class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>
                      
                                <input type='submit' value=' Delete Product' name = "delete_product"
                                         class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>
                        </form>
                            </div>
                </div>
                <?php };?>
        </div>
    </div>

    <!-- Delete Confirmation Modal (Hidden by default) -->
    <div id="deleteConfirmModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-sm text-center">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Confirm Deletion</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Are you sure you want to delete "<span class="font-semibold"></span>"? This action cannot be undone.</p>
            <div class="flex space-x-4">
                <form method="POST" action="" class="flex-1">
                    <input type='submit' value=' Delete' name='delete'
                                class='w-full py-2 mt-4 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-200'>
                   
                </form>
                <button
                    onclick="hideDeleteConfirmModal()"
                    class="flex-1 py-2 px-4 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <script>
      
    </script>

</body>
</html>
