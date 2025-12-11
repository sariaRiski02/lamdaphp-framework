<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen py-8 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-4xl font-bold text-center mb-8 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            My Todo List
        </h1>

        <form action="/" method="POST" class="flex gap-2 mb-8">
            <input 
                type="text" 
                name="todo" 
                placeholder="New todo" 
                required
                class="flex-1 px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
            <button 
                type="submit"
                class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg hover:scale-105 transition-all duration-200"
            >
                Add
            </button>
        </form>

        <table class="w-full">
            <thead class="bg-gradient-to-r from-blue-600 to-purple-600">
                <tr>
                    <th class="px-6 py-3 text-left text-white font-semibold">No</th>
                    <th class="px-6 py-3 text-left text-white font-semibold">Todo</th>
                    <th class="px-6 py-3 text-left text-white font-semibold">Dibuat</th>
                    <th class="px-6 py-3 text-left text-white font-semibold">Diperbarui</th>
                    <th class="px-6 py-3 text-left text-white font-semibold">Action</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($todos as $index => $todo): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-3 text-gray-700"><?=  htmlspecialchars($index + 1, ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="px-6 py-3 text-gray-700"><?=  htmlspecialchars($todo['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="px-6 py-3 text-gray-700"><?=  htmlspecialchars($todo['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="px-6 py-3 text-gray-700"><?=  htmlspecialchars($todo['updated_at'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="px-6 py-3">
                        <a href="/update/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>" class="text-blue-600 font-semibold hover:text-blue-800 hover:underline">Update</a>
                        <span class="text-gray-400">|</span>
                        <a href="/delete/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>" class="text-red-600 font-semibold hover:text-red-800 hover:underline">Delete</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
