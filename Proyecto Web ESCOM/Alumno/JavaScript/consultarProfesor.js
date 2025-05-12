$(document).ready(()=>{
    $("form#agregar").validetta({
      onValid:(e)=>{
        e.preventDefault(); //No usar GET
        $.ajax({
         method:"post",
         url:"./php/consultarProfesor.php",
         data:$("form#agregar").serialize(),
         cache:false,
         success:(respAx)=>{
          resultado=JSON.parse(respAx)
          if(resultado!=0)
          {
            $("#titulo_h").html("Datos del Profesor")
            $("label").remove()
            $("#id_profesor").remove()
            $("#btnConsultar").remove()
            $("#agregar").prepend(
              "ID:<input style='width:75px' name='id' type='text' readonly class='id' value='"+resultado[0][0]+"'><br>"+
              "Nombre:<input style='width:100px' type='text' readonly class='nombre' value='"+resultado[0][1]+"'><br>"+
              "Primer Apellido:<input style='width:80px' type='text' readonly class='p_ap' value='"+resultado[0][2]+"'><br>"+
              "Telefono:<input style='width:75px' type='text' readonly class='tel' value='"+resultado[0][3]+"'><br>"+
              "Correo:<input style='width:150px'type='text' readonly class='correo' value='"+resultado[0][4]+"'><br>"+
              "<input type='button' id='btnAgregar' value='Confirmar'>"+
              "<a href='./menu.html'>Cancelar</a>")
          }
          else
          {
            alert("No se encontro el ID")
          }
            
         }                               
        });
     }
   });

 });