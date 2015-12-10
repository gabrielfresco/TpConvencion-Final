<?php 

	class estadistica
	{

		public $nombre;
		public $Cantidad;

		public static function TraerEstadisticas()
		{

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT E.nombre, COUNT(I.idEmpresa) as Cantidad FROM empresas E, invitados I
                WHERE E.idEmpresa = I.idEmpresa AND E.idEmpresa IN (SELECT idEmpresa FROM invitados) GROUP BY E.nombre");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "estadistica");
		}

		  public static function tabla()
		  {  
             
             $estadisticas = self::TraerEstadisticas();
              echo "<table id='tabla'>
                    <tr>
                      <td>Nombre</td>           
                      <td>Cantidad</td> 
                    </tr>"; 

             foreach ($estadisticas as $value)
              {
             		
              	echo "<tr>
                		<td>$value->nombre</td>           
                   		<td>$value->Cantidad</td>
                  	</tr>"; 
           	 	}
            
        		echo "</table>";
                                                     
          }                                          
          
    }

	

?>