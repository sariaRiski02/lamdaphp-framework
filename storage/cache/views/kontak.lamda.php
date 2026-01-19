<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-blue-600 text-white p-4 text-center text-xl font-semibold">
        Daftar Kontak
    </div>

    <!-- Kontak List -->
    <div class="max-w-md mx-auto mt-4 space-y-3 p-3">

        <!-- Kontak 1 -->
        <a href="/chat/" class="bg-white rounded-lg shadow p-4 flex items-center gap-4 hover:bg-blue-50 cursor-pointer">
            <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full font-bold">
                A
            </div>
            <div class="flex-1">
                <div class="font-semibold text-gray-800">Andi Pratama</div>
                <div class="text-sm text-gray-500">Terakhir aktif 5 menit lalu</div>
            </div>
        </a>

        <!-- Kontak 2 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4 hover:bg-blue-50 cursor-pointer">
            <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center rounded-full font-bold">
                B
            </div>
            <div class="flex-1">
                <div class="font-semibold text-gray-800">Budi Santoso</div>
                <div class="text-sm text-gray-500">Online</div>
            </div>
        </div>

        <!-- Kontak 3 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4 hover:bg-blue-50 cursor-pointer">
            <div class="w-12 h-12 bg-purple-500 text-white flex items-center justify-center rounded-full font-bold">
                C
            </div>
            <div class="flex-1">
                <div class="font-semibold text-gray-800">Citra Lestari</div>
                <div class="text-sm text-gray-500">Offline</div>
            </div>
        </div>

        <!-- Kontak 4 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4 hover:bg-blue-50 cursor-pointer">
            <div class="w-12 h-12 bg-red-500 text-white flex items-center justify-center rounded-full font-bold">
                D
            </div>
            <div class="flex-1">
                <div class="font-semibold text-gray-800">Doni Kurniawan</div>
                <div class="text-sm text-gray-500">Terakhir aktif kemarin</div>
            </div>
        </div>

    </div>

</body>
</html>
