<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    container: {
                        center: true,
                        padding: '2rem',
                    },
                    colors: {
                        primary: '#2563eb', // Custom primary color
                    }
                },
            },
        };
    </script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 rounded-2xl fixed top-0 left-0 w-full flex justify-center z-50">
        <ul class="flex space-x-6 px-6">
            <li>
                <a href="{{ route('admin.courses.index') }}" 
                   class="block p-3 rounded-lg hover:bg-gray-200 {{ request()->routeIs('admin.courses.index') ? 'bg-gray-300 font-semibold' : '' }}">
                    Courses
                </a>
            </li>
            <li>
                <a href="{{ route('admin.professors.index') }}" 
                   class="block p-3 rounded-lg hover:bg-gray-200 {{ request()->routeIs('admin.professors.index') ? 'bg-gray-300 font-semibold' : '' }}">
                    Professors
                </a>
            </li>
            <li>
                <a href="{{ route('admin.lessons.index') }}" 
                   class="block p-3 rounded-lg hover:bg-gray-200 {{ request()->routeIs('admin.lessons.index') ? 'bg-gray-300 font-semibold' : '' }}">
                    Lectures
                </a>
            </li>
            <li>
                <a href="{{ route('admin.modules.index') }}" 
                   class="block p-3 rounded-lg hover:bg-gray-200 {{ request()->routeIs('admin.modules.index') ? 'bg-gray-300 font-semibold' : '' }}">
                    Modules
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6 mt-[80px] flex-1">
        @yield('content')
    </main>

</body>
</html>
