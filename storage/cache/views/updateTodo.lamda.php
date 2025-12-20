<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
</head>
<body>
    <h1>Todo List (Real-time)</h1>
    
    <!-- Container dengan data-reactive -->
    <ul id="todo-list" data-reactive="todos">
        <?php foreach ($todos as $todo): ?>
            <li data-id="<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>">
                <?=  htmlspecialchars($todo['name'], ENT_QUOTES, 'UTF-8') ?>
                <button type="button" onclick="deleteTodo(<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>)">Delete</button>
                <a href="/todo/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>/edit">Edit</a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <!-- Input untuk add todo -->
    <div>
        <input type="text" id="todo_input" placeholder="Add new todo">
        <button type="button" onclick="addTodo()">Add</button>
    </div>
    
    <!-- Template untuk re-render -->
    <template id="todo-item-template">
        <li data-id="{id}">
            {name}
            <button type="button" onclick="deleteTodo({id})">Delete</button>
            <a href="/todo/{id}/edit">Edit</a>
        </li>
    </template>
    
    <script src="/js/ReactiveUI.js"></script>
    <script>
        // Buat WebSocket connection
        const ws = new WebSocket('ws://localhost:8080');
        
        ws.onopen = function() {
            console.log('Connected to WebSocket');
            ws.send('get_todos');  // Request todos saat connect
        };
        
        ws.onerror = function(error) {
            console.error('WebSocket error:', error);
        };
        
        ws.onclose = function() {
            console.log('Disconnected');
        };
        
        // Register reactive element
        ReactiveUI.register({
            selector: '#todo-list',
            template: '#todo-item-template',
            dataKey: 'todos'
        });
        
        // Function add todo
        function addTodo() {
            const input = document.getElementById('todo_input');
            const value = input.value.trim();
            
            if (value) {
                ws.send(JSON.stringify({
                    action: 'add',
                    name: value
                }));
                input.value = '';
            }
        }
        
        // Function delete todo
        function deleteTodo(id) {
            ws.send(JSON.stringify({
                action: 'delete',
                id: id
            }));
        }
    </script>
</body>
</html>