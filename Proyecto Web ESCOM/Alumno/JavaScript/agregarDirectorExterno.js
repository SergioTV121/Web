$(document).ready(()=>{
  $("form#agregar").validetta({
    onValid:(e)=>{
      e.preventDefault(); //No usar GET
      var formData = new FormData($("form")[0]);
      $.ajax({
       method:"post",
       url:"./php/agregarDirectorExterno.php",
       data:formData,
       cache:false,
       contentType: false,
       processData:false,
       success:(respAx)=>{
           if(respAx == 1)
           { 
             alert("Director agregado con exito");
             window.location.href="./menu.html"
           }
           else if(respAx == 2)
           {
               alert("Error al agregar el CV");
           }
           else if(respAx == 3)
           {
               alert("No se pudo agregar el Director\nYa has aclanzado el maximo de directores en tu TT");
           }
           else
           {
               alert("Error al agregar el Director");
           }             
       }                               
      });
   }
 });
});