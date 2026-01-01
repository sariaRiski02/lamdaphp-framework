 <?php foreach ($news as $item): ?>
    <tr class="border-b hover:bg-gray-50">
        <td class="px-6 py-4">-</td>
        <td class="px-6 py-4"><?=  htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></td>
        <td class="px-6 py-4">
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded"><?=  htmlspecialchars($item['category_name'], ENT_QUOTES, 'UTF-8') ?></span>
        </td>
        <td class="px-6 py-4">
            <span class="<?=  htmlspecialchars($item['status'] == 'draft' ? 'bg-red-100 text-black-100' : 'bg-blue-100 text-blue-800', ENT_QUOTES, 'UTF-8') ?>  px-3 py-1 rounded">
                <?=  htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8') ?>
            </span></td>
        <td class="px-6 py-4"><?=  htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
        <td class="px-6 py-4 flex gap-2">
            <a href="/dashboard/news/update/<?=  htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
            <form action="/dashboard/news/delete/<?=  htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this news?');">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Delete</button>
        </form>
        </td>
    </tr>    
<?php endforeach; ?>