 function GuardarInvitado()
        {
        	var id = $("#idInvitado").val();
        	var nombre=$("#nombreInvitado").val();
        	var apellido=$("#apellidoInvitado").val();
        	var dni=$("#dniInvitado").val();
        	var emp=$("#empresa").val();
        	var sexo=$('input:radio[name=sexo]:checked').val();
        	        	
        	
        	
        		var funcionAjax = $.ajax({url:"php/operaciones.php", type:"post",
					data:
					{
						id:id,
						nom: nombre,
						ape:apellido,
						dni:dni,
						idEmp: emp,
						sexo: sexo,
						queHago:"GuardarInvitado"

				}
			});

        		funcionAjax.done(function(resultado){

						console.log(resultado);						
						Mostrar('RegistrarInvitado');														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha dado de alta");
		
					});	
        	        	}

   function modificarInvitado(valor)
		{	
			Mostrar('RegistrarInvitado');
			 		
			
			var funcionAjax = $.ajax({
					url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"TraerInvitado",
						id:valor

					}
				});				


			   		funcionAjax.done(function(resultado){	

			  			var inv = JSON.parse(resultado);
					
			 		 	$("#idInvitado").val(inv.id);
			 		 	$("#nombreInvitado").val(inv.nombre);
						$("#apellidoInvitado").val(inv.apellido);			 		 	
			 		 		
			 		 	if(inv.sexo == "F")
            					$('input:radio[name="sexo"][value="F"]').prop('checked', true);
       						 else
            					$('input:radio[name="sexo"][value="M"]').prop('checked', true);				 		 			
			 		 		
								
			 		 	$("#dniInvitado").val(inv.dni);
			 		 	$("#empresa").val(inv.idEmpresa);
						
												
					});
						
							
							
			 		funcionAjax.fail(function(resultado){	
			 			alert("No se ha modificado");
		
			 		});						
		}


   function borrarInvitado(valor)
		{
		  	  
		  var funcionAjax = $.ajax({ type:"post",url:"php/operaciones.php",
					data:
					{
						queHago:"borrar",
						id:valor

					}
				});

					funcionAjax.done(function(resultado){

						console.log(resultado);						
						Mostrar('MostrarGrilla');														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha borrado");
		
					});		 	
			
		}

function modificarUsuario(valor)
		{	

			Mostrar("RegistrarUsuario");
				var funcionAjax = $.ajax({
					url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"TraerUsuario",
						id:valor						

					}
				});
				


			   	funcionAjax.done(function(resultado){	

			   		var usr = JSON.parse(resultado);
			   		
			  		$("#idUsuario").val(usr.id);
        			$("#nombreUsuario").val(usr.nombre);
        			$("#mail").val(usr.mail);        			
        			$("#empresa").val(usr.idEmpresa);
        			//falta que la cargue en el file, no se si se puede     			
        			if(usr.foto !="")
					$("#imagen").attr("src", "fotos/"+usr.foto);
					else	
					$("#imagen").attr("src", "fotos/pordefecto.png");											
					});
					
					
					
							
			 		funcionAjax.fail(function(resultado){	
			 			alert("No se ha modificado");
		
			 		});				
								
		}


 function GuardarUsuario()
        {
        	var id = $("#idUsuario").val();
        	var nombre=$("#nombreUsuario").val();
        	var mail=$("#mail").val();
        	var contra=$("#contraseña").val();
        	var emp=$("#empresa").val();
        	var foto = $("#foto")[0].files[0].name;
        	
        	var formData = new FormData($("#formUsuario")[0]);	
			      	
        	        	
        	
        	var funcionAjax = $.ajax({url:"php/operaciones.php", type:"post",
					data:
					{
						queHago:"GuardarUsuario",
						id:id,
						nom: nombre,
						mail:mail,						
						contra: contra,
						empresa: emp,						
						foto:foto					

				}
				
			});

        		funcionAjax.done(function(resultado){
        				
						if(resultado==="Correcto")
						{
						subirFoto(formData);				
						Mostrar('RegistrarUsuario');
						}
						else
						alert(resultado);														
					});
						

        	
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha dado de alta");
		
					});	
        	
        	}


          function borrarUsuario(valor)
		{
		  	  
		  var funcionAjax = $.ajax({ type:"post",url:"php/operaciones.php",
					data:
					{
						queHago:"borrarUsuario",
						id:valor

					}
				});

					funcionAjax.done(function(resultado){

						alert("Tu usuario a dejado de existir");					
						window.location="php/logout.php";														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha borrado");
		
					});		 	
			
		}

  function CambiarContraUsuario(nom)
  {	

  		var codigo = $('#codigoIngresado').val();
  		var codigoGenerado = $('#codigoGenerado').val();
  		var contra = $('#contra').val();
  		var contra2 = $('#contraConfirmar').val();
  		



  		var funAjax = $.ajax({
					url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"TraerUsuarioPorMail",
						codigoIngresado:codigo,
						codigoGenerado:codigoGenerado,
						contra:contra,
						contra2:contra2,
						nombre:nom

					}
				});
				


			   		funAjax.done(function(resultado){	

			  			console.log(resultado);
			  			if(resultado == true)
			  				alert("Cambiada con exito");
			  			else
			  				alert(resultado);
																		
					});
						
							
			 		funAjax.fail(function(resultado){	
			 			alert("No se ha modificado");
		
			 		});	
			 	
			 				


  }


  function olvidoContraseña()
  {

  	var nombre =$('#nombre').val();
  	cambiarContraseña(nombre);
  }

  

  function cambiarContraseña(nom)
  {
  	Mostrar("CambiarContra");

  		var funcionAjax=$.ajax({
		url:"php/operaciones.php",
		type:"post",
		data:{
				queHago:"generarContraseña",
				nombre:nom}
	});
	funcionAjax.done(function(retorno){	

        	        	
            $("#codigoGenerado").val(retorno);
			
	});

  }


  function insertarQueja()
        {
        	var email = $("#emailQueja").val();
        	var problema=$("#problema").val();
        	        	        	
        	
        	

        		var funcionAjax = $.ajax({url:"php/operaciones.php", type:"post",
					data:
					{
						email:email,
						problema: problema,						
						queHago:"GuardarQueja"

				}
			});

        		funcionAjax.done(function(resultado){

						console.log(resultado);	
						$("#emailQueja").val("");		
						$("#problema").val("");														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se pudo enviar la queja");
		
					});	
        	
        	}




	function subirFoto(formData){
			
			$.ajax({
			    url: 'php/subirFoto.php',  
			    type: 'POST',
			    data: formData,			    
			    cache: false,//Para subir archivos via ajax
			    contentType: false,//Para subir archivos via ajax
			    processData: false,//Para subir archivos via ajax
			    beforeSend: function(){
			        $("#mensaje").html("Subiendo imagen");			          
			    },
			    success: function(data){
			    	 //console.log(data);
			        
			        if(data != "Correcto")
			        	alert(data);
			        	
			        	
			        
			    },
			    error: function(data){
			    	//console.log(data);
			        alert("Error al subir imagen");			        
			    }
			});
		}
