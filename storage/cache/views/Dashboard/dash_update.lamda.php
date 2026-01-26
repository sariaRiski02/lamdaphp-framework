<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LamdaPHP Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Berita</h1>

            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Berita</h2>
                <form action="/dashboard/update/<?=  htmlspecialchars($news['id'], ENT_QUOTES, 'UTF-8') ?>" method="POST" class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul:</label>
                        <input type="text" id="title" name="title" value="<?=  htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten:</label>
                        <textarea id="content" name="content" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?=  htmlspecialchars($news['content'], ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status:</label>
                        
                        <select id="status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Status</option>
                            <option value="draft">Draft</option>
                            <option value="published">Dipublikasikan</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>