function VerEnMapa()
{    
  var provincia = $("#provincia").val();
  var localidad = $("#localidad").val()
  var direccion = $("#direccion").val();
   
  if(provincia !=undefined && provincia != "")
    var punto = provincia+","+ localidad+","+direccion+", Argentina";  
    
    else    
    var punto = "Buenos Aires,Avellaneda, Mitre 750, Argentina";
  
   //alert(punto); 
   
    var miFuncion=$.ajax({
    url:"php/operaciones.php",
    type:"post",
    data:{
      queHago:"VerEnMapa"

    }
  });
    miFuncion.done(function(retorno){
        $("#content").html(retorno);
        $("#punto").val(punto);
        $("#ID").val(id);
    
  });

     miFuncion.fail(function(retorno){
        alert("No anda");  });
}



