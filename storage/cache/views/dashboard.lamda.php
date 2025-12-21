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
                <a href="#" class="block px-6 py-3 bg-blue-600 border-l-4 border-blue-400">
                    Dashboard
                </a>
                <a href="#add-news" class="block px-6 py-3 hover:bg-gray-800">
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
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">1</td>
                                    <td class="px-6 py-4">Berita Terbaru Tentang Teknologi</td>
                                    <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 px-3 py-1 rounded">Teknologi</span></td>
                                    <td class="px-6 py-4">21 Des 2025</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="#edit-news" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Hapus</button>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">2</td>
                                    <td class="px-6 py-4">Pertandingan Sepak Bola Seru</td>
                                    <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-3 py-1 rounded">Olahraga</span></td>
                                    <td class="px-6 py-4">20 Des 2025</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="#edit-news" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- EDIT NEWS SECTION -->
                <section id="edit-news" class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Edit Berita</h3>
                    
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="Berita Terbaru Tentang Teknologi">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option selected>Teknologi</option>
                                <option>Olahraga</option>
                                <option>Hiburan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Konten</label>
                            <textarea rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">Ini adalah isi dari berita yang akan diedit...</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                            <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                                Update Berita
                            </button>
                            <a href="#list-news" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg">
                                Batal
                            </a>
                        </div>
                    </form>
                </section>

                <!-- ADD CATEGORY SECTION -->
                <section id="add-category" class="bg-white rounded-lg shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kelola Kategori</h3>
                    
                    <!-- Add Category Form -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-bold text-gray-700 mb-4">Tambah Kategori Baru</h4>
                        <form class="flex gap-3">
                            <input type="text" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama kategori baru">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                                Tambah
                            </button>
                        </form>
                    </div>

                    <!-- Category List -->
                    <h4 class="text-lg font-bold text-gray-700 mb-4">Daftar Kategori</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                            <span class="font-semibold text-gray-800">Teknologi</span>
                            <div class="flex gap-2">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                            <span class="font-semibold text-gray-800">Olahraga</span>
                            <div class="flex gap-2">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                            <span class="font-semibold text-gray-800">Hiburan</span>
                            <div class="flex gap-2">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>

    </div>
</body>
</html>
