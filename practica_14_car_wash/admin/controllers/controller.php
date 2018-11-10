<?php
//MIOOOOOOO------
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	public function pagina()
	{
		include "views/admin_template.php";
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController()
	{
		if(isset( $_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function actualizarPremioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "estado"=>$_POST["select_estado"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "id_premio"=>$_GET["id"]);

			$respuesta = Datos::actualizarPremioModel($datosController, "cw_premio");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Premio Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_premios&editado=1";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
				alert("El Premio No  Se  A Actualizado Exitosamente!");
				</script>';			
			}
		}
	}

  public function actualizarVisitaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_visita"=>$_GET["id"],
                                "fecha"=>$_POST["txtFecha"],
                                "id_servicio"=>$_POST["select_servicios"],
                                "id_usuario"=>$_POST["txtIdUsuario"]);

			$respuesta = Datos::actualizarVisitaModel($datosController, "cw_visitas");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Visita Actualizada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_visitas&editado=1";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
				alert("La Visita No Se Actualizó Exitosamente!");
				</script>';			
			}
		}
	}
  
  	public function actualizarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>$_POST["txtFecha"],
									  "num_visitas"=>$_POST["txtVisitas"],
									  "id_usuario"=>$_GET["id"]);

			$respuesta = Datos::actualizarUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Usuario Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_usuarios&usuario_editado=1";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
						alert("Usuario No Actualizado Exitosamente!");
					 </script>';
			}
		}
	}

  public function editarController($tabla,$nom_campo)
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarModel($id,$tabla,$nom_campo);
			return $respuesta;
		}
	}
  
  public function vistaUsuariosController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Usuario agregado con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
			foreach($arrayRespuesta as $row => $item)
			{
        if($item["username"]!="admin")
        {
          echo'
              <tr role="row" class="odd">
                  <td><span class="text-primary"> '.$item["id_usuario"].' </span></td>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["apellido"].'</td>
                  <td>'.$item["username"].'</td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["fecha_registro"].'</td>
                  <td>'.$item["num_visitas"].'</td>
                  <td class="td-actions">
                    <a href="index.php?action=agregar_visita&id='.$item["id_usuario"].'"><i class="la la-plus-circle edit"></i></a>
                  </td>
                  <td class="td-actions">
                      <a href="index.php?action=editar_usuario&id='.$item["id_usuario"].'"><i class="la la-edit edit"></i></a>
                      <a href="index.php?action=listado_usuarios&idBorrar='.$item["id_usuario"].'"><i class="la la-close delete"></i></a>
                  </td>
              </tr>';
            echo '<script type="text/javascript">
                var password="'.$_SESSION["password"].'";
                function borrar(id){
                  swal("Ingrese su contraseña:", {
                    content: "input",
                    })
                    .then((value) => 
                    {
                        if (value==password) 
                        {
                          swal("Contraseña correcta", "Usuario eliminado Exitosamente", "success");
                          window.location.href = "index.php?action=listado_usuarios&idBorrar="+id;
                        }
                        else
                        {
                          swal("Contraseña Incorrecta", "Intente de nuevo", "error");
                        }     
                    });
                  } 
              </script>';
        }
      }
  }
  
  public function vistaPremiosController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Premio agregado con éxito
          </div>
          ';
    }
    if(isset($_GET["editado"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Premio actualizado con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistaPremiosModel("cw_premio");
			foreach($arrayRespuesta as $row => $item)
			{
            echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_premio"].' </span></td>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["estado"].'</td>
                <td>'.$item["descripcion"].'</td>
                <td class="td-actions">
                    <a href="index.php?action=editar_premio&id='.$item["id_premio"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_premios&idBorrar='.$item["id_premio"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Premio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_premio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	}  
  
  public function vistaServiciosController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Servicio agregado con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistasModel("cw_servicios");
			foreach($arrayRespuesta as $row => $item)
			{
        echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_servicio"].' </span></td>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["descripcion"].'</td>
                <td>'."$ ".$item["precio"].'</td>
                <td class="td-actions">
                    <a href="index.php?action=editar_servicio&id='.$item["id_servicio"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_servicios&idBorrar='.$item["id_servicio"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Servicio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_servicio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 
  
  public function vistaVisitaController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Visita agregada con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistasModel("cw_visitas");
			foreach($arrayRespuesta as $row => $item)
			{
        $servicio = Datos::serviciosIDModel("cw_servicios",$item["id_servicio"]);
				$usuario = Datos::usuariosIDModel("usuarios",$item["id_usuario"]);
           echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_visita"].' </span></td>
                <td>'.$item["fecha"].'</td>
                <td>'.$servicio["nombre"].'</td>
								<td>'.$usuario["username"].'</td>
                <td class="td-actions">
                    <a href="index.php?action=editar_visita&id='.$item["id_visita"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_visitas&idBorrar='.$item["id_visita"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Servicio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_servicio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	public function ingresoUsuarioController()
	{
		if(isset($_POST['btnIngresar']))
		{	
			$datosController = array("username"=>$_POST['txtUsername'],
									"password"=>$_POST['txtPassword']);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["username"] == $_POST["txtUsername"] && $respuesta["password"] == $_POST["txtPassword"])
			{
        if($respuesta["username"]=="admin" && $respuesta["password"]=="admin")
        {
          session_start();
          $_SESSION["id"] = $respuesta["id_usuario"];
          $_SESSION["nombre"] = $respuesta["nombre"];
          $_SESSION["apellido"] = $respuesta["apellido"];
          $_SESSION["username"] = $respuesta["username"];
          $_SESSION["email"] = $respuesta["email"];
          $_SESSION["password"] = $respuesta["password"];
          $_SESSION["admin"] = true;

          echo "<script>
              window.location='index.php?action=listado_usuarios'
            </script>";
          }
			}
			else
			{
				echo "<script>
						window.location='index.php'
					</script>";
			}
		}
	}
  
  public function agregarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$disponibilidad = Datos::ifDuplicadoModel($_POST["txtUsername"],"usuarios");
			if($disponibilidad["username"] != $_POST["txtUsername"])
			{
        $datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>date('Y/m-d'));
        
				$respuesta = Datos::agregarUsuariosModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_usuarios&ok=1";
						</script>';	
				}
				else
				{
					echo "Error en la agregacion de usuario";
				}
			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Nombre de usuario repetido, ingresa otro
              </div>';
			}
		}
	}
  
  public function agregarServicioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"]);
		
			$respuesta = Datos::agregarServicioModel($datosController, "cw_servicios");
			if($respuesta == "success")
			{
				 
			echo '<script type="text/javascript">
				alert("Servicio Agregado Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_servicios&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el servicio, inténtalo de nuevo
              </div>';	
			}
			
		}
	}
  
  public function agregarPremioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "estado"=>$_POST["select_estado"],
									  "descripcion"=>$_POST["txtDescripcion"]);
		
			$respuesta = Datos::agregarPremioModel($datosController, "cw_premio");
			if($respuesta == "success")
			{
				 
			echo '<script type="text/javascript">
				alert("Premio Agregado Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_premios&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el premio, inténtalo de nuevo
              </div>';
			}
			
		}
	}
  
  public function agregarVisitaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "fecha"=>date("Y/m-d"),
                                "id_servicio"=>$_POST["select_servicios"],
                                "id_usuario"=>$_GET["id"]);
			$respuesta = Datos::agregarVisitaModel($datosController, "cw_visitas");
      $respuesta2 = Datos::aumentarNumVisitasModel("usuarios",$_GET["id"]);
      if($respuesta2 == "success")
			{
          echo '<script type="text/javascript">
            alert("Visita Agregada Exitosamente!");
            </script>';
          echo '<script type="text/javascript">
              window.location.href = "index.php?action=listado_visitas&ok=1";
              </script>';	
			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar la visita, inténtalo de nuevo
              </div>';
			}
		}
	}
  
  //AGREGADO
  public function borrarController($tabla,$nom_campo,$enlace)
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarModel($_GET["idBorrar"],$tabla,$nom_campo);
			if($respuesta == "borrado")
			{
				echo '<script type="text/javascript">
				alert("Registro borrado Exitosamente!");
				</script>';
				echo "<script>
						window.location='index.php?action=".$enlace."'</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

  public function borrarServicioController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarServicioModel($_GET["idBorrar"],"cw_servicios");
			if($respuesta == "success")
			{
				echo '<script type="text/javascript">
              alert("Registro borrado Exitosamente!");
              </script>';
				echo '<script>
						  window.location.href = "index.php?action=listado_servicios";
              </script>';
			}
			else
			{
				echo "error";
			}
		}
	} 
  
  public function borrarVisitaController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarVisitaModel($_GET["idBorrar"],"cw_visitas");
			if($respuesta == "success")
			{
				echo '<script type="text/javascript">
              alert("Registro borrado Exitosamente!");
              </script>';
				echo '<script>
						  window.location.href = "index.php?action=listado_visitas";
              </script>';
			}
			else
			{
				echo "error";
			}
		}
	} 

	public function actualizarServicioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"],
									  "id_servicio"=>$_GET["id"]);

			$respuesta = Datos::actualizarServicioModel($datosController, "cw_servicios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Servicio Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_servicios";
					</script>';
			}
			else
			{
				echo '<script type="text/javascript">
				alert("El Servicio No  Se  A Actualizado Exitosamente!");
				</script>';
			}
		}
	}
  
  ## nuevo 9:01 pm
  
  public function actualizarPasswordController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			if($_POST["txtPassword"]!=$_SESSION["password"])
			{
				echo '<script type="text/javascript">
							alert("La contraseña actual no coinciden");
						 </script>';
				echo '<script type="text/javascript">
							window.location.href = "index.php?action=actualizar_contraseña";
						</script>';	



				
			}
			else if($_POST["txtPasswordN"]!=$_POST["txtPasswordN2"])
			{
				echo '<script type="text/javascript">
							alert("La contraseña nueva no coinciden");
						 </script>';
				echo '<script type="text/javascript">
							window.location.href = "index.php?action=actualizar_contraseña";
						</script>';	


			}
			else
			{
				$datosController = array( "password"=>$_POST["txtPasswordN"],
										  	"id_usuario"=>$_SESSION["id"]);

				$respuesta = Datos::actualizarPasswordModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					$_SESSION["password"]=$_POST["txtContraseñaN"];
					 
					echo '<script type="text/javascript">
							alert("Contraseña Actualizada Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=dashboard";
						</script>';	
				}
				else
				{
					echo '<script type="text/javascript">
					alert("La Contraseña No  Se  A Actualizado Exitosamente!");
					</script>';			
				}
			}
		}
	}

  public function getServiciosParaSelectController()
  {
    $respuesta = Datos::getServiciosParaSelectModel("cw_servicios");
    foreach($respuesta as $row => $item)
    {
       echo'
            <option value="'.$item["id_servicio"].'"> '.$item["nombre"].' </option>
          ';
    }
  }
  
  public function getDatosUsuarioController()
  {
    if(isset($_GET["id"]))
    {
      $datosController = $_GET["id"];
      $respuesta = Datos::getDatosUsuarioModel($datosController, "usuarios");
      return $respuesta;
    }
    
  }

  public function getNombreServicioPorIdController($idServicio)
  {
      $respuesta = Datos::getNombreServicioPorIdModel($idServicio,"cw_servicios");
      return $respuesta;
  }
  
  
  
  ##nuevo actualizacion 09/11/2018 05:54 
  
  public function vistaOfertasController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Servicio agregado con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistasModel("cw_ofertas");
			foreach($arrayRespuesta as $row => $item)
			{
        echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_oferta"].' </span></td>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["descripcion"].'</td>
                <td>'."$ ".$item["precio"].'</td>
                <td class="td-actions">
                    <a href="index.php?action=editar_oferta&id='.$item["id_oferta"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_ofertas&idBorrar='.$item["id_oferta"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Servicio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=listado_ofertas&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 
  
  
  public function actualizarOfertaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"],
									  "id_oferta"=>$_GET["id"]);

			$respuesta = Datos::actualizarOfertaModel($datosController, "cw_ofertas");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Oferta Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_ofertas";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
				alert("La Oferta No  Se  A Actualizado Exitosamente!");
				</script>';			
			}
		}
	}
  
  public function agregarOfertaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"]);
		
			$respuesta = Datos::agregarOfertaModel($datosController, "cw_ofertas");
			if($respuesta == "success")
			{
				 
			echo '<script type="text/javascript">
				alert("Oferta Agregado Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_ofertas&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el servicio, inténtalo de nuevo
              </div>';	
			}
			
		}
	}
  

  

}
?>