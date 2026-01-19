<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LamdaPHP News</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100">
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">LamdaPHP News</h1>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-blue-200 transition duration-300">Home</a></li>
                <li><a href="#" class="hover:text-blue-200 transition duration-300">About</a></li>
                <li><a href="#" class="hover:text-blue-200 transition duration-300">Contact</a></li>
                <li><a href="#" class="hover:text-blue-200 transition duration-300">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Register</h1>

            <!-- Error message display -->
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?=  htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endif; ?>
            <form action="/register" method="post" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Register</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? <a href="/login" class="text-blue-600 hover:text-blue-800">Login</a></p>
            </div>
        </div>
    </div>
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white text-center p-6 mt-8">
        <p>© 2026 LamdaPHP Framework. All rights reserved.</p>
        <p class="mt-2">Follow us on social media</p>
    </footer>
</body>
</html>
