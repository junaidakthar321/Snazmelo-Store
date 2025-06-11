


<header class="bg-gray-800 text-white p-4 shadow-md dark:bg-gray-900">
  <div class="container mx-auto flex items-center justify-between">

    
    <nav class="hidden md:flex space-x-4">
      <a href="#" class="hover:text-gray-300">Home</a>
      <a href="#" class="hover:text-gray-300">Dashboard</a>
      <a href="#" class="hover:text-gray-300">Settings</a>
    </nav>

    
    <div class="flex-grow flex justify-center">
      <a href="/" class="text-2xl font-bold text-white hover:text-gray-200">
        <img src="your-logo.png" alt="Logo" class="h-8 w-auto">
      </a>
    </div>

    
    <div class="relative">
      <button
        id="logout-dropdown-button"
        class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
      >
        <img
          class="h-8 w-8 rounded-full"
          src="https://via.placeholder.com/150"
          alt="User Avatar"
        />
        <span class="hidden md:inline">John Doe</span>
        <svg
          class="h-5 w-5"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </button>

      
      <div
        id="logout-dropdown-menu"
        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden dark:bg-gray-700 dark:ring-white dark:ring-opacity-10"
      >
        <a
          href="#"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
        >
          Profile
        </a>
        <a
          href="#"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
        >
          Settings
        </a>
        <a
          href="#"
          class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600"
        >
          Sign out
        </a>
      </div>
    </div>

  </div>
</header>
<script src="./assets/css/tailwind.css"></script>