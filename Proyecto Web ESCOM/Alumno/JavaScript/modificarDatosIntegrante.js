$(document).ready(()=>{
    $.ajax({
        url:"./php/getSessionBoleta.php",
        success:(respAX)=>{
            integrante=JSON.parse(respAX)  //Recibe los datos del integrante
            $("#modificar").append(
            "<br><label for boleta>Boleta</label><input type='text' name='boleta' readonly value='"+integrante[0]+"'>"+
            "<br><label for nombre>Nombre</label><input type='text' name='nombre'  value='"+integrante[1]+"' data-validetta='required'>"+
            "<br><label for p_ap>Primer Apellido</label><input type='text' name='p_ap'  value='"+integrante[2]+"' data-validetta='required'>"+
            "<br><label for s_ap>Segundo Apellido</label><input type='text' name='s_ap'  value='"+integrante[3]+"'>"+
            "<br><label for tel>Telefono</label><input type='text' name='tel'  value='"+integrante[4]+"' data-validetta='required'>"+
            "<br><label for correo>Correo</label><input type='text' name='correo'  value='"+integrante[5]+"' data-validetta='required'>"+
            "<br><input type='submit' value='Actualizar Datos'>"
            )            
        }
    })
})