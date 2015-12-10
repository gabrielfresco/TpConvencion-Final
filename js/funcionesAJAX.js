function Mostrar(queMostrar)
{
	
	var funcionAjax=$.ajax({
		url:"php/operaciones.php",
		type:"post",
		data:{queHago:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#content").html(retorno);
      			
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostrarLogin()
{
    
    var funcionAjax=$.ajax({
        url:"php/operaciones.php",
        type:"post",
        data:{queHago:"MostrarLogin"}
    });
    funcionAjax.done(function(retorno){
        $("#panelLogin").html(retorno);

            
    });
    funcionAjax.fail(function(retorno){
        $("#principal").html(":(");
        
    });
    funcionAjax.always(function(retorno){
        //alert("siempre "+retorno.statusText);

    });
}

function MostrarEstadisticas()
{
    var funcionAjax=$.ajax({
        url:"php/operaciones.php",
        type:"post",
        data:{queHago:"Estadistica"}
    });
    funcionAjax.done(function(retorno){
        $("#content").html(retorno);
        Estadisticas();

            
    });
    funcionAjax.fail(function(retorno){
        $("#principal").html(":(");
        
    });
    
} 

function Estadisticas()
{

      $(function() {
    /*
    * http://www.highcharts.com/demo
    */
   
    /* Oculto la tabla */
    $("#tabla").hide();

    $('#content').highcharts({     
        data: {
            table:'tabla' // id de la tabla
        },
        chart: {
            // type: 'column'
            type: 'pie' 
        },
        title: {
            text: 'Cantidad de invitados por empresa'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Invitados'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
    });
}
