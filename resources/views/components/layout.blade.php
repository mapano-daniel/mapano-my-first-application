<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple-Inspired Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f7; /* Apple's signature light gray */
            color: #1d1d1f; /* Dark text for contrast */
        }
        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 0.75rem;
            transition: background-color 0.2s, color 0.2s;
        }
        .sidebar-item:hover {
            background-color: #e5e5e7;
            color: #1d1d1f;
        }
        .sidebar-item.active {
            background-color: #e8e8e8;
            color: #007aff; /* Apple's signature blue */
            font-weight: 600;
        }
        /* Style for the card-like containers */
        .glass-card {
            background-color: #ffffff;
            border: 1px solid #e5e5e7;
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Responsive sidebar animation */
        #sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }

        #sidebar.open {
            transform: translateX(0);
        }
        
        @media (min-width: 768px) {
            #sidebar {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="flex min-h-screen">
        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden p-4 fixed top-4 left-4 z-50 focus:outline-none rounded-lg bg-gray-200">
            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 md:w-80 h-full fixed md:relative z-40 bg-gray-100 flex flex-col p-6 space-y-8 md:rounded-r-3xl md:shadow-lg">
            <!-- Logo and App Name -->
            <div class="flex items-center space-x-3">
                <svg class="w-8 h-8 text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                <span class="text-2xl font-bold tracking-tight text-gray-900">Aura</span>
            </div>
            
            <!-- Navigation Links -->
            <nav class="flex-grow space-y-2">
              
                <x-nav-link href="/" :active="request()->is('/')" class="sidebar-item">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>Home Page</span>
                </x-nav-link>

                <x-nav-link href="/jobs" :active="request()->is('jobs')" class="sidebar-item">
                    <svg class="w-5 h-5 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    <span>Jobs Page</span>
                </x-nav-link>
                
            </nav>

            <!-- User Profile -->
            <div class="mt-auto pt-6 border-t border-gray-300">
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full" src="https://placehold.co/40x40/f5f5f7/1d1d1f?text=A" alt="User Avatar">
                    <div>
                        <p class="font-semibold">Daniel K.I.M.</p>
                        <p class="text-sm text-gray-500">Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 md:p-12 overflow-y-auto">
            <!-- This is where your individual page heading will go. -->
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    {{ $heading }}
                </h1>
            </div>
            
            <!-- This is where the main content of your view will go. -->
            {{ $slot }}
        </main>
    </div>

    <!-- JavaScript for sidebar toggle -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
    </script>
</body>
</html>
