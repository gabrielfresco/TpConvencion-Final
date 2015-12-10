<?php 

if(validadora::TieneSesionValida())
{
	

	

?>
	<article class="post clearfix">

			<header>
				<h2>Informacion del Invitado</h2>
			</header>	
				<form onsubmit="GuardarInvitado();return false">
				
					<div class="form-group">
					    <label>Nombre del invitado</label>
					    <input class="form form-control" type="text" minlength="4" title="Se necesita el nombre del invitado" id="nombreInvitado" name="nombre"required autofocus=""  pattern="[a-zA-Z ]+" placeholder="Nombre">
					</div>

					
					<div class="form-group">
					    <label>Apellido del invitado</label>
					   <input  class="form form-control" type="text"  minlength="4"  id="apellidoInvitado" title="Se necesita el apellido del invitado"  class="form-control" placeholder="Apellido"  pattern="[a-zA-Z ]+" required="" autofocus="">
					</div>
					


					<div class="form-group">
					    <label>Dni del invitado</label>
					    <input  class="form form-control" type="number" min="1000000" max="99999990" minlength="7"  id="dniInvitado" title="Se el dni del invitaado"  class="form-control" placeholder="Dni" required  autofocus="">	
					</div>	
					


					<div class="form-group">
					    <label for="exampleInputEmail1">Sexo del invitado</label></br>
					    	<label class="radio-inline">
							   <input  type="radio" id="masculino" name="sexo" value="M" checked> M
							</label>
							<label class="radio-inline">
							   <input  type="radio" id="femenino" name="sexo" value="F">F
							</label>
					  
					</div>						
							

					<div class="form-group">
					    <label>Empresa a la que pertenece</label>

					    <select  class="form form-control" id="empresa" name="empresa" >
								<?php
									require_once("../clases/empresa.php");
									require_once("../clases/AccesoDatos.php");

									$empresas = empresa::TraerTodasLasEmpresas();
										foreach ($empresas as $emp) 
											{
												echo "<option value='$emp->idEmpresa'>$emp->nombre</option>";
											}
								?>
						</select>			
					   
					</div>
												
				    <input type="hidden"  id="idInvitado">						
														
					<div class="form-group">
						<button type="submit" class= "btn btn-info" id="agregarInvitado">
							<span class='glyphicon glyphicon-save'>&nbsp;</span>Enviar
						</button>
					 
					</div>
									
									
									
			</form>		

	</article>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>
		<!-- /.post -->

	