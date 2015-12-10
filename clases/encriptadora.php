<?php 

	class encriptadora
	{
	public static function Encriptar($string)
	{

		return $encriptado = md5($string);

	}
	}

?>