$(document).ready(()=>{
    $("form#agregar").validetta({
      onValid:(e)=>{
        e.preventDefault(); //No usar GET
        var formData = new FormData($("form")[0]);
        $.ajax({
         method:"post",
         url:"./php/agregarTT.php",
         data:formData,
         cache:false,
         contentType: false,
         processData:false,
         success:(respAx)=>{
             if(respAx == 1)
             { 
               alert("TT agregado con exito");
               window.location.href="./menu.html"
             }
             else if(respAx == 2)
             {
                 alert("Error al agregar el Protocolo");
             }
             else
             {
                 alert("Error al agregar el TT");
             }             
         }                               
        });
     }
   });
 });