 <?php foreach ($news as $item): ?>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2"><?=  htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="text-gray-700 mb-4"><?=  htmlspecialchars($item['content'], ENT_QUOTES, 'UTF-8') ?></p>
            <a href="/news/<?=  htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Baca Selengkapnya</a>
        </div>
    </div>
<?php endforeach; ?>