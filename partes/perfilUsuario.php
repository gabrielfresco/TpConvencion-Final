<?php 

if(validadora::TieneSesionValida())
{
	require_once("../clases/usuario.php");
	require_once("../clases/empresa.php");
	require_once("../clases/AccesoDatos.php");
	$usr = usuario::TraerUsuarioPorNombre($_SESSION['usuarioActual']);
	$usuario = $usr[0];
	$emp = empresa::TraerEmpresaPorId($usr[0]->idEmpresa);
	$foto= $usr[0]->foto;

 

	echo"		<form class='form-horizontal'>
				<div class='form-group'>
				<h3><span class='label label-primary'>Nombre de usuario</span></h3>				
				<label>".$usr[0]->nombre."</label>	 
				</div>";


	echo"		<div class='form-group'>
				<h3><span class='label label-primary'>Correo electronico</span></h3>	
				<label>".$usr[0]->mail."</label>	 
				</div>";

	echo"		<div class='form-group'>
				<h3><span class='label label-primary'>Empresa a la que pertenece</span></h3>	
				<label>".$emp[0]->nombre."</label>	 
				</div>";

	echo"		<div class='form-group'>
				<h3><span class='label label-primary'>Foto de perfil</span></h3>";

	?>
		 		<img  src="fotos/<?php echo ($usuario->foto !="") ? $usuario->foto : "pordefecto.png" ; ?>" class="fotoform" id="foto"/>
				</div>
				</form>
			
<?php
	echo "
			<div class='form-group'>	
			<a id='modificar' class='btn btn-warning' onclick='modificarUsuario(".$usr[0]->id.")'><span class='glyphicon glyphicon-pencil'>&nbsp;</span> Modificar </a>
			<a id='borrar' class='btn btn-danger' onclick='borrarUsuario(".$usr[0]->id.")'><span class='glyphicon glyphicon-trash'>&nbsp;</span> Borrar </a>	
			</div>";				
 }else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";}
?>