window.Echo.channel('chat')
    .listen('.message.sent', (data) => {
        console.log("رسالة جديدة:", data.message);
        let chatBox = document.getElementById("chat-box");
        chatBox.innerHTML += `<p><strong>${data.message.user.name}:</strong> ${data.message.message}</p>`;
    });
