<?php
require_once("/clases/validadora.php");
require_once("/clases/invitado.php");
require_once("/clases/AccesoDatos.php");
//
?>

<!doctype html>
<html lang="en">
<head>

<title>Convencion</title>

<?php require_once"partes/referencias.php";?>

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>
<script type="text/javascript" src="js/funcionesAJAX.js"></script>
<script type="text/javascript" src="js/funcionesLOGIN.js"></script>
<script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
<script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
<script type="text/javascript" src="js/funcionesMapa.js"></script>
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<script src="./bower_components/highcharts/highcharts.js"></script>
<script src="./bower_components/highcharts/modules/data.js"></script>

        

</head>

<body onload="Mostrar('MostrarIndex'),MostrarLogin()">

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo">Convencion</h1>			
		</hgroup>

		<nav>
			<ul id="main-nav" class="clearfix">
				<!-- li><a href="index.php">Inicio</a></li> -->
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarIndex')"><span class='glyphicon glyphicon-home'>&nbsp;</span>Inicio</a> </li>			
				<li><a style="cursor:pointer" onclick="Mostrar('RegistrarInvitado')"><span class='glyphicon glyphicon-plus'>&nbsp;</span>Registrar Invitado</a> </li>	
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarGrilla')"><span class='glyphicon glyphicon-th-list'>&nbsp;</span>Mostrar Grilla</a> </li>				
				<li><a style="cursor:pointer" onclick="VerEnMapa()"><span class='glyphicon glyphicon-road'>&nbsp;</span>Ubicacion</a> </li>				
				<li><a style="cursor:pointer" id="estadistica" onclick="MostrarEstadisticas()"><span class='glyphicon glyphicon-tasks'>&nbsp;</span>Estadisticas</a> </li>		
				<li><a style="cursor:pointer" onclick="Mostrar('VerPerfil')"><span class='glyphicon glyphicon-user'>&nbsp;</span>Ver perfil</a> </li>
			</ul>
			<!-- /#main-nav --> 
		</nav>

	</header>
	<!-- /#header -->
	
	<div id="content">
				
		<!-- /#content --> 

	</div>
	
	
	
	<aside id="sidebar">

		


		<section id="panelLogin" class="widget">
			
		</section><!-- /.widget -->
	

		<section  class="widget clearfix" id="quejas">
			<h2>Informar problema</h2>
			<form  onsubmit="insertarQueja(); return false">
				<div class="form-group">
					<label>Correo electronico</label>
					<input  class="form form-control" title="Ingrese su correo por favor"  type="email"  name="emailQueja" id="emailQueja" required>	
				</div>

				<div class="form-group">
					<label>Problema</label>
					<textarea class="form form-control" required title="Detalle su problema" rows="3" maxlength="200" id="problema">
					</textarea>
				</div>


				<div class="form-group">
					<button type="submit" class= "btn btn-danger form form-control" id="GuardarQueja">
							<span class='glyphicon glyphicon-envelope'>&nbsp;</span>Informar
					</button>					 
				</div>
				
			</form>
			
		</section>

		
						
	</aside>	
	
</div>
<!-- /#pagewrap -->

</body>
</html>