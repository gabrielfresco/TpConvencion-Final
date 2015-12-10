

<?php 

if(validadora::TieneSesionValida())
{
	require_once("../clases/invitado.php");
	require_once("../clases/empresa.php");
	require_once("../clases/AccesoDatos.php");

	$usr = usuario::TraerUsuarioPorNombre($_SESSION['usuarioActual']);

	$invitados = invitado::TraerInvitadosPorEmpresa($usr[0]->idEmpresa);


 ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>  Nombre     </td>
				<td>  Apellido  </td>
				<td>  Dni  </td>
				<td>  Sexo  </td>
				<td>  Empresa  </td>
				<td>  Modificar     </td>
				<td>  Borrar  </td>
			</tr> 
		</thead>	
		<tbody>
		<?php 

foreach ($invitados as $inv){
		
		$emp = empresa::TraerEmpresaPorId($inv->idEmpresa);
		
		echo " 	<tr>
					<td>$inv->nombre</td>
					<td>$inv->apellido</td>
					<td>$inv->dni</td>
					<td>$inv->sexo</td>";
		echo  		"<td>".$emp[0]->nombre."</td>";

		echo"	<td><a id='modificar' class='btn btn-warning' onclick=modificarInvitado($inv->id)><span class='glyphicon glyphicon-pencil'>&nbsp;</span> Modificar </a></td>
                <td><a id='borrar' class='btn btn-danger' onclick='borrarInvitado($inv->id)'><span class='glyphicon glyphicon-trash'>&nbsp;</span> Borrar </a></td> 
				</tr>";

	}	
		 ?>	
		 </tbody>
</table>
</div>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>