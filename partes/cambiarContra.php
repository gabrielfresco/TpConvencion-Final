<form onsubmit="CambiarContraUsuario('<?php echo $_COOKIE["registrado"]; ?>');return false">	
	<div class="form-group">
		<label>Ingrese codigo recibido</label>
		<input type="text"  id="codigoIngresado" title="Ingrese el codigo recibido"  class="form-control" placeholder="codigo recibido" required  autofocus="">	
	</div>
	
	<div class="form-group">
		<label>Nueva Contraseña</label>
		<input type="password"  minlength="4"  id="contra" title="Ingrese nueva contraseña"  class="form-control" placeholder="Ingrese nueva contraseña" pattern="[a-zA-Z0-9]*+" required="" autofocus="">
	</div>
	
	<div class="form-group">	
		<label>Confirme nueva contraseña</label>
		<input type="password"  minlength="4"  id="contraConfirmar" title="Confirme contraseña"  class="form-control" placeholder="Confirme contraseña" pattern="[a-zA-Z0-9]*+" required="" autofocus="">
	</div>	

		
	<input type="hidden" id="codigoGenerado">
	
	<input type="submit" class="btn btn-info" value="Cambiar contraseña">

</form>