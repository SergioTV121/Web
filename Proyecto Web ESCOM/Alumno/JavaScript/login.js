$(document).on("click","#btnLogin", function () {
    $.ajax({ 
      method:"post",
      url:"./php/login.php",  //Ejecuta un php para generar la session con la boleta
      data:$("form#login").serialize(),  //Manda los datos del formulario login
      cache:false,
      success:(respAX)=>{
        if(respAX==1)
        {
          alert("Sesion Iniciada con Exito")
          window.location.href="menu.html"
        }
        else if(respAX==0)
        {
          alert("No se pudo iniciar sesion")
        }
      }
    });
  });