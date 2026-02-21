<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS for Inter font and general styling -->
    <style>
    body {
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
        /* Prevent horizontal scroll due to sidebar positioning */
    }

    /* Ensure sidebar transitions smoothly */
    aside {
        transition: transform 0.3s ease-in-out;
    }

    /* Adjust main content wrapper for sidebar on desktop */
    .main-content-wrapper {
        transition: margin-left 0.3s ease-in-out;
    }

    /* Mobile sidebar overlay */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 40;
        display: none;
        /* Hidden by default */
    }

    .sidebar-open .sidebar-overlay {
        display: block;
    }

    .sidebar-open aside {
        transform: translateX(0%);
    }

    aside.hidden-mobile {
        transform: translateX(-100%);
    }

    @media (min-width: 768px) {
        aside {
            transform: translateX(0%) !important;
            /* Always visible on desktop */
        }

        .main-content-wrapper {
            margin-left: 16rem !important;
            /* Always offset on desktop */
        }
    }
    </style>
</head>