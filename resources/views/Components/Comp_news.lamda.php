 @foreach($news as $item)
    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl hover:scale-105 transition duration-300">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">{{ $item['title'] }}</h2>
            <p class="text-gray-700 mb-4">{{ $item['content'] }}</p>
            <a href="/news/{{ $item['slug'] }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Baca Selengkapnya</a>
        </div>
    </div>
@endforeach