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
                <a href="#" class="block px-6 py-3 bg-blue-600 border-l-4 border-blue-400">
                    Tambah Berita
                </a>
                <a href="#list-news" class="block px-6 py-3 hover:bg-gray-800">
                    List Berita
                </a>
                <a href="#add-category" class="block px-6 py-3 hover:bg-gray-800">
                    Tambah Kategori
                </a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-800">
                    Logout
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

                <!-- ADD NEWS SECTION -->
                <section id="add-news" class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h3>
                    
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan judul berita">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Pilih Kategori</option>
                                <option>Teknologi</option>
                                <option>Olahraga</option>
                                <option>Hiburan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Konten</label>
                            <textarea rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan isi berita"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                            <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>

                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                            Simpan Berita
                        </button>
                    </form>
                </section>

            </div>
        </main>

    </div>
</body>
</html>
