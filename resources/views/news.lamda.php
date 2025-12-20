<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news['title'] ?? 'Berita' }}</title>
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
                    {{ $news['category_name'] ?? 'Umum' }}
                </span>
                <span>{{ $news['created_at'] ?? date('d M Y') }}</span>
                <span>Oleh: {{ $news['author'] ?? 'Admin' }}</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-900 mb-6">
                {{ $news['title'] }}
            </h1>

            <!-- Content -->
            <div class="prose prose-lg text-gray-700 leading-relaxed mb-8">
                {!! $news['content'] ?? '<p>Tidak ada konten berita</p>' !!}
            </div>
            
           
            
        </article>
        
    </div>
</body>
</html>
