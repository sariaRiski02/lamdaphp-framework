<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100">
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">LamdaPHP News</h1>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-blue-200 transition duration-300">Home</a></li>
                <li><a href="/about" class="hover:text-blue-200 transition duration-300">About</a></li>
                <li><a href="/contact" class="hover:text-blue-200 transition duration-300">Contact</a></li>
                <li>
                    
                    @if(!$_SESSION['user'])
                        <a href="/login" class="hover:text-blue-200 transition duration-300">Login</a>
                    @else    
                        <a href="/logout" class="hover:text-blue-200 transition duration-300">Logout</a>
                    @endif
            
                </li>
            </ul>
        </nav>
    </header>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Berita Terbaru</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Judul Berita 1</h2>
                    <p class="text-gray-700 mb-4">Deskripsi singkat berita pertama. Ini adalah contoh konten berita yang menarik untuk dibaca.</p>
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Baca Selengkapnya</a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Judul Berita 2</h2>
                    <p class="text-gray-700 mb-4">Deskripsi singkat berita kedua. Ini adalah contoh konten berita lainnya yang informatif.</p>
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white text-center p-6 mt-8">
        <p>© 2026 LamdaPHP Framework. All rights reserved.</p>
        <p class="mt-2">Follow us on social media</p>
    </footer>

    @realtime
</body>
</html>