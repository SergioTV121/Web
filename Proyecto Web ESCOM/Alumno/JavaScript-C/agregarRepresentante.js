$(document).ready(()=>{
    $("form#agregar").validetta({
      onValid:(e)=>{
        e.preventDefault(); //No usar GET
        $.ajax({
         method:"post",
         url:"./php/agregarRepresentante.php",
         data:$("form#agregar").serialize(),
         cache:false,
         success:(respAx)=>{
             if(respAx == 2)
             { 
               alert("No se pudo agregar el alumno\nYa esta registrado este alumno");
             }
             else if(respAx == 1)
             { 
               alert("Alumno agregado con exito");
               window.location.href="./Login.html"
             }
             else
             {
                 alert("Error al agregar el alumno");
             }            
         }                               
        });
     }
   });
 });