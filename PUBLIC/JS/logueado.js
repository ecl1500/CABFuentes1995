document.addEventListener('DOMContentLoaded', function() {
    // Crear el div del mensaje
    const mensaje = document.createElement('div');
    mensaje.id = 'mensajePopup';
    mensaje.style.display = 'none';
    mensaje.style.position = 'fixed';
    mensaje.style.top = '50%';
    mensaje.style.left = '50%';
    mensaje.style.transform = 'translate(-50%, -50%)';
    mensaje.style.padding = '50px';
    mensaje.style.backgroundColor = 'red';
    mensaje.style.border = '2px solid red';
    mensaje.style.zIndex = '1000';
    mensaje.style.color = 'white';
    mensaje.style.textAlign = 'center';
    mensaje.style.fontWeight = 'bold';

    // Añadir contenido al mensaje
    mensaje.innerHTML = `
        <div style="background-color: red; padding: 10px;">Disponible Proximamente <br> Estamos trabajando para la proxima temporada <br> Disulpe las Molestias</div>
        <button id="cerrarPopup" style="margin-top: 10px; background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">X</button>
    `;
    document.body.appendChild(mensaje);

    // Función para mostrar el mensaje
    function mostrarMensaje() {
        mensaje.style.display = 'block';
    }

    // Añadir evento de clic a las secciones
    const tienda = document.querySelector('.tienda');
    if (tienda) {
        tienda.addEventListener('click', mostrarMensaje);
    }

    // Añadir evento de clic al botón de cerrar
    const cerrarPopup = document.getElementById('cerrarPopup');
    cerrarPopup.addEventListener('click', function() {
        mensaje.style.display = 'none';
    });
});
