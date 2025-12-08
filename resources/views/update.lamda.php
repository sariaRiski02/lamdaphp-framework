<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update {{$data['id']}}</title>
</head>
<body>
    
    <h1>update todo dengan ID: {{ $data['id'] }}</h1>
    <h3>Data saat ini adalah => {{$data['name']}}</h3>
    <form action="/update/{{ $data['id'] }}" method="POST">
        <input type="text" name="todo">
        <button type="submit">update</button>
    </form>
</body>
</html>