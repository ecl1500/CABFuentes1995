document.addEventListener("DOMContentLoaded", function () {
  var noticiasDiv = document.getElementById("noticiasGrid");

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "PUBLIC/PHP/getNoticias.php", true);
  xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 400) {
          var noticias = JSON.parse(xhr.responseText);
          noticias.forEach(function (noticia) {
              var noticiaHTML = '<div class="col-md-4 mb-4">';
              noticiaHTML += '<div class="noticia p-3 border">';
              noticiaHTML += "<h3>" + noticia.titular + "</h3>";
              noticiaHTML += "<p>" + noticia.contenido + "</p>";
              noticiaHTML += '<p class="text-muted">Publicado por: ' + noticia.nombre + " " + noticia.apellido + "</p>";
              noticiaHTML += '<p class="text-muted">Fecha de publicación: ' + noticia.fechaPublicacion + "</p>";
              noticiaHTML += "</div>";
              noticiaHTML += "</div>";
              noticiasDiv.innerHTML += noticiaHTML;
          });
      } else {
          console.error("Error al obtener las noticias");
      }
  };
  xhr.onerror = function () {
      console.error("Error de conexión");
  };
  xhr.send();
});