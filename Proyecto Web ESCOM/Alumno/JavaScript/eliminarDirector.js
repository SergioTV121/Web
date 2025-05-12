$(document).on("click",".btnEliminar", function () {
    var director = $(this).attr('id'); // Obtiene el valor del atributo id
    $.ajax({ 
      method:"post",
      url:"./php/eliminarDirector.php",
      data:{id_director:director}, 
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