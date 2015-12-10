<?php
	 class queja
	{
		public $id;
		public $problema;
        public $mail;
        public $fecha;
      
       
       public function InsertarQueja()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO quejas VALUES(null,:paramMail,:paramProblema,:paramFecha)");
                $consulta->bindValue(':paramMail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':paramProblema', $this->problema, PDO::PARAM_STR);
                $consulta->bindValue(':paramFecha', $this->fecha, PDO::PARAM_STR);     
                
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
 

     
   

    public function BorrarUsuario()
     {

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM queja WHERE id=:paramId");
            $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);                     
            $consulta->execute();
             return $consulta->rowCount();

     }
        
    
    }




 ?>