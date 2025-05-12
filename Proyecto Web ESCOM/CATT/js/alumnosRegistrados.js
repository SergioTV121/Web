$(document).ready(()=>{
    $("form#frmAlumnoReg").validetta({
        onValid:(e)=>{
            e.preventDefault();
            $.ajax({
                method:"post",
                url:"./php/alumnosRegAX.php",
                data:$("form#frmAlumnoReg").serialize(),
                cache:false,
                success:(respAX)=>{
                    let AX=JSON.parse(respAX);
                    AX.forEach(function(alumno){
                        if(alumno[0] == 1){
                            $("input#boleta").val(""); 
                            $("#alumno").append(
                                "<tr>"+
                                "<td>"+alumno[1]+"</td>"+
                                "<td>"+alumno[2]+"</td>"+
                                "<td>"+alumno[3]+"</td>"+
                                "<td>"+alumno[4]+"</td>"+
                                "<td>"+alumno[5]+"</td>"+
                                "<td>"+alumno[6]+"</td>"+
                                "<td>2021-2-"+alumno[7]+"</td>"+                                
                                "<td>"+alumno[8]+"</td>"+
                                "<td>"+alumno[9]+"<br>"+alumno[10]+"<br>"+alumno[11]+"</td>"+
                                "</tr>"
                            )
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: alumno[1],
                                confirmButtonText: 'Ok'   
                            })
                            //alert(alumno[1]);
                            $("input#boleta").val(""); 
                        }
                            
                        
                    })
                
                    
                }
            });
        }
    });
    
});