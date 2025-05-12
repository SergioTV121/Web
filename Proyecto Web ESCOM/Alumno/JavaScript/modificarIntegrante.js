$(document).ready(()=>{
    $.ajax({
        url:"./php/getSessionBoleta.php",
        success:(respAX)=>{
            integrante=JSON.parse(respAX)  //Recibe los datos del integrante
            $("#modificar").append(
            "<br><label>Boleta</label><input type='text' name='boleta' readonly value='"+integrante[0]+"'>"+
            "<br><label>Nombre</label><input type='text' name='nombre'  value='"+integrante[1]+"' data-validetta='required'>"+
            "<br><label>Primer Apellido</label><input type='text' name='primer_apellido'  value='"+integrante[2]+"' data-validetta='required'>"+
            "<br><label>Segundo Apellido</label><input type='text' name='segundo_apellido'  value='"+integrante[3]+"'>"+
            "<br><label>Telefono</label><input type='text' name='telefono'  value='"+integrante[4]+"' data-validetta='required'>"+
            "<br><label>Correo</label><input type='text' name='correo'  value='"+integrante[5]+"' data-validetta='required'>"+
            "<br><input type='submit' value='Actualizar Datos'>"
            )            
        }
    })
    $("#modificar").validetta({
        onValid:(e)=>{
          e.preventDefault(); //No usar GET
          $.ajax({
           method:"post",
           url:"./php/actualizarAlumno.php",
           data:$("#modificar").serialize(),
           cache:false,
           success:(respAx)=>{
               if(respAx == 1)  //Se actualizaron bien los datos
               { 
                alert("Datos actualizados con exito");
                window.location="./consultarIntegrantes.html"
                return false
               }
               else
               {
                   alert("Error al actualizar los datos del alumno");
               }            
           }                               
          });
       }
     });
})