import './bootstrap';

window.Echo.private(`notifications.${userId}`)
    .listen('FriendRequestNotification', (event) => {
        alert(event.message); 
    });
