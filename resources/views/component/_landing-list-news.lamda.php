 @foreach($news as $item)
    <tr class="border-b hover:bg-gray-50">
        <td class="px-6 py-4">-</td>
        <td class="px-6 py-4">{{ $item['title'] }}</td>
        <td class="px-6 py-4">
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded">{{ $item['category_name'] }}</span>
        </td>
        <td class="px-6 py-4">
            <span class="{{$item['status'] == 'draft' ? 'bg-red-100 text-black-100' : 'bg-blue-100 text-blue-800'}}  px-3 py-1 rounded">
                {{ $item['status'] }}
            </span></td>
        <td class="px-6 py-4">{{ $item['created_at'] }}</td>
        <td class="px-6 py-4 flex gap-2">
            <a href="/dashboard/news/update/{{$item['slug']}}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">Edit</a>
            <form action="/dashboard/news/delete/{{ $item['slug'] }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news?');">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">Delete</button>
        </form>
        </td>
    </tr>    
@endforeach

