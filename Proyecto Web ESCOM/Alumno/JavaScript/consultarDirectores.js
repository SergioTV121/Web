$(document).ready((e)=>{
    $.ajax({
        method:"post",
        url:"./php/consultarDirectores.php",
        cache:false,
        success:(respAX)=>{
            directores=JSON.parse(respAX)  //Recibe el arreglo de integrantes
            $("h1").html("Lista de Directores del TT 2022-2-"+(directores[0][5]).toUpperCase())
                directores.forEach(function(director)
                {   //Recorre el arreglo y añade cada tupla a la lista
                    $("#directores").append(
                        "<tr>"+
                        "<td><input style='width:75px' type='text' readonly class='id' value='"+director[0]+"'></td>"+
                        "<td><input style='width:75px' type='text' readonly class='nombre' value='"+director[1]+"'></td>"+
                        "<td><input style='width:80px' type='text' readonly class='p_ap' value='"+director[2]+"'></td>"+
                        "<td><input style='width:75px' type='text' readonly class='tel' value='"+director[3]+"'></td>"+
                        "<td><input style='width:130px'type='text' readonly class='correo' value='"+director[4]+"'></td>"+
                        "<td><input type='button' class='btnEliminar' id='"+director[0]+"' value='Eliminar'>"+
                        "</tr>"
                        )
                })                     
        }
    })
})