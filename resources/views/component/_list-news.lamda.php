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