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
    const ws = new WebSocket('ws://localhost:8080');
    
    function addTodo() {
        const input = document.getElementById('todo_input');
        const value = input.value.trim();
        if(value) {
            ws.send(JSON.stringify({action: 'add', name: value}));
            input.value = '';
        }
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
                
                todos.forEach(todo => {
                    const li = document.createElement('li');
                    li.textContent = todo.id + '. ' + todo.name;
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