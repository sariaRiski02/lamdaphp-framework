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
                <a href="/dashboard" class="block px-6 py-3 bg-blue-600 border-l-4 border-blue-400">
                    Dashboard
                </a>
                <a href="/dashboard/add-news" class="block px-6 py-3 hover:bg-gray-800">
                    Tambah Berita
                </a>
                <a href="/dashboard/list-news" class="block px-6 py-3 hover:bg-gray-800">
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
                <!-- STATISTICS SECTION -->
                <section id="statistics" class="mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <!-- Total Berita -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold">Total Berita</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?=  htmlspecialchars($totalNews, ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Total Kategori -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold">Total Kategori</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?=  htmlspecialchars($totalCategory, ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 000-2H7zM4 7a1 1 0 011-1h10a1 1 0 011 1v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Berita Hari Ini -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold">Terpublikasi</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?=  htmlspecialchars($published, ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Status Publikasi -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold">Dalam Draft</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?=  htmlspecialchars($draft, ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <div class="bg-purple-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- QUICK ACTION SECTION -->
                <section id="quick-action" class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Aksi Cepat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="/dashboard/add-news" class="bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg shadow-md p-6 transition transform hover:scale-105">
                            <div class="flex items-center gap-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <div>
                                    <p class="font-bold">Tambah Berita</p>
                                    <p class="text-sm opacity-90">Buat berita baru</p>
                                </div>
                            </div>
                        </a>

                        <a href="/dashboard/list-news" class="bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-lg shadow-md p-6 transition transform hover:scale-105">
                            <div class="flex items-center gap-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <div>
                                    <p class="font-bold">Daftar Berita</p>
                                    <p class="text-sm opacity-90">Kelola semua berita</p>
                                </div>
                            </div>
                        </a>

                        <a href="/dashboard/category" class="bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-lg shadow-md p-6 transition transform hover:scale-105">
                            <div class="flex items-center gap-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                                <div>
                                    <p class="font-bold">Kelola Kategori</p>
                                    <p class="text-sm opacity-90">Atur kategori berita</p>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Status</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($news as $item): ?>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">-</td>
                                        <td class="px-6 py-4"><?=  htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="px-6 py-4">
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded"><?=  htmlspecialchars($item['category_name'], ENT_QUOTES, 'UTF-8') ?></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="<?=  htmlspecialchars($item['status'] == 'draft' ? 'bg-red-100 text-black-100' : 'bg-blue-100 text-blue-800', ENT_QUOTES, 'UTF-8') ?>  px-3 py-1 rounded">
                                                <?=  htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8') ?>
                                            </span></td>
                                        <td class="px-6 py-4"><?=  htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <a href="/dashboard/news/update/<?=  htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Hapus</button>
                                        </td>
                                    </tr>    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                

            </div>
        </main>

    </div>
</body>
</html>
