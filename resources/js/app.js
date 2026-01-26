
const element = document.querySelectorAll('[data-bind]');
let dataBind = [];
element.forEach(el => {
    dataBind.push(el.dataset.bind);
});
const eventSource = new EventSource('/events');
eventSource.onopen = function(){
    console.log('Connection to server opened');
}
eventSource.addEventListener('update', function(event){
    console.log(event.lastEventId);
    fetch(window.location.href,
        {
            method: 'GET',
            headers: {
                'realtime' : true,
                'X-Data': JSON.stringify({
                    url: window.location.href,
                    data: dataBind
                })
            }
        }
    )
    .then(res=>res.json())
    .then(data=>{
        const receivedData = data.data;
        for(const key in receivedData){
            const bindEl = document.querySelector(`[data-bind="${key}"]`);
            if(bindEl){
                bindEl.innerHTML = receivedData[key];
            }
        }
    }).catch(err=>console.error("error terjadi: " + err));
});

eventSource.onclose = function(){
    console.log('Connection to server closed');
}

eventSource.onerror = function(err){
    console.error(err);
    console.error('EventSource failed:', err);
}
