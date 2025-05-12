$(document).ready(()=>{
    $("form#frmLogin").validetta({
        onValid:(e)=>{
            e.preventDefault();
            $.ajax({
                method:"post",
                url:"./php/loginCattAX.php",
                data:$("form#frmLogin").serialize(),
                cache:false,
                success:(respAX)=>{
                    if(respAX==1){
                        window.location.href="./inicioCatt.php";
                    }else{
                        //alert("Tus datos no estan registrados");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '<h5>Tus datos no estan registrados</h5>',
                            confirmButtonText: 'Ok'   
                        })
                    }
                }
            });
        }
    });
    
});