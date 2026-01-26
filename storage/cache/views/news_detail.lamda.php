<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <article class="max-w-2xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <a href="javascript:history.back()" class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    ← Kembali
                </a>
                <h1 class="text-4xl font-bold text-gray-900 mb-6"><?=  htmlspecialchars($newsItem['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                <div class="prose prose-lg text-gray-700 leading-relaxed">
                    <p><?=  htmlspecialchars($newsItem['content'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        </article>
    </div>
</body>
</html>