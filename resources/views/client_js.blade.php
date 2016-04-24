var xhr = new XMLHttpRequest();
xhr.open('POST', '{{ getenv("APP_URL") }}/send');
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = function() {
    if (xhr.status === 200) {
        // var reponse = JSON.parse(xhr.responseText);
        alert('Fwrdto.me: Link sent!');
    }
};
xhr.send(JSON.stringify({
    apiKey: "{{ $apiKey }}",
    url: window.location.href,
    title: document.title
}));