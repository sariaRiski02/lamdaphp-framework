<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos - Real-time</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Todo List (Real-time)</h1>
        
        <!-- Input Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex gap-2">
                <input 
                    type="text" 
                    id="todo_input" 
                    placeholder="Add new todo..." 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button 
                    type="button" 
                    onclick="addTodo()" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition"
                >
                    Add
                </button>
            </div>
        </div>
        
        <!-- Todos Container dengan data-reactive -->
        <ul id="todo-list" class="space-y-3" data-reactive="todos">
            <?php foreach ($todos as $todo): ?>
                <li 
                    data-id="<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>" 
                    class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center hover:shadow-lg transition"
                >
                    <span class="text-lg text-gray-700"><?=  htmlspecialchars($todo['name'], ENT_QUOTES, 'UTF-8') ?></span>
                    <div class="flex gap-2">
                        <a 
                            href="/todo/<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>/edit" 
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition text-sm"
                        >
                            Edit
                        </a>
                        <button 
                            type="button" 
                            onclick="deleteTodo(<?=  htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8') ?>)" 
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition text-sm"
                        >
                            Delete
                        </button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <!-- Template untuk re-render -->
    <template id="todo-item-template">
        <li 
            data-id="{id}" 
            class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center hover:shadow-lg transition"
        >
            <span class="text-lg text-gray-700">{name}</span>
            <div class="flex gap-2">
                <a 
                    href="/todo/{id}/edit" 
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition text-sm"
                >
                    Edit
                </a>
                <button 
                    type="button" 
                    onclick="deleteTodo({id})" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition text-sm"
                >
                    Delete
                </button>
            </div>
        </li>
    </template>
    
    <script src="../js/ReactiveUI.js"></script>
    <script>
        // ReactiveUI Library
        const ReactiveUI = {
            elements: {},
            
            register: function(config) {
                const container = document.querySelector(config.selector);
                const templateEl = document.querySelector(config.template);
                
                if (!container || !templateEl) {
                    console.error('Container or template not found', {
                        selector: config.selector,
                        template: config.template
                    });
                    return;
                }
                
                const template = templateEl.innerHTML;
                const dataKey = config.dataKey || 'data';
                
                this.elements[config.selector] = {
                    container: container,
                    template: template,
                    dataKey: dataKey,
                    selector: config.selector
                };
                
                console.log('ReactiveUI registered:', config.selector);
                
                if (window.ws) {
                    window.ws.onmessage = function(event) {
                        const response = JSON.parse(event.data);
                        
                        if (response.status === 'success') {
                            ReactiveUI.render(config.selector, response.data);
                        }
                    };
                }
            },
            
            render: function(selector, data) {
                const config = this.elements[selector];
                if (!config) return;
                
                const container = config.container;
                const template = config.template;
                
                console.log('Rendering', data.length, 'items');
                
                container.innerHTML = '';
                
                data.forEach(item => {
                    let html = template;
                    
                    for (let key in item) {
                        html = html.replace(new RegExp('{' + key + '}', 'g'), item[key]);
                    }
                    
                    const wrapper = document.createElement('div');
                    wrapper.innerHTML = html;
                    const element = wrapper.firstChild;
                    
                    container.appendChild(element);
                });
            }
        };

        // Buat WebSocket connection
        const ws = new WebSocket('ws://localhost:8080');
        
        ws.onopen = function() {
            console.log('Connected to WebSocket');
            ws.send(JSON.stringify({ action: 'get' }));  // Request todos saat connect
        };
        
        ws.onerror = function(error) {
            console.error('WebSocket error:', error);
            alert('Connection error!');
        };
        
        ws.onclose = function() {
            console.log('Disconnected from WebSocket');
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
            if (confirm('Delete this todo?')) {
                ws.send(JSON.stringify({
                    action: 'delete',
                    id: id
                }));
            }
        }
    </script>
</body>
</html>
