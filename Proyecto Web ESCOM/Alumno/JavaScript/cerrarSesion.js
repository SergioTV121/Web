$(document).on("click","#btnCerrarSesion",()=>{
    $.ajax({
     method:"post",
     url:"./php/cerrarSesion.php",
     cache:false,
     success:(respAx)=>{
         if(respAx == 1)
         { 
           alert("Sesion Cerrada con Exito");
           window.location="./Login.html"
         }
         else
         { 
           alert("Algo salio mal");
         }             
     }                               
});     
});