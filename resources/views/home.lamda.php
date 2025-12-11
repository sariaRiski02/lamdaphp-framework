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
            <form method="GET" class="relative">
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
            
            <!-- News Card 1 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1504711331345-19f47dc73e28?w=500&h=300&fit=crop" 
                         alt="Technology News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-star"></i> Trending
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-purple-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>11 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Inovasi Terbaru dalam Teknologi Web</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Perkembangan framework JavaScript terbaru membawa revolusi dalam dunia pengembangan web. Teknologi ini menghadirkan performa yang lebih cepat dan efisien.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- News Card 2 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=500&h=300&fit=crop" 
                         alt="AI News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-bolt"></i> Hot
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-blue-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>10 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Artificial Intelligence Mengubah Industri</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Kecerdasan buatan terus berkembang dan memberikan dampak signifikan pada berbagai sektor industri modern. Perusahaan besar mulai mengintegrasikan AI dalam operasional mereka.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- News Card 3 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f70d504f0?w=500&h=300&fit=crop" 
                         alt="Security News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-shield"></i> Secure
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-green-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>9 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Keamanan Siber Semakin Penting</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Dengan meningkatnya ancaman cyber, keamanan data menjadi prioritas utama bagi semua organisasi. Investasi dalam infrastruktur keamanan IT harus ditingkatkan.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- News Card 4 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop" 
                         alt="Mobile News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-mobile"></i> Mobile
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-orange-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>8 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Aplikasi Mobile Generasi Terbaru</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Pengembangan aplikasi mobile semakin canggih dengan dukungan teknologi cross-platform. User experience yang seamless menjadi standar baru industri.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- News Card 5 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=500&h=300&fit=crop" 
                         alt="Cloud News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-cloud"></i> Cloud
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-indigo-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>7 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Cloud Computing Makin Dominan</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Infrastruktur cloud computing terus berkembang dan menjadi backbone dari banyak aplikasi modern. Skalabilitas dan fleksibilitas adalah keunggulan utamanya.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- News Card 6 -->
            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="relative overflow-hidden h-48">
                    <img src="https://images.unsplash.com/photo-1556656793-08538906a9f8?w=500&h=300&fit=crop" 
                         alt="Blockchain News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <span class="absolute top-4 right-4 bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                        <i class="fas fa-link"></i> Blockchain
                    </span>
                </div>
                <div class="p-6">
                    <div class="text-yellow-600 font-semibold text-sm mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>6 Desember 2025
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Blockchain Merevolusi Transaksi Digital</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">Teknologi blockchain memberikan transparansi dan keamanan dalam transaksi digital. Adopsi di berbagai industri terus meningkat setiap tahunnya.</p>
                    <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Baca <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Load More Button -->
        <div class="text-center mt-16">
            <button class="bg-white text-gray-900 px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-sync-alt mr-3"></i>Muat Berita Lainnya
            </button>
        </div>
    </div>

</body>
</html>