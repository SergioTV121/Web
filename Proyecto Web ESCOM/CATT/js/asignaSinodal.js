var tts;
$(document).on("click",".asigSIN", function () {
    tts = $(this).attr('id'); // Obtiene el valor del atributo id
    console.log(tts);
});

$(document).ready(()=>{
$('select').formSelect();//Inicializacion para usar select materialize
$('.modal').modal();//Inicializacion para usar modals materialize
$("form#formAsigSin").validetta({//Uso de validetta
    display:'inline',
    bubblePosition: 'bottom',
    onValid:(e)=>{
        e.preventDefault();
        if(($("select#sin1").val() == $("select#sin2").val()) || ($("select#sin1").val() == $("select#sin3").val()) || ($("select#sin2").val() == $("select#sin3").val())){//Verificamos que no se repitan los sinodales
            //alert("Sinodales repetidos");
            Swal.fire({
                icon: "warning",
                title: 'Asignación de sinodales',
                html: "<h5>Sinodales repetidos. Favor de verificar la selección</h5>",
                confirmButtonText: 'Ok'   
            });
        }else{
            $.ajax({
                method:"post",
                url:"./php/asignaSinoAX.php",
                data:$("form#formAsigSin").serialize()+"&id="+tts,
                cache:false,
                success:(respAX)=>{
                    //alert(respAX);
                    let AX= JSON.parse(respAX);
                    let icono="";
                    if(AX.cod==1) {
                        icono="success";
                    }else{
                        icono="error";
                    }

                    Swal.fire({
                        icon: icono,
                        title: 'Asignación de sinodales',
                        html: AX.msj,
                        confirmButtonText: 'Ok',
                        didDestroy:()=>{
                            if(AX.cod==1){
                                window.location.href="./inicioCatt.php";
                            }
                        }    
                    });
                    
                    
                }
            });
        }
    }
});

})