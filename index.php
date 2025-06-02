

<?php 
require_once './includes/header.php'; 
?>
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full bg-white dark:bg-gray-800 p-8 rounded-lg shadow-xl text-center">
    <div class="mb-6">
      <svg class="mx-auto h-20 w-20 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
    </div>
    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
      Under Maintenance!
    </h1>
    <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
      We're currently performing some essential maintenance to improve your shopping experience.
    </p>
    <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
      We apologize for any inconvenience this may cause.
    </p>
 
    <div class="mt-8">
      <p class="text-md font-medium text-gray-700 dark:text-gray-200">
        We expect to be back online shortly. Please check back soon!
      </p>
      </div>
 
    <div class="mt-8 flex justify-center space-x-4">
      <a href="./admin/login.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
        Login
      </a>
      </div>
  </div>
</section>
<script>
const dropdownButton = document.getElementById('logout-dropdown-button');   const dropdownMenu = document.getElementById('logout-dropdown-menu');   dropdownButton.addEventListener('click', () => {     dropdownMenu.classList.toggle('hidden');   });   // Close dropdown if clicked outsidewindow.addEventListener('click', (event) => { if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) { dropdownMenu.classList.add('hidden'); } });

</script>