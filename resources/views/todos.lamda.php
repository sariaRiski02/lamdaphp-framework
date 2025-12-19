<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    
    <ul id="daftar_todos">
        <li></li>
    </ul>

    <input type="text" id="todo_input" placeholder="Add a new todo">
    <button onclick="addTodo()">Add</button>

<script>
    const endpoint = 'ws://localhost:8080';
    const ws = new WebSocket(endpoint);
    
    function addTodo() {
        const input = document.getElementById('todo_input');
        const value = input.value.trim();
        if(value) {
            ws.send(JSON.stringify({
                action: 'add', name: value
            }));
            input.value = '';
        }
    }

    function deleteTodo(id){
        ws.send(JSON.stringify({
            action: 'delete', id: id
        }));
    }


    ws.onopen = function(){
        console.log('Connected to WebSocket server');
        ws.send("Hello from client");
    }

    ws.onmessage = function(event){
        console.log('Raw message:', event.data);
        
        try {
            const response = JSON.parse(event.data);
            console.log('Parsed response:', response);
            
            if(response.status === 'success') {
                const todos = response.data;
                const container = document.getElementById('daftar_todos');
                container.innerHTML = ''; // Clear sebelumnya
                var count = 1;
                todos.forEach(todo => {
                    const li = document.createElement('li');
                    const button = document.createElement('button');
                    const anch = document.createElement('a');
                    anch.textContent = 'update';
                    anch.href = 'http://localhost:8000/update/'+todo.id;
                    button.href = endpoint;
                    button.textContent = 'delete';
                    li.textContent = count++ + '. ' + todo.name + ' ';

                    button.onclick = function(){
                        deleteTodo(todo.id);
                    };

                    li.appendChild(button);
                    li.appendChild(anch);
                    container.appendChild(li);
                });
            } else {
                console.error('Error:', response.message);
            }
        } catch(e) {
            console.error('Parse error:', e);
            console.log('Raw data:', event.data);
        }
    }

    ws.onerror = function(error){
    console.error('WebSocket error:', error);
    }

    ws.onclose = function(){
    console.log('Disconnected from server');
    }
</script>
</body>
</html>