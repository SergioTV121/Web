$(document).on("click","#btnEliminar", function () {
    var boleta = $(this).attr('class'); // Obtiene el valor del atributo class
    $.ajax({ 
      method:"post",
      url:"./php/eliminarAlumno.php",
      data:{boleta:boleta}, 
      cache:false,
      success:(respAX)=>{
          if(respAX == 1)
          {
            alert("Registro eliminado con exito")
            location.reload()
          }
          else
          {
            alert("No se pudo eliminar el registro")   
          }
      }
    })
  })