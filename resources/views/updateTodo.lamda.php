<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update {{ $todo['id'] }}</title>
</head>
<body>
        <h1>Update Todo ID: {{ $todo['id'] }}</h1>
        <div>
            <label for="name">Todo Name:</label>
            <input type="text" id="name" name="name" value="{{ $todo['name'] }}">
            <!-- htmlhint attr-unsafe-chars:false -->
            <button id="update" type="button" onclick="update({{$todo['id']}})">
                Update Todo
            </button>
        </div>

<script>
    const ws = new WebSocket('ws://localhost:8080');

    function update(id){
        const todo = document.getElementById('name');
        ws.send(JSON.stringify({
            action: 'update',
            id: id,
            name: todo.value
        }));
    }
    ws.onopen = function(){
        console.log("websocket connected");
        ws.send("Hello from client Update");
    }
    ws.onmessage = function(){}
    ws.onerror = function(){}
    ws.onclose = function(){}
    
</script>
</body>
</html>