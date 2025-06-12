      <div class="flex-1 flex flex-col main-content-wrapper md:ml-64">
          <!-- Header -->
          <header class="bg-gray-800 shadow-md p-4 flex items-center justify-between z-40">
              <button id="sidebar-toggle-btn"
                  class="text-gray-400 hover:text-white md:hidden focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-2">
                  <i class="fas fa-bars text-xl"></i>
              </button>
              <h1 class="text-xl sm:text-2xl font-semibold text-white ml-4 md:ml-0">Dashboard Overview</h1>

              <div class="flex items-center space-x-2 sm:space-x-4">
                  <div class="relative hidden sm:block">
                      <input type="text" placeholder="Search..."
                          class="bg-gray-700 text-gray-100 placeholder-gray-400 rounded-lg py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-32 md:w-48 transition-all duration-200 text-sm">
                      <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                          <i class="fas fa-search"></i>
                      </span>
                  </div>

                  <div class="relative">
                      <button id="notifications-button"
                          class="text-gray-400 hover:text-white relative focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-2">
                          <i class="fas fa-bell text-xl"></i>
                          <span
                              class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                      </button>
                      <div id="notifications-menu"
                          class="absolute right-0 mt-2 w-64 bg-gray-700 rounded-md shadow-lg py-1 hidden z-50">
                          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">New
                              message from
                              Jane</a>
                          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">Order
                              #1234
                              shipped</a>
                          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md">You
                              have 1 new
                              follower</a>
                      </div>
                  </div>

                  <div class="relative">
                      <button id="profile-button"
                          class="flex items-center space-x-1 sm:space-x-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-1">
                          <img class="h-8 w-8 sm:h-9 sm:w-9 rounded-full object-cover"
                              src="https://placehold.co/150x150/808080/FFFFFF?text=JD" alt="User Avatar">
                          <span class="hidden sm:inline text-gray-200 text-sm">John Doe</span>
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
              <?php // require '../admin/profile.php'; ?>
              <?php //require 'product.php'; ?>
              <div class="">
                  <?php require './add-product.php'; ?>
              </div>
              <!-- Stat Cards -->
              <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6">
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <h2 class="text-lg sm:text-xl font-semibold text-gray-100">Total Sales</h2>
                            <i class="fas fa-dollar-sign text-2xl sm:text-3xl text-green-500"></i>
                        </div>
                        <p class="text-2xl sm:text-3xl font-bold text-white mb-1 sm:mb-2">$12,345</p>
                        <p class="text-xs sm:text-sm text-gray-400">+5.2% from last month</p>
                        <button id="generate-sales-insight-btn"
                            class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Generate Sales Insights ✨
                        </button>
                        <div id="sales-insight-output" class="mt-4 text-sm text-gray-300 italic"></div>
                    </div>

                    <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6">
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <h2 class="text-lg sm:text-xl font-semibold text-gray-100">New Users</h2>
                            <i class="fas fa-user-plus text-2xl sm:text-3xl text-blue-500"></i>
                        </div>
                        <p class="text-2xl sm:text-3xl font-bold text-white mb-1 sm:mb-2">789</p>
                        <p class="text-xs sm:text-sm text-gray-400">-1.8% from last month</p>
                    </div>

                    <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6">
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <h2 class="text-lg sm:text-xl font-semibold text-gray-100">Orders Pending</h2>
                            <i class="fas fa-hourglass-half text-2xl sm:text-3xl text-yellow-500"></i>
                        </div>
                        <p class="text-2xl sm:text-3xl font-bold text-white mb-1 sm:mb-2">45</p>
                        <p class="text-xs sm:text-sm text-gray-400">Requires immediate attention</p>
                    </div>
                </div> -->

              <!-- Recent Activity Section -->
              <!-- <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-100 mb-4 sm:mb-6">Recent Activity</h2>
                    <ul id="activity-list" class="divide-y divide-gray-700">
                        <li class="py-2 sm:py-3 flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <span
                                    class="bg-indigo-500 rounded-full h-7 w-7 sm:h-8 sm:w-8 flex items-center justify-center text-white text-xs sm:text-sm">JD</span>
                                <div>
                                    <p class="font-medium text-white text-sm sm:text-base">John Doe updated profile.</p>
                                    <p class="text-xs sm:text-sm text-gray-400">5 minutes ago</p>
                                </div>
                            </div>
                            <span class="text-gray-400 text-xs sm:text-sm">Settings</span>
                        </li>
                        <li class="py-2 sm:py-3 flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <span
                                    class="bg-green-500 rounded-full h-7 w-7 sm:h-8 sm:w-8 flex items-center justify-center text-white text-xs sm:text-sm"><i
                                        class="fas fa-shopping-cart"></i></span>
                                <div>
                                    <p class="font-medium text-white text-sm sm:text-base">New order received #5678.</p>
                                    <p class="text-xs sm:text-sm text-gray-400">1 hour ago</p>
                                </div>
                            </div>
                            <span class="text-gray-400 text-xs sm:text-sm">Sales</span>
                        </li>
                        <li class="py-2 sm:py-3 flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <span
                                    class="bg-red-500 rounded-full h-7 w-7 sm:h-8 sm:w-8 flex items-center justify-center text-white text-xs sm:text-sm"><i
                                        class="fas fa-exclamation-triangle"></i></span>
                                <div>
                                    <p class="font-medium text-white text-sm sm:text-base">Critical error in server
                                        logs.</p>
                                    <p class="text-xs sm:text-sm text-gray-400">3 hours ago</p>
                                </div>
                            </div>
                            <span class="text-gray-400 text-xs sm:text-sm">System</span>
                        </li>
                    </ul>
                    <button id="summarize-activity-btn"
                        class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                        Summarize Activity Log ✨
                    </button>
                    <div id="activity-summary-output" class="mt-4 text-sm text-gray-300 italic"></div>
                </div> -->

              <!-- Latest Transactions Table -->
              <!-- <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-100 mb-4 sm:mb-6">Latest Transactions</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Transaction ID
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <tr>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-200">
                                        #TRN001</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-green-400">
                                        $250.00</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-400">
                                        2025-05-30</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-200">
                                        #TRN002</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-red-400">$50.00
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                            Failed
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-400">
                                        2025-05-29</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-200">
                                        #TRN003</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-yellow-400">
                                        $120.00</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-sm text-gray-400">
                                        2025-05-28</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

              <!-- Footer -->
              <footer class="mt-6 sm:mt-8 text-center text-gray-500 text-xs sm:text-sm">
                  &copy; 2025 Responsive Dark Dashboard. All rights reserved.
              </footer>
          </main>
      </div>