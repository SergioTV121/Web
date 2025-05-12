$(document).ready((e)=>{
    $.ajax({
        method:"post",
        url:"./php/consultarIntegrantes.php",
        cache:false,
        success:(respAX)=>{
            integrantes=JSON.parse(respAX)  //Recibe el arreglo de integrantes
            $("h1").html("Lista de integrantes del TT "+(integrantes[0][6]).toUpperCase())
            integrantes.forEach(function(integrante)
            {   //Recorre el arreglo y añade cada tupla a la lista
                $("#integrantes").append(
                    "<tr>"+
                    "<td><input style='width:75px' type='text' readonly class='boleta' value='"+integrante[0]+"'></td>"+
                    "<td><input style='width:75px' type='text' readonly class='nombre' value='"+integrante[1]+"'></td>"+
                    "<td><input style='width:80px' type='text' readonly class='p_ap' value='"+integrante[2]+"'></td>"+
                    "<td><input style='width:50px' type='text' readonly class='s_ap' value='"+integrante[3]+"'></td>"+
                    "<td><input style='width:75px' type='text' readonly class='tel' value='"+integrante[4]+"'></td>"+
                    "<td><input style='width:130px'type='text' readonly class='correo' value='"+integrante[5]+"'></td>"+
                    "<td><input type='button' id='btnModificar' class='"+integrante[0]+"' value='Modificar'>"+
                    "<input type='button' id='btnEliminar' class='"+integrante[0]+"' value='Eliminar'></td>"+
                    "</tr>"
                    )
            })              
        }
    })
})