<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>

    <!-- Tailwind CDN for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-2 hover:bg-blue-700 px-3 py-2 rounded">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Kembali</span>
            </a>
        </div>
    </header>

    <!-- Main chat area -->
    <main class="flex-1 overflow-hidden flex">
        <section class="w-full max-w-4xl mx-auto flex bg-white shadow-lg rounded-lg my-6 overflow-hidden">



            <!-- Chat area with static Tailwind-only UI -->
            <section class="w-full flex flex-col">

                <!-- Chat header + sender box -->
                <div class="flex items-center justify-between p-4 border-b bg-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center font-bold">C</div>
                        <div>
                            <div class="font-semibold">Jhon Doe</div>
                            <div class="text-sm text-gray-500">Obrolan sederhana (Tailwind saja)</div>
                        </div>
                    </div>
                </div>

                <!-- Messages list (static examples) -->
                <div class="flex-1 overflow-auto p-6 space-y-4 bg-gradient-to-b from-white to-gray-50">

                    <!-- Incoming message -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center font-semibold text-gray-700">B</div>
                        <div class="max-w-[70%] bg-gray-100 text-gray-900 p-3 rounded-lg rounded-bl-none shadow">
                            <div class="text-sm">Halo! Selamat datang di chat.</div>
                            <div class="text-xs text-gray-500 mt-1">12:30</div>
                        </div>
                    </div>

                    <!-- Outgoing message (sender box) -->
                    <div class="flex items-end justify-end gap-3">
                        <div class="max-w-[70%] bg-blue-600 text-white p-3 rounded-lg rounded-br-none shadow text-sm text-right">
                            <div>Saya senang bisa membantu!</div>
                            <div class="text-xs text-blue-200 mt-1">12:31</div>
                        </div>
                    </div>

                    <!-- Another incoming -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center font-semibold text-gray-700">B</div>
                        <div class="max-w-[70%] bg-gray-100 text-gray-900 p-3 rounded-lg rounded-bl-none shadow">
                            <div class="text-sm">Apakah ada yang bisa saya bantu?</div>
                            <div class="text-xs text-gray-500 mt-1">12:32</div>
                        </div>
                    </div>
                </div>

                <!-- Static composer (no JavaScript) -->
                <div class="p-4 border-t bg-white">
                    <form l-form="form" class="flex gap-2">
                        <input l-input="test" name="message" type="text" placeholder="Tulis pesan..." class="flex-1 rounded-md border p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" autocomplete="off">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Kirim</button>
                    </form>
                </div>
            </section>

        </section>
    </main>

    <script>
        const form = document.querySelector(`[l-form="form"`);
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const input = document.querySelector(`[l-input="test"]`);
            if(input.value.trim() !== ''){
                sendData(input.value.trim());
            }
            input.value = '';
        });

        function sendData(data){
            const url = window.location.href
            fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    data: data
                })
            })
            .then(
                response => response.json()
            )
            .then(data => console.log(data.data)
            )
            .catch(function(e){
                console.log(e.message);
            });
        }
    </script>
</body>
</html>
