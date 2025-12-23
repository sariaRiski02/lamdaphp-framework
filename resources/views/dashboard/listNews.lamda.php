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
                <a href="/dashboard" class="block px-6 py-3  hover:bg-gray-800">
                    Dashboard
                </a>
                <a href="/dashboard/add-news" class="block px-6 py-3 hover:bg-gray-800">
                    Tambah Berita
                </a>
                <a href="/dashboard/list-news" class="block px-6 py-3 bg-blue-600 border-l-4 border-blue-400">
                    List Berita
                </a>
                <a href="/dashboard/category" class="block px-6 py-3 hover:bg-gray-800">
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

                <!-- LIST NEWS SECTION -->
                <section id="list-news" class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Daftar Berita</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">No</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Judul</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Kategori</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Tanggal</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($news as $item)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">-</td>
                                        <td class="px-6 py-4">{{ $item['title'] }}</td>
                                        <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 px-3 py-1 rounded">{{ $item['category_name'] }}</span></td>
                                        <td class="px-6 py-4">{{ $item['created_at'] }}</td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <a href="/dashboard/news/update/{{ $item['slug'] }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </main>

    </div>
</body>
</html>
