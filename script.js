var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

function limpiar() {
    document.getElementById("formulario").reset();
    setTimeout(function() {
        respuesta.innerHTML = '';
    },3000);
}

formulario.addEventListener('submit', function (e) {
    e.preventDefault();

    var datos = new FormData(formulario);

    fetch('connect.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data)

            respuesta.innerHTML = '<div class="alert alert-primary" role="alert">' + data + '</div>';
            limpiar();
        })
});

