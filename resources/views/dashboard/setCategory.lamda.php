<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            
            <nav class="mt-6">
                <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-800">
                    Dashboard
                </a>
                <a href="/dashboard/add-news" class="block px-6 py-3 hover:bg-gray-800">
                    Tambah Berita
                </a>
                <a href="/dashboard/list-news" class="block px-6 py-3 hover:bg-gray-800">
                    List Berita
                </a>
                <a href="/dashboard/category" class="block px-6 py-3 bg-blue-600 border-l-4 border-blue-400">
                    Atur Kategori
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow p-6">
                <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
            </header>

            <div class="p-6">

                <!-- ADD CATEGORY SECTION -->
                <section id="add-category" class="bg-white rounded-lg shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kelola Kategori</h3>
                    
                    <!-- Add Category Form -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-bold text-gray-700 mb-4">Tambah Kategori Baru</h4>
                        <form action="/dashboard/category/store" method="POST" class="flex gap-3">
                            <input type="text" name="name" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama kategori baru">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                                Tambah
                            </button>
                        </form>
                    </div>

                    <!-- Category List -->
                    <h4 class="text-lg font-bold text-gray-700 mb-4">Daftar Kategori</h4>
                    <div class="space-y-3">
                        @foreach($categories as $category)
                            <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                                <span class="font-semibold text-gray-800">{{ $category['name'] }}</span>
                                <div class="flex gap-2">
                                    <a href="/dashboard/category/update/{{$category['slug']}}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="/dashboard/category/delete/{{ $category['slug'] }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>

            </div>
        </main>

    </div>
</body>
</html>
