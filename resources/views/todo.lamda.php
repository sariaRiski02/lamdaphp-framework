<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
</head>
<body>
    <h1>My Todo List</h1>

    <form action="/" method="POST">
        <input type="text" name="todo" placeholder="New todo" required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach($todos as $todo)
        <li>{{ $todo['name'] }} 
            <!-- <a href="/checked/{{ $todo['id'] }}">selesai</a> | -->
            <a href="/update/{{ $todo['id'] }}">update</a> |
            <a href="/delete/{{ $todo['id'] }}">Delete</a> 

        </li>
        @endforeach
    </ul>
</body>
</html>