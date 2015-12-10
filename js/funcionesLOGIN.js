 function login()
        {
        	

        	var elUsuario=$("#nombreUsuario").val();
        	var laClave=$("#contraseña").val();
        	var recordar = $("#recordar").is(':checked');

        	var funcionAjax = $.ajax({url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"ValidarUsuario",
						usuario: elUsuario,
						clave:laClave,
						recordarme:recordar

					}
				});
				
				funcionAjax.done(function(resultado){
						console.log(resultado);
						if(resultado)
						{
											
							MostrarLogin();

						}
						else
						{
							
							$("#lblOculto").html("Usuario no registrado");
							
						} 
					}); 	
			
        	

        }
        function logout()
        {
        	var funcionAjax=$.ajax({
			url:"php/logout.php",
			type:"post"		
			});

			funcionAjax.done(function(retorno){
								
				location.reload();
				//MostrarLogin();
			});	

        } 

      