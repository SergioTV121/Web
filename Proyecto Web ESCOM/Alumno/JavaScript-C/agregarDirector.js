$(document).on("click","#btnAgregar",()=>{
        $.ajax({
         method:"post",
         url:"./php/agregarDirector.php",
         data:$("form#agregar").serialize(),
         cache:false,
         success:(respAx)=>{
             if(respAx == 1)
             { 
               alert("Director agregado con exito");
               window.location.href="./menu.html"
             }
             else if(respAx == 2)
             { 
               alert("El director ya ha sido agregado al TT");
             }
             else if(respAx == 3)
             { 
               alert("Ya has alcanzado el maximo de directores");
             }
             else
             {
                 alert("Error al agregar el Director");
             }            
         }                               
    });     
 });