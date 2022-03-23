//nav menu
var element = document.getElementById('apiFacebok').onclick = function () {
    console.log('Hello entro');
    document.getElementById('viewport').data = "apifacebook/index.html";
};
var element = document.getElementById('carritoCompras').onclick = function () {
    console.log('navigate to carrito de compras');
    document.getElementById('viewport').data = "testAPP/index.html";
};
var element = document.getElementById('apiStreaming').onclick = function () {
    console.log('navigate to api streaming');
    document.getElementById('viewport').data = "APISTREAMING/index.php";
};
var element = document.getElementById('apiYoutube').onclick = function () {
    console.log('navigate to api youtube');
    document.getElementById('viewport').data = "APIyoutube/index.php";
};


