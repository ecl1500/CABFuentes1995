// Obtener referencia al div donde se mostrarán las noticias
var noticiasDiv = document.getElementById('noticia');

// Realizar una solicitud AJAX al servidor para obtener las noticias
var xhr = new XMLHttpRequest();
xhr.open('GET', '../PHP/getNoticias.php', true);
xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
        // Convertir la respuesta JSON en un objeto JavaScript
        var noticias = JSON.parse(xhr.responseText);

        // Mostrar las noticias en el div correspondiente
        noticias.forEach(function (noticia) {
            var noticiaHTML = '<div class="noticia">';
            noticiaHTML += '<h2>' + noticia.titular + '</h2>';
            noticiaHTML += '<p>' + noticia.contenido + '</p>';
            noticiaHTML += '<p>Publicado por: ' + noticia.nombre + ' ' + noticia.apellido + '</p>';
            noticiaHTML += '<p>Fecha de publicación: ' + noticia.fechaPublicacion + '</p>';
            noticiaHTML += '</div>';
            noticiasDiv.innerHTML += noticiaHTML;
        });
    } else {
        console.error('Error al obtener las noticias');
    }
};
xhr.onerror = function () {
    console.error('Error de conexión');
};
xhr.send();
