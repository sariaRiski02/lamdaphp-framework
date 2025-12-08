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
            <?php foreach ($todos as $index => $todo): ?>
            <tr>
                <td><?=  htmlspecialchars($index + 1, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?=  htmlspecialchars($todo['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/update/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">Update</a> |
                    <a href="/delete/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
