<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update <?=  htmlspecialchars($data['id'], ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
    
    <h1>update todo dengan ID: <?=  htmlspecialchars($data['id'], ENT_QUOTES, 'UTF-8') ?></h1>
    <h3>Data saat ini adalah => <?=  htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8') ?></h3>
    <form action="/update/<?=  htmlspecialchars($data['id'], ENT_QUOTES, 'UTF-8') ?>" method="POST">
        <input type="text" name="todo">
        <button type="submit">update</button>
    </form>
</body>
</html>