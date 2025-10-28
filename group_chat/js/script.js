const chatBox = document.getElementById('chat-box');
const form = document.getElementById('chat-form');
const input = document.getElementById('message');

form.addEventListener('submit', e => {
    e.preventDefault();

    fetch('send_message.php', {
        method: 'POST',
        body: new URLSearchParams({ message: input.value })
    }).then(() => {
        input.value = '';
    });
});

function isImageUrl(url) {
    return(url.match(/\.(jpeg|jpg|gif|png|webp)$/i) != null);
}

function loadMessages() {
    const atBottom = chatBox.scrollTop + chatBox.clientHeight >= chatBox.scrollHeight - 10;

    fetch('get_messages.php')
        .then(res => res.json())
        .then(data => {
            chatBox.innerHTML = data.map(msg => {
                const cls = msg.is_self ? 'self' : '';
                const username = msg.is_self ? 'You' : msg.username;

                let content = '';
                if (isImageUrl(msg.message.trim())) {
                    content = `<img src="${msg.message.trim()}" class="chat-image">`;
                } else {
                    content = `<span>${msg.message}</span>`;
                }

                return `<p class="${cls}"><strong>${username}</strong><br>${content}</p>`;
            }).join('');

            if (atBottom) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });
}

setInterval(loadMessages, 2000);
loadMessages();
