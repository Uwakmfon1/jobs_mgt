<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Navigation Bar */
    .navbar {
        background: #333;
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar ul {
        list-style: none;
        display: flex;
        margin-left: 30%;
    }

    .navbar ul li {
        margin: 0 15px;
    }

    .navbar ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

    /* Main Layout */
    .container {
        display: flex;
        height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        width: 200px;
        background: #444;
        color: white;
        padding: 20px;
        height: 100vh;
    }

    .sidebar ul {
        list-style: none;
        padding: 10px 0;
    }

    .sidebar ul li {
        padding: 10px;
    }

    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
    }

    /* Main Content */
    .content {
        flex: 1;
        padding: 20px;
    }




    @media screen and (max-width: 768px) {
        /* .navbar {
            display: none;
        } */

        .sidebar {
            /* width: 100%; */
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
        .navbar ul li a{
            display: none;

        }
    }

    @media screen and (max-width:640){

    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
        .navbar ul li a{
            display:none;
        }
    }
</style>

<body>

    <nav class="navbar hidden bg-gray-200 flex p-4 place-content-between items-center text-white md:flex space-x-6">
        <ul>
            <li><a href="#" class="hover:text-gray-300">Dashboard</a></li>
            <li><a href="#" class="hover:text-gray-300">Users</a></li>
            <li><a href="#" class="hover:text-gray-300">Settings</a></li>
        </ul>

        <!-- Profile & Mobile Menu -->
        <div class="flex items-center space-x-4">
            <button class="hidden md:block bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500">Logout</button>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden focus:outline-none" id="mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        </div>
    </nav>

    {{-- mobile menu --}}
    <div class=" md:hidden hidden" id="mobile-menu">
        <nav class="flex flex-col space-y-2 p-4 bg-gray-800">
            <a href="#" class="hover:text-gray-300">Dashboard</a>
            <a href="#" class="hover:text-gray-300">Users</a>
            <a href="#" class="hover:text-gray-300">Settings</a>
            <button class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500">Logout</button>
        </nav>
    </div>


    <div class="container">
        <aside class="sidebar">
            <h2>logo</h2>
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </aside>


        <div class="content">
            {{ $slot }}
        </div>
    </div>






    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
