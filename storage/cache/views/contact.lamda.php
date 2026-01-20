<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - LamdaPHP News</title>
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
                    
                    <?php if (!$_SESSION['user']): ?>
                        <a href="/login" class="hover:text-blue-200 transition duration-300">Login</a>
                    <?php else: ?>
                        <a href="/logout" class="hover:text-blue-200 transition duration-300">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Hubungi Kami</h1>
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
            <form action="#" method="post" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white text-center p-6 mt-8">
        <p>© 2026 LamdaPHP Framework. All rights reserved.</p>
        <p class="mt-2">Follow us on social media</p>
    </footer>
</body>
</html>