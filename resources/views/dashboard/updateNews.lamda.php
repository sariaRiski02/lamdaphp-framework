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
                <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-800">
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

                <!-- UPDATE NEWS SECTION -->
                <section id="update-news" class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Edit Berita</h3>
                    
                    <form action="/dashboard/news/update/{{$news['slug']}}" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                            <input name="title" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan judul berita" value="{{$news['title']}}">
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach($categories as $item)
                                    
                                    <option value="{{$item['id']}}"
                                        {{$item['id'] === $news['category_id'] ? 'selected' : ''}}
                                        >{{ $item['name'] }}</option>    
                                    
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Konten</label>
                            <textarea name="content" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan isi berita">{{ $news['content'] }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Gambar Saat Ini</label>
                            <div class="mb-3">
                                <img src="/storage/images/{{$news['thumbnail']}}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Ganti Gambar</label>
                            <input type="file" name="thumbnail" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Status</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="published" {{$news['status'] === 'published' ? 'selected' : ''}}>Dipublikasikan</option>
                                <option value="Draft" {{$news['status'] === 'Draft' ? 'selected' : ''}}>Draft</option>
                            </select>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                                Simpan Perubahan
                            </button>
                            <a href="/dashboard/list-news" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg">
                                Batal
                            </a>
                        </div>
                    </form>
                </section>

            </div>
        </main>

    </div>
</body>
</html>