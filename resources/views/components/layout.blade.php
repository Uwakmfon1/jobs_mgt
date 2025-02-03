<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <header class="bg-gray-900 text-white shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
          <!-- Logo -->
          <div class="text-xl font-bold">Admin Panel</div>

          <!-- Navigation -->
          <nav class="hidden md:flex space-x-6">
            <a href="#" class="hover:text-gray-300">Dashboard</a>
            <a href="#" class="hover:text-gray-300">Users</a>
            <a href="#" class="hover:text-gray-300">Settings</a>
          </nav>

          <!-- Profile & Mobile Menu -->
          <div class="flex items-center space-x-4">
            <button class="hidden md:block bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500">Logout</button>

            <!-- Mobile Menu Button -->
            <button class="md:hidden focus:outline-none" id="mobile-menu-button">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
          <nav class="flex flex-col space-y-2 p-4 bg-gray-800">
            <a href="#" class="hover:text-gray-300">Dashboard</a>
            <a href="#" class="hover:text-gray-300">Users</a>
            <a href="#" class="hover:text-gray-300">Settings</a>
            <button class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500">Logout</button>
          </nav>
        </div>
    </header>


    {{ $slot }}
      <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
        });
      </script>
</body>
</html>
