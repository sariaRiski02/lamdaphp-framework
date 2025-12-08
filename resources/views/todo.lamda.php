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

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Todo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $index => $todo)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $todo['name'] }}</td>
                <td>
                    <a href="/update/{{ $todo['id'] }}">Update</a> |
                    <a href="/delete/{{ $todo['id'] }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
