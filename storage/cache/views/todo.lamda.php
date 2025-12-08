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
        <?php foreach ($todos as $todo): ?>
        <li><?=  htmlspecialchars($todo['name'], ENT_QUOTES, 'UTF-8') ?> 
            <!-- <a href="/checked/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">selesai</a> | -->
            <a href="/update/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">update</a> |
            <a href="/delete/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">Delete</a> 

        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>