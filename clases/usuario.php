<?php
	
    class usuario
	{
		public $nombre;
		public $contrasenia;
        public $mail;
        public $id;
        public $idEmpresa;
        public $foto;

		

	 public static function TraerUsuarioPorNombre($nomb)
   		{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios where nombre='$nomb'");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   		}



        public static function validarUsuario($nom, $contra)
        {
            
            $resultado =  usuario::TraerUsuarioPorNombre($nom); 

           if($resultado !=null)
           {
            if($resultado[0]->nombre == $nom && $resultado[0]->contrasenia == $contra)
                return true;            
               else
                return false;
            }
            else
                return false;
         

        }   



         public static function TraerUsuarioPorId($param)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios where id='$param'");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

        }

           public static function TraerUsuarioPorMail($mail)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios where mail='$mail'");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

        }



    public function InsertarUsuarioConParametros()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios VALUES(null,:paramNombre,:paramContrasenia,:paramMail,:paramnIdEmpresa,:paramFoto)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramContrasenia', $this->contrasenia, PDO::PARAM_STR);
                $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_INT);              
                $consulta->bindValue(':paramnIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
                $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
 

    public function BorrarUsuario()
     {

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios where id=:paramId)");
            $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);                     
            $consulta->execute();
             return $consulta->rowCount();

     }
        
    
     public function ModificarUsuarioConParametros()
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET nombre=:paramNombre,contrasenia=:paramContrasenia, mail=:paramMail, idEmpresa=:paramIdEmpresa, foto=:paramFoto WHERE id=:paramId");
           $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);
           $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
           $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);    
           $consulta->bindValue(':paramContrasenia', $this->contrasenia, PDO::PARAM_STR);
           $consulta->bindValue(':paramIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
           $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);

        
            return $consulta->execute();
     }

     public function modificarContra()
     {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET contrasenia=:paramContra where mail=:paramMail");       
           $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);    
           $consulta->bindValue(':paramContra', $this->contrasenia, PDO::PARAM_STR);
        
            return $consulta->execute();
     }

     public function GuardarUsuario()
     {
        if($this->id>0)
             $this->ModificarUsuarioConParametros();
        else           
        $this->InsertarUsuarioConParametros();


     }  


	}

?>