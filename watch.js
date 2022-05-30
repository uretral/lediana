const watch = require('node-watch');

const WebSocket = require('ws');

const wss = new WebSocket.Server({port: 8080});

watch([
    './resources/',
    './app/',
    // './resources/views/livewire',
    // './resources/views/components/editor',
    // './app/Http/Livewire'
], {recursive: true}, (evt, name) => {
    console.log('%s changed.', name);
    wss.clients.forEach((client) => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(name);
        }
    });
});
