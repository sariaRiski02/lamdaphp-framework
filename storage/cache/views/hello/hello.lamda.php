<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul>
    <?php foreach ($data as $d): ?>
    <li><?=  htmlspecialchars($d, ENT_QUOTES, 'UTF-8') ?></li>
    <?php endforeach; ?>
</ul>



    
</body>
</html>