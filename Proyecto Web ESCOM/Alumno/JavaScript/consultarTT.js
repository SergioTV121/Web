$(document).ready(()=>{
        $.ajax({
         method:"post",
         url:"./php/consultarTT.php",
         cache:false,
         success:(respAx)=>{ 
          resultado=JSON.parse(respAx)
            $("h1").html("Datos del TT")
            resultado.forEach(function(res)
            {   //Recorre el arreglo y añade cada tupla a la lista
                $("#tt").append(
                    "<tr>"+
                    "<td><input style='width:60px' type='text' readonly class='id_tt' value='2021-2-"+res[0]+"'></td>"+
                    "<td><input style='width:120px' type='text' readonly class='titulo' value='"+res[1]+"'></td>"+
                    "<td><textarea cols='30' rows='3' readonly class='resumen'>"+res[2]+"</textarea></td>"+
                    "<td><a href='./php/Protocolos/"+res[0]+".pdf'>Protocolo</a></td>"+
                    "</tr>"
                    )
            })   
         }                               
        });
     });