///////////////////////////////////////////////////////////////////////////////
////////////// BOTONES EDITAR, AGREGAR Y ELIMINAR CAPITULOS  /////////////////
/////////////////////////////////////////////////////////////////////////////
function addCaps() {
    // Redirigir a la página de agregar capitulos
    window.location.href = 'add/caps';
}

function editCaps(id) {
    confirmEditionCaps().then((confirmacion) => {
        if (confirmacion) {
            window.location.href = `edit/caps/${id}`;
        }
    });
}

function confirmEditionCaps() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <b class="alert-heading">¿Estás seguro de que deseas editar este Capitulo??</b>
                <button class="btn btn-primary m-1" id="btn-aceptar">Sí, editar</button>
                <button class="btn btn-secondary m-1" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        // Manejar el clic en el botón de aceptar
        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        // Manejar el clic en el botón de cancelar
        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}

function deleteCaps(id) {
    confirmDeleteCaps().then((confirmacion) => {
        if (confirmacion) {
            window.location.href = `delete/caps/${id}`;
        }
    });
}

function confirmDeleteCaps() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <h4 class="alert-heading">¿Estás seguro de que deseas eliminar esta temporada?</h4>
                <b>Si eliminas la temporada, se perderán TODOS los capitulos asociados.</b>
                <button class="btn btn-danger" id="btn-aceptar">Sí, eliminar</button>
                <button class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}

////////////////////////////////////////////////////////////////////////////////
////////////// BOTONES EDITAR, AGREGAR Y ELIMINAR TEMPORADAS  /////////////////
//////////////////////////////////////////////////////////////////////////////
function addTemp() {
    // Redirigir a la página de agregar temporada
    window.location.href = 'add/season';
}

function editTemp(idTemporada) {
    confirmEditionTemp().then((confirmacion) => {
        if (confirmacion) {
            window.location.href = `edit/season/${idTemporada}`;
        }
    });
}

function confirmEditionTemp() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <b class="alert-heading">¿Estás seguro de que deseas editar esta temporada?</b>
                <button class="btn btn-primary m-1" id="btn-aceptar">Sí, editar</button>
                <button class="btn btn-secondary m-1" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        // Manejar el clic en el botón de aceptar
        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        // Manejar el clic en el botón de cancelar
        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}

function deleteTemp(idTemporada) {
    confirmDeleteTemp().then((confirmacion) => {
        if (confirmacion) {
            window.location.href = `delete/season/${idTemporada}`;
        }
    });
}

function confirmDeleteTemp() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <h4 class="alert-heading">¿Estás seguro de que deseas eliminar esta temporada?</h4>
                <b>Si eliminas la temporada, se perderán TODOS los capitulos asociados.</b>
                <button class="btn btn-danger" id="btn-aceptar">Sí, eliminar</button>
                <button class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}

////////////////////////////////////////////////////////////////////////////////
////////////// BOTONES EDITAR, AGREGAR Y ELIMINAR PERSONAJES  /////////////////
//////////////////////////////////////////////////////////////////////////////

function addCharact() {
    window.location.href = 'add/chars';
}

function editChar(charId) {
    confirmEditChar().then((confirmacion) => {
        if (confirmacion) {
            // Si el usuario confirma la edición, se redirige a la página de edición
            window.location.href = `edit/chars/${charId}`;
        }
    });
}

function confirmEditChar() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <b class="alert-heading">¿Estás seguro de que deseas editar este personaje?</b>
                <button class="btn btn-primary m-1" id="btn-aceptar">Sí, editar</button>
                <button class="btn btn-secondary m-1" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        // Manejar el clic en el botón de aceptar
        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        // Manejar el clic en el botón de cancelar
        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}

function deleteChar(charId) {
    confirmDeleteChar().then((confirmacion) => {
        if (confirmacion) {
            // Si el usuario confirma la eliminación, se realiza la solicitud de eliminación
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
    });
}

function confirmDeleteChar() {
    return new Promise((resolve) => {
        const divConfirmacion = document.createElement('div');
        divConfirmacion.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alert-confirm">
                <h4 class="alert-heading">¿Estás seguro de que deseas eliminar este personaje?</h4>
                <button class="btn btn-danger" id="btn-aceptar">Sí, eliminar</button>
                <button class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
            </div>
        `;

        // Estilos para centrar el div
        divConfirmacion.style.position = 'fixed';
        divConfirmacion.style.top = '50%';
        divConfirmacion.style.left = '50%';
        divConfirmacion.style.transform = 'translate(-50%, -50%)';
        divConfirmacion.style.zIndex = '1000'; // Asegurarse de que esté por encima de otros elementos
        divConfirmacion.style.borderRadius = '8px'; // Bordes redondeados

        document.body.appendChild(divConfirmacion);

        // Manejar el clic en el botón de aceptar
        document.getElementById('btn-aceptar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(true);
        };

        // Manejar el clic en el botón de cancelar
        document.getElementById('btn-cancelar').onclick = function () {
            document.body.removeChild(divConfirmacion);
            resolve(false);
        };
    });
}