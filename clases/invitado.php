<?php
	 class invitado
	{
		public $id;
        public $nombre;
		public $apellido;
		public $dni;
		public $idEmpresa;
        public $sexo;

   
	 public static function TraerTodosLosInvitados()
   		{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM invitados");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado"); 

   		}

     public static function TraerInvitadosPorEmpresa($idEmp)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM invitados WHERE idEmpresa=$idEmp");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado"); 

        }

    public static function TraerInvitadoPorId($param)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM invitados where id=$param");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado"); 

        }



    public function InsertarInvitadoConParametros()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO invitados VALUES(null,:paramNombre,:paramApellido,:paramDni,:paramSexo,:paramnIdEmpresa)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramApellido', $this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':paramDni', $this->dni, PDO::PARAM_INT);
                $consulta->bindValue(':paramSexo', $this->sexo, PDO::PARAM_STR);
                $consulta->bindValue(':paramnIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
 

    public function BorrarInvitado()
     {

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM invitados WHERE id=:paramId");
            $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);                     
            $consulta->execute();
             return $consulta->rowCount();

     }
        
    
     public function ModificarInvitadoParametros()
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE invitados  set nombre=:paramNombre, apellido=:paramApellido, dni=:paramDni,sexo=:paramSexo,idEmpresa=:paramIdEmpresa WHERE id=:paramId");
           $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);
           $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
           $consulta->bindValue(':paramApellido', $this->apellido, PDO::PARAM_STR);
           $consulta->bindValue(':paramDni', $this->dni, PDO::PARAM_INT);
           $consulta->bindValue(':paramSexo', $this->sexo, PDO::PARAM_STR);
           $consulta->bindValue(':paramIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
        
            return $consulta->execute();
     }

     public function GuardarInvitado()
     {
        if($this->id>0)
             $this->ModificarInvitadoParametros();
        else           
        $this->InsertarInvitadoConParametros();


     }

     

  
	
}
?>