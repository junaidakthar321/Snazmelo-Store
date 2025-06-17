<?php

function uploadImage($fileInputName, $uploadDir = "upload/", $allowedTypes = ["jpeg", "jpg", "png"], $maxSize = 2097152, $oldFile = null) {
    if (!isset($_FILES[$fileInputName])) {
        return ['error' => 'No file uploaded.'];
    }

    $file = $_FILES[$fileInputName];
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_tmp = $file['tmp_name'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $errors = [];

    // Validate file extension
    if (!in_array($file_ext, $allowedTypes)) {
        $errors[] = "Please choose a JPG or PNG file.";
    }

    // Validate file size
    if ($file_size > $maxSize) {
        $errors[] = "File size must be 2MB or lower.";
    }

    // If no errors, move the uploaded file
    if (empty($errors)) {
        $new_file_name = time() . "-" . basename($file_name);
        $target_path = rtrim($uploadDir, '/') . '/' . $new_file_name;

        if (!move_uploaded_file($file_tmp, $target_path)) {
            return ['error' => 'Failed to upload the file.'];
        }

        // Delete old file if specified and exists
        if ($oldFile && file_exists($uploadDir . $oldFile)) {
            unlink($uploadDir . $oldFile);
        }

        return [
            'success' => true,
            'file_name' => $new_file_name,
            'path' => $target_path
        ];
    } else {
        return ['error' => implode(" ", $errors)];
    }
}

?>