<?php

	require_once("../clases/invitado.php");
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/encriptadora.php");
	require_once("../clases/usuario.php");
	require_once("../clases/validadora.php");
	require_once("../clases/quejas.php");
	require_once("../clases/estadisticas.php");

	
$quehago = $_POST['queHago'];

switch ($quehago) {
	case 'borrar':
		$inv = new invitado();
		$inv->id = $_POST['id'];
		$resultado = $inv->BorrarInvitado();
		echo $resultado;
		break;

	case 'borrarUsuario':
		$usr = new usuario();
		$usr->id = $_POST['id'];
		$resultado = $usr->BorrarUsuario();
		echo $resultado;
		break;	
	

	case 'GuardarInvitado':
		$inv = new invitado();
		$inv->id = $_POST['id'];
		$inv->nombre = $_POST['nom'];
		$inv->apellido = $_POST['ape'];
		$inv->dni = $_POST['dni'];
		$inv->sexo = $_POST['sexo'];
		$inv->idEmpresa = $_POST['idEmp'];		
		$cantidad = $inv->GuardarInvitado();

		echo true;
		break;

	case 'GuardarQueja':
		$queja = new queja();
		$queja->problema = $_POST['problema'];
		$queja->fecha = date('y-m-d');
		$queja->mail = $_POST['email'];			
		$cantidad = $queja->InsertarQueja();

		echo true;
		break;

	case 'GuardarUsuario':

		$NombreCompleto=explode(".", $_POST['foto']);
		$Extension=  end($NombreCompleto);
		$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
			if(!in_array($Extension, $arrayDeExtValida))
				echo "Error archivo de extension invalida";						
				//echo false;
			else	
			{

		$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;
		$usr = new usuario();
		$usr->id = $_POST['id'];
		$usr->nombre = $_POST['nom'];		
		$usr->contrasenia = $contraEncriptada; 
		$usr->mail = $_POST['mail'];		
		$usr->idEmpresa = $_POST['empresa'];
		$usr->foto =$_POST['mail'].$_POST['foto'];//agrego el mail para que cada foto sea unica 
		$cantidad = $usr->GuardarUsuario();

		echo "Correcto";
			}
		break;


	case 'MostrarGrilla':
			include("../partes/grilla.php");
			break;

	case 'RegistrarUsuario':
			include("../partes/registarUsuario.php");
			break;

	case 'MostrarLogin':
			include("../partes/panelLogin.php");
			break;		
			

	case 'VerEnMapa':
			include("../partes/formMapaGoogle.php");
			break;

	case 'MostrarIndex':
			include("../partes/inicio.php");	
			break;

	case 'RegistrarInvitado':
			include("../partes/registrarInvitado.php");
			break;

	case 'CambiarContra':			
			include("../partes/cambiarContra.php");			
			break;

	case 'generarContraseña':
			$usr = usuario::TraerUsuarioPorNombre($_POST['nombre']);	

			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$codigo = "";

					for($i=0;$i<12;$i++) 
					{
						$codigo .= substr($str,rand(0,62),1);
					}	
			$mensaje = "Su codigo es: " . $codigo;
			$cabecera = "From: Gabriel Fresco<gabriel.fresco@yahoo.com.ar>";	

			if(mail($usr[0]->mail, 'Codigo para cambiar su contraseña', $mensaje, $cabecera)){
				echo $codigo;

			}

				else 
					echo "Error al enviar el mail";

			
			break;
	
	case 'olvidoContra':
			include("../partes/olvidoContra.php");			
			break;


	case 'TraerInvitado':
			$invitado = invitado::TraerInvitadoPorId($_POST['id']);		
			echo json_encode($invitado[0]);
		break;

	case 'TraerUsuario':
			$usr = usuario::TraerUsuarioPorId($_POST['id']);		
			echo json_encode($usr[0]);
		break;

	case 'TraerUsuarioPorMail':
			$usr = usuario::TraerUsuarioPorNombre($_POST['nombre']);

			if($usr!= null)
			{
			if($_POST['contra']!= $_POST['contra2'])			
				echo "Las contraseñas no coinciden";			
			else if($_POST['codigoIngresado'] != $_POST['codigoGenerado'])			
			  echo "El codigo ingresado no es correcto";
			  
			else 
			{
			$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;	
			$usr[0]->contrasenia = $contraEncriptada;	
			$usr[0]->modificarContra();
			echo true;
			}
		}
			else 
				echo "No existe el usuario";
		break;

	case 'ValidarUsuario':
			$contraEncriptada = encriptadora::Encriptar($_POST['clave']);
			$respuesta = validadora::validarUsuario($_POST['usuario'], $contraEncriptada ,$_POST['recordarme']);
			if($respuesta)
				echo true;
			else 
				echo false;
			break;

	case 'VerPerfil':
				include("../partes/perfilUsuario.php");
			break;		

	case 'Estadistica':
			estadistica::tabla("tabla");
			break;

			
	default:
		# code...
		break;
}

?>