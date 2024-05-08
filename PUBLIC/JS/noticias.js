$(document).ready(function () {
  // Consulta para obtener noticias
  $.ajax({
    url: "obtenerNoticias.php",
    type: "GET",
    dataType: "json",
    success: function (noticias) {
      var html = "";

      for (var i = 0; i < noticias.length; i++) {
        var noticia = noticias[i];
        html += '<div class="noticia">';
        html += "<h3>" + noticia.titular + "</h3>";
        html += "<p>" + noticia.contenido + "</p>";
        html += "<p>Autor: " + noticia.nombre + " " + noticia.apellido + "</p>";
        html += "<p>Fecha: " + noticia.fechaPublicacion + "</p>";
        html += "</div>";
      }

      $("#noticia").html(html);
    },
  });
});
