<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - LamdaPHP</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    
    <!-- Header Section -->
    <div class="text-center py-16 px-4">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
            <i class="fas fa-newspaper mr-3"></i>BERITA TERKINI
        </h1>
        <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-pink-400 mx-auto my-6 rounded-full"></div>
        <p class="text-xl text-gray-300 mb-8">Informasi terbaru dan terdepan untuk Anda</p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto px-4">
            <form method="GET" action="/" class="relative">
                <input type="text" 
                       name="search"
                       placeholder="Cari berita..." 
                       class="w-full px-6 py-4 rounded-full text-gray-800 shadow-xl focus:outline-none focus:ring-4 focus:ring-purple-400 transition-all duration-300 placeholder-gray-400">
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- News Container -->
    <div class="container mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
            <?php foreach ($data as $d): ?>
                <!-- News Card 1 -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1504711331345-19f47dc73e28?w=500&h=300&fit=crop" 
                            alt="Technology News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <span class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                            <i class="fas fa-star"></i>  ------ [Category]
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="text-purple-600 font-semibold text-sm mb-2">
                            <i class="fas fa-calendar-alt mr-2"></i><?=  htmlspecialchars($d['created_at'], ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3"><?=  htmlspecialchars($d['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        
                        <a href="/detail/<?=  htmlspecialchars($d['id'], ENT_QUOTES, 'UTF-8') ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                            Baca <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

       
    </div>

</body>
</html>