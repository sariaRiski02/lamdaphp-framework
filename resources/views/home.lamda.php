<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - Berita Terkini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">Berita Terkini</h1>
            <p class="text-blue-100">Informasi terbaru dan terpercaya</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-12">
        
        <!-- Search Bar -->
        <div class="mb-12 flex gap-2">
            <form action="/" method="GET" class="flex flex-1">
                <input 
                    type="text" 
                    name="news"
                    placeholder="Cari berita..." 
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- News Grid -->
        <div data-bind="news" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- News Card -->
             @foreach($allNews as $news)
             
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition transform hover:scale-105">
                    <!-- Image -->
                    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-6xl opacity-50"></i>
                        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded">Breaking</span>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-5">
                        <!-- Category Badge -->
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mb-3">
                            <i class="fas fa-tag"></i> {{ $news['category_name'] ?? 'umum' }}
                        </span>
                        
                        <!-- Title -->
                        <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">
                            {{ $news['title'] }}
                        </h2>
                        
                        <!-- Meta Info -->
                        <div class="flex items-center justify-between text-gray-500 text-xs mb-4 border-t pt-3">
                            <span><i class="fas fa-calendar"></i>{{$news['created_at']}}</span>
                            <span><i class="fas fa-user"></i> Admin</span>
                        </div>
                        
                        <!-- Read More Button -->
                        <a href="/news/{{$news['slug']}}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition w-full text-center">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>

             @endforeach
            

        </div>
    </main>

<!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 mt-16 py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>&copy; 2025 Berita Online. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // **Buat SSE connection ke server**
        const eventSource = new EventSource('/events');
        eventSource.addEventListener('update', function(event){
           console.log(event.lastEventId)
            fetch('/_news')
                .then(res=> res.json())
                .then(data=>{
                    
                    document.querySelector('[data-bind="news"]').innerHTML = data.data;
                    
                }).catch(err=>console.error(err));
        });
        eventSource.onopen = function(){
            console.log('Connection to server opened.');
        };
        eventSource.onclose = function(){
            console.log('Connection to server closed');
        }
        eventSource.onerror = function(err){
            console.error('EventSource failed:', err);
        };

        
    </script>
</body>
</html>
