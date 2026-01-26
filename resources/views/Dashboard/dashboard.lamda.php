<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LamdaPHP Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Berita</h1>

            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Berita</h2>
                <form action="/dashboard" method="POST" class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul:</label>
                        <input type="text" id="title" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten:</label>
                        <textarea id="content" name="content" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status:</label>
                        <select id="status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Status</option>
                            <option value="draft">Draft</option>
                            <option value="published">Dipublikasikan</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition">Simpan</button>
                </form>
            </div>

            <!-- List Berita -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Berita</h2>
                <ul class="space-y-3 max-h-96 overflow-y-auto">
                    @foreach($news as $item)
                        <li class="p-3 bg-gray-50 border-l-4 border-blue-500 rounded">
                            <p class="font-medium text-gray-800">{{ $item['title'] }}</p>
                            <p class="text-sm text-gray-600">{{ $item['content'] }}</p>
                            <div class="mt-3 flex gap-2">
                                <a href="/news/{{ $item['slug'] }}" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-sm rounded transition">Lihat</a>
                                <a href="/dashboard/update/{{ $item['id'] }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded transition">Update</a>
                                <a href="/dashboard/delete/{{ $item['id'] }}" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded transition">Delete</a>
                            </div>
                        </li>
                    @endforeach
                   
                   
                </ul>
            </div>
        </div>
    </div>
</body>
</html>