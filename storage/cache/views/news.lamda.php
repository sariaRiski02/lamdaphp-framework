<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  htmlspecialchars($news['title'] ?? 'Berita', ENT_QUOTES, 'UTF-8') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto py-8 px-4">
        
        <!-- Back Button -->
        <a href="/" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">
            ← Kembali
        </a>
        
        <!-- Article Container -->
        <article class="bg-white rounded-lg shadow-md p-8">
            
            <!-- Category & Meta -->
            <div class="mb-4 flex items-center gap-4 text-gray-600 text-sm">
                <span class="inline-block bg-blue-500 text-white px-3 py-1 rounded">
                    <?=  htmlspecialchars($news['category_name'] ?? 'Umum', ENT_QUOTES, 'UTF-8') ?>
                </span>
                <span><?=  htmlspecialchars($news['created_at'] ?? date('d M Y'), ENT_QUOTES, 'UTF-8') ?></span>
                <span>Oleh: <?=  htmlspecialchars($news['author'] ?? 'Admin', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-900 mb-6">
                <?=  htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') ?>
            </h1>

            <!-- Content -->
            <div class="prose prose-lg text-gray-700 leading-relaxed mb-8">
                <?= $news['content'] ?? '<p>Tidak ada konten berita</p>' ?>
            </div>
            
           
            
        </article>
        
    </div>
</body>
</html>
