if ("WebSocket" in window) {
    // Let us open a web socket
    var ws = new WebSocket("ws://localhost:8080/");

    ws.onopen = function () {
        console.log("HMR open");
    };
    ws.onmessage = function (evt) {
        var received_msg = evt.data;
        console.log("Message is received...", received_msg);
        window.dispatchEvent(new CustomEvent('hmr', {detail: received_msg}));
        window.livewire.emit('hmrupdated' + (received_msg));
        window.location.reload();
    };

    ws.onclose = function () {
        console.log("HRM Connection is closed...");
    };
} else {
    console.log("HMR WebSocket NOT supported by your Browser!");
}
