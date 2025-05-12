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
              $(".agregar").remove()
              $("#menu").append("<h2>Aun no tienes un TT asignado</h2>")
              $("#menu").append("<a href='./agregarTT.html'>Nuevo TT</a>") 
              }
            }
            else
            {
                window.location.href="./Login.html"
            }            
                       
        }                               
       });
 });