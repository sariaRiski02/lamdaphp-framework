<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Breadcrumb -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="flex items-center gap-2 text-sm">
                <a href="/" class="text-purple-600 hover:text-purple-800 flex items-center gap-1">
                    <i class="fas fa-home"></i> Berita
                </a>
                <span class="text-gray-400">/</span>
                <span class="text-gray-600">Detail</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-12">
        
        <!-- Article Card -->
        <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
            
            <!-- Hero Image -->
            <div class="relative h-96 bg-gray-200 overflow-hidden">
                <img src="" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold">
                    <i class="fas fa-star mr-1"></i> <?=  htmlspecialchars($category['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?>
                </div>
            </div>

            <!-- Article Content -->
            <div class="p-8 md:p-12">
                
                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 text-gray-600 text-sm mb-6">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-purple-600"></i>
                        <span><?=  htmlspecialchars($news['created_at'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-user text-purple-600"></i>
                        <span><?=  htmlspecialchars($user['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-folder text-purple-600"></i>
                        <span><?=  htmlspecialchars($category['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                   <?=  htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') ?>
                </h1>

                <!-- Divider -->
                <div class="w-20 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-8"></div>

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none mb-8">
                    <p class="text-gray-700 leading-relaxed text-lg">
                        <?=  htmlspecialchars($news['content'] ?? 'default', ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>

                <!-- Tags/Category -->
                <div class="flex flex-wrap gap-3 mb-8 pt-8 border-t border-gray-200">
                    <span class="text-sm font-semibold text-gray-600">Kategori:</span>
                    <a href="#" class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-purple-200 transition-colors">
                        <i class="fas fa-tag mr-2"></i><?=  htmlspecialchars($category['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </div>

            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 md:px-12 py-6 border-t border-gray-200 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                        <?=  htmlspecialchars($user['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900"><?=  htmlspecialchars($user['name'] ?? 'default', ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="text-sm text-gray-600">Penulis Berita</p>
                    </div>
                </div>
                <a href="/" class="inline-flex items-center gap-2 bg-purple-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-purple-700 transition-colors">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </article>

        <!-- Related News Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">
                <i class="fas fa-newspaper text-purple-600 mr-3"></i>Berita Terkait
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            <?php foreach ($newsRelated as $item): ?>
                <!-- Related News Card -->
                <a href="/detail/<?=  htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>" class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="relative overflow-hidden h-40 bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1504711331345-19f47dc73e28?w=400&h=250&fit=crop" alt="Related" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-purple-600 transition-colors"><?=  htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p class="text-xs text-gray-500 mt-2"><?=  htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20 py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; 2025 LamdaPHP News. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>