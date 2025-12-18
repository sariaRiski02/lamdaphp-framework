<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LamdaPHP</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    
    <div class="flex h-screen bg-gray-100">
        
        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm border-b border-gray-200 p-6 sticky top-0 z-10">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Dashboard</h2>
                        <p class="text-gray-600 mt-1">Kelola konten berita Anda</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6">
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold">Total Berita</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">6</p>
                            </div>
                            <i class="fas fa-newspaper text-4xl text-purple-200"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold">Berita Publish</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">6</p>
                            </div>
                            <i class="fas fa-check-circle text-4xl text-blue-200"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold">Draft</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                            </div>
                            <i class="fas fa-file-alt text-4xl text-yellow-200"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold">Kategori</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">4</p>
                            </div>
                            <i class="fas fa-folder text-4xl text-green-200"></i>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mb-8 flex justify-end">
                    <a href="#" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg px-6 py-3 shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-pen-fancy text-xl group-hover:scale-110 transition-transform"></i>
                            <div class="text-left">
                                <h3 class="text-lg font-bold">Buat Berita Baru</h3>
                                <p class="text-purple-100 text-xs mt-0.5">Tulis dan publikasikan berita baru Anda</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Add Category Form -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        <i class="fas fa-folder-plus text-purple-600 mr-2"></i>Tambah Kategori Baru
                    </h3>
                    <form method="POST" action="#" class="flex gap-3">
                        <input type="text" name="category_name" placeholder="Nama kategori..." required class="flex-1 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                        <button type="submit" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>
                    </form>
                </div>

                <!-- Category List -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-list text-purple-600 mr-2"></i>Daftar Kategori
                        </h3>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                    <i class="fas fa-folder text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Teknologi</p>
                                    <p class="text-xs text-gray-500">slug: teknologi</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm p-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>

                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                    <i class="fas fa-folder text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Keamanan</p>
                                    <p class="text-xs text-gray-500">slug: keamanan</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm p-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>

                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                                    <i class="fas fa-folder text-orange-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Mobile</p>
                                    <p class="text-xs text-gray-500">slug: mobile</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm p-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>

                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-folder text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Cloud</p>
                                    <p class="text-xs text-gray-500">slug: cloud</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm p-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent News Table -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-newspaper text-purple-600 mr-2"></i>Berita Terbaru
                        </h3>
                        <a href="#" class="text-purple-600 hover:text-purple-800 font-semibold text-sm flex items-center gap-2">
                            Lihat Semua <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">Inovasi Terbaru Teknologi Web</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">Teknologi</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">11 Des 2025</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">AI Mengubah Industri</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">Teknologi</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">10 Des 2025</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">Keamanan Siber Penting</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">Keamanan</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">9 Des 2025</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>