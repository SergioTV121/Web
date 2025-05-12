$(document).ready(()=>{
   $("form#xd").validetta({
     onValid:(e)=>{
       e.preventDefault(); //No usar GET
       $.ajax({
        method:"post",
        url:"./php/agregarAlumno.php",
        data:$("form#xd").serialize(),
        cache:false,
        success:(respAx)=>{
            if(respAx == 1)
            { 
              alert("Alumno agregado con exito");
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