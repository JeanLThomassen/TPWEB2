function editarTemporada(idTemporada) {
    const confirmacion = confirmarEdicion();
    if (confirmacion) {
        window.location.href = `edit/season/${idTemporada}`;
    }
}

function confirmarEdicion() {
    const divConfirmacion = document.createElement('div');
    divConfirmacion.innerHTML = `
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">¿Estás seguro de que deseas editar esta temporada?</h4>
            <p>Si editas la temporada, se perderán los cambios no guardados.</p>
            <button class="btn btn-primary" onclick="aceptarEdicion()">Sí, editar</button>
            <button class="btn btn-secondary" onclick="cancelarEdicion()">Cancelar</button>
        </div>
    `;
    document.body.appendChild(divConfirmacion);

    let respuesta = false;
    function aceptarEdicion() {
        respuesta = true;
        document.body.removeChild(divConfirmacion);
    }
    function cancelarEdicion() {
        respuesta = false;
        document.body.removeChild(divConfirmacion);
    }

    return new Promise(resolve => {
        setTimeout(() => {
            resolve(respuesta);
        }, 100);
    });
}

function agregarPersonaje() {
    window.location.href = 'add/chars';
}

function eliminarChar(charId) {
    if (confirm("¿Estás seguro de que deseas eliminar este personaje?")) {
        fetch(`delete/chars/${charId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest' // Opcional, pero puede ser útil para identificar la solicitud
            },
            body: JSON.stringify({}) // Puedes enviar datos adicionales si es necesario
        })
            .then(response => {
                if (response.ok) {
                    // Aquí puedes manejar la respuesta, como eliminar el elemento de la lista
                    document.location.reload(); // Recargar la página para reflejar los cambios
                } else {
                    alert("Error al eliminar el personaje.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Error al eliminar el personaje.");
            });
    }
}

