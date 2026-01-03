<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-500 to-purple-700 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-2xl p-10 w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Register</h1>
        <form method="POST" action="/register">
            <div class="mb-5">
                <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="mb-5">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="mb-5">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <div class="mb-6">
                <label for="password_confirm" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
            </div>
            <button type="submit" class="w-full bg-purple-500 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition">Register</button>
        </form>
        <div class="text-center mt-6 text-gray-600">
            Already have an account? <a href="/login" class="text-purple-500 font-semibold hover:underline">Login here</a>
        </div>
    </div>
</body>
</html>
