$(document).ready(()=>{
   $("form#agregar").validetta({
     onValid:(e)=>{
       e.preventDefault(); //No usar GET
       $.ajax({
        method:"post",
        url:"./php/agregarAlumno.php",
        data:$("form#agregar").serialize(),
        cache:false,
        success:(respAx)=>{
            if(respAx == 1)
            { 
              alert("Alumno agregado con exito");
              window.location.href="./consultarIntegrantes.html"
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