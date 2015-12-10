<?php 
session_start(); 

	class validadora
	{

		public static function validarUsuario($usuario, $contraEncriptada, $recor)
		{

			if(usuario::validarUsuario($usuario,$contraEncriptada))
				{

					$_SESSION['usuarioActual']=$_POST['usuario'];
					$_SESSION['ultimoIngreso'] = date('y-m-d h:m:s');
					
					if($recor)
					{		
					setcookie('registrado', $usuario,  time()+36000 , '/');
					}
					else 
					{
					setcookie('registrado', $usuario,  time()-36000 , '/');
					}

					return true;

				}else
				{
					return  false;
				}

		}

		public static function TieneSesionValida()
	{
		if(isset($_SESSION['usuarioActual']))
		{
			$ahora = date("y-m-d h:m:s");
			$tiempo = strtotime($ahora) - strtotime($_SESSION['ultimoIngreso']);
			if($tiempo<30)
			{
				$_SESSION['ultimoIngreso'] = date("y-m-d h:m:s");
				return true;	
			}
			
		}
		else 
		{
			
			$_SESSION = null;
			session_destroy();
			//header("location:index.php");
			return false;
		}
		 

	}


	}


?>