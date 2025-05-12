$(document).on("click","#btnModificar", function () {
  var boleta = $(this).attr('class'); // Obtiene el valor del atributo class
  $.ajax({ 
    method:"post",
    url:"./php/startSessionBoleta.php",
    data:{boleta:boleta},  //Ejecuta un php para generar la cookie con la boleta
    cache:false
  });
  window.location.href="./modificarAlumno.html" //Me redirige al formulario de modificar alumno
});