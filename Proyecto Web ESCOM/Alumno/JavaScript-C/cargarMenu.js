$(document).ready(()=>{
       $.ajax({
        method:"post",
        url:"./php/validarSesion.php",
        cache:false,
        success:(respAx)=>{
            if(respAx!=0)
            {
              usuario=JSON.parse(respAx)  //Recibe nombre del usuario
              $("#menu").append("<h1>Bienvenido "+usuario[0][0]+"</h1>")
              if(usuario[0][1]==null)
              {
              $(".consulta").remove()
              $("#menu").append("<h2>Aun no tienes un TT asignado</h2>")
              $("#menu").append("<a href='./agregarTT.html'>Nuevo TT</a>") 
              }
              else
              {
                $("#menu").append("<h2>Tu TT es el "+usuario[0][1]+"</h2>")
              }
            }
            else
            {
                window.location.href="./Login.html"
            }            
                       
        }                               
       });

      /* $.ajax({
        method:"post",
        url:"../backend/php/validarTT.php",
        cache:false,
        success:(respAx)=>{
            if(respAx==0)
            {
              $(".consulta").remove()
              $("#menu").append("<h2>Aun no tienes un TT asignado</h2>")
              $("#menu").append("<a href='./agregarTT.html'>Nuevo TT</a>")              
            }          
                       
        }                               
       });*/
 });