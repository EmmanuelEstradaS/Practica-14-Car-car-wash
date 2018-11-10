<?php
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
    private $_dato;

	public function pagina()
	{	
		 session_start();
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        if( isset($_SESSION['id']) )
        {
               include "views/template.php";
        }
        else
        {
            include 'views/modules/ingresar.php';
        }
	}
    ################################################################################################################################       G E N E R I C A S      #####################################################################################################################################


    public function editarTablaIDController($tabla,$id_servicio)
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarTablaIDModel($id,$tabla,$id_servicio);
			return $respuesta;
		}
	}



	public function getCantidadRegistrosController($tabla)
	{
		$respuesta = Datos::getCantidadPremiosModel($tabla);
		echo $respuesta["cantidad"];
	}


	


	####################################################################################################################################       E M P I E Z A      ########################################################################################################################################


	public function getCantidadPremiosController()
	{
		$respuesta = Datos::getCantidadPremiosModel("cw_premio");
		echo $respuesta["cantidad"];
	}


	public function vistaPremiosController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Premio registrada exitosamente</strong>
                    </div>';
		}
		if (isset($_GET["premio_editada"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Premio actualizada exitosamente</strong>
                    </div>';
		}
			$arrayRespuesta = Datos::vistaPremiosModel("cw_premio");
			foreach($arrayRespuesta as $row => $item)
			{
				if($_SESSION["username"]=="admin")
				{
					echo'
							<tr>
								<td>'.$item["id_premio"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["estado"].'</td>
								<td>'.$item["descripcion"].'</td>
								<td> <a title="Editar" href="index.php?action=cw_premio_editar&id='.$item["id_premio"].'"> 
								    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
								     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_premio"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Premio"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
							</tr> ';
				}
				else
				{
					if ($item["estado"]=="Activado")
					{
						echo'
							<tr>
								<td>'.$item["id_premio"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["estado"].'</td>
								<td>'.$item["descripcion"].'</td>';

					}

				}
			}
			echo '</tbody></table>';
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




	public function editarPremioController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarPremioModel($id,"cw_premio");
			return $respuesta;
		}
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
						window.location.href = "index.php?action=cw_premio_vista";
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

	public function borrarPremioController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarPremioModel($_GET["idBorrar"],"cw_premio");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cw_premio_vista'
					</script>";
			}
			else
			{
				echo "error";
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
				alert("Premio Agregada Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=cw_premio_vista";
					</script>';	

			}
			else
			{
				echo '<script type="text/javascript">
				alert("Error, No Agregada Exitosamente!");
				</script>';		
			}
			
		}
	}

	###########################################################################################################################     S  E  R  V  I  C  I  O  S      ##################################
	################################################################################################

	public function borrarServicioController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarServicioModel($_GET["idBorrar"],"cw_servicios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cw_servicio_vista'
					</script>";
			}
			else
			{
				echo "error";
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
				alert("Servicio Agregada Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=cw_servicio_vista";
					</script>';	

			}
			else
			{
				echo '<script type="text/javascript">
				alert("Error, No Agregada Exitosamente!");
				</script>';		
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
						window.location.href = "index.php?action=cw_servicio_vista";
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

	public function vistaServiciosController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Servicio registrada exitosamente</strong>
                    </div>';
		}
		if (isset($_GET["servicio_editada"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Servicio actualizada exitosamente</strong>
                    </div>';
		}
			$arrayRespuesta = Datos::vistasModel("cw_servicios");
			foreach($arrayRespuesta as $row => $item)
			{
				if($_SESSION["username"]=="admin")
				{
					echo'
							<tr>
								<td>'.$item["id_servicio"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["descripcion"].'</td>
								<td>'."$ ".$item["precio"].'</td>
								<td> <a title="Editar" href="index.php?action=cw_servicio_editar&id='.$item["id_servicio"].'"> 
								    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar </button>
								     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_servicio"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Premio"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
							</tr> ';
				}
				else
				{
					#if ($item["estado"]=="Activado")
					#{
						echo'
							<tr>
								<td>'.$item["id_servicio"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["descripcion"].'</td>
								<td>'."$ ".$item["precio"].'</td>';

					#}

				}
			}
			echo '</tbody></table>';
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


	public function listadoVisitasController($idUser)
	{
			$arrayRespuesta = Datos::listadoVisitasModel("cw_visitas",$idUser);
			foreach($arrayRespuesta as $row => $item)
			{
				$tiposervicio = Datos::getServicioModel("cw_servicios",$item["id_servicio"]);
				echo'
						<li>
		                    <div class="card list-view-media">
		                        <div class="card-block">
		                            <div class="media">
		                                <div class="media-body">
		                                    <div class="col-xs-12">
		                                        <h5 class="d-inline-block">
		                                            Visita</h5>
		                                        <label class="label label-info">Cliente</label>
		                                    </div>
		                                    <div class="f-13 text-muted m-b-15">
		                                        Fecha del Servicio: '.$item["fecha"].' 
		                                    </div>
		                                    <h6 class="d-inline-block">Tipo de servicio:</h6>
		                                    <p>'.$tiposervicio["nombre"].'</p>
		                                    <h6 class="d-inline-block">Descripcion del servicio:</h6>
		                                    <p>'.$tiposervicio["descripcion"].'</p>
		                                    <div class="m-t-15">
		                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-facebook btn-mini waves-effect waves-light" data-original-title="Facebook">
		                                            <span class="icofont icofont-social-facebook"></span>
		                                        </button>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </li>
					';
			}
			echo '</tbody></table>';
	} 




####################################################################################################################################       V I S I T A S       #########################################################################################################################################################################################################################################################

public function getModel($idUser){
	$usuario = Datos::getUsuarioModel("usuarios",$idUser);
	//$_SESSION["nom_us"]=$usuario["nombre"];
	return $usuario;

}

public function vistaVisitaController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Servicio registrada exitosamente</strong>
                    </div>';
		}
		if (isset($_GET["servicio_editada"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Servicio actualizada exitosamente</strong>
                    </div>';
		}
			$arrayRespuesta = Datos::vistasModel("cw_visitas");


			foreach($arrayRespuesta as $row => $item)
			{
				$servicio = Datos::serviciosIDModel("cw_servicios",$item["id_servicio"]);
				$usuario = Datos::usuariosIDModel("usuarios",$item["id_usuario"]);
				if($_SESSION["username"]=="admin")
				{
					echo'
							<tr>
								<td>'.$item["id_visita"].'</td>
								<td>'.$item["fecha"].'</td>
								<td>'.$servicio["nombre"].'</td>
								<td>'.$usuario["username"].'</td>
								<td> <a title="Editar" href="index.php?action=cw_servicio_editar&id='.$item["id_servicio"].'"> 
								    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar </button>
								     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_servicio"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Premio"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
							</tr> ';
				}
				else
				{
					#if ($item["estado"]=="Activado")
					#{
						echo'
							<tr>
								<td>'.$item["id_servicio"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["descripcion"].'</td>
								<td>'."$ ".$item["precio"].'</td>';

					#}

				}
			}
			echo '</tbody></table>';
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


	####################################################################################################################################       T E R M I N A       ######################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################
	public function getCantidadUsuariosController()
	{
		$respuesta = Datos::getCantidadUsuariosModel("usuarios");
		echo $respuesta["cantidad"];
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

	public function vistaUsuariosController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario registrado exitosamente</strong>
                    </div>';
		}
		if (isset($_GET["usuario_editado"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario actualizado exitosamente</strong>
                    </div>';
		}
			$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
			foreach($arrayRespuesta as $row => $item)
			{
				if ($item["username"]!="admin")
				{
					echo'
							<tr>
								<td>'.$item["id_usuario"].'</td>
								<td>'.$item["nombre"].'</td>
								<td>'.$item["apellido"].'</td>
								<td>'.$item["username"].'</td>
								<td>'.$item["email"].'</td>
								<td>'.$item["fecha_registro"].'</td>
								<td>'.$item["num_visitas"].'</td>
								<td> <a title="Dar servicio" href="index.php?action=cw_visita_agregar&id='.$item["id_usuario"].'"> 
								    <button class="btn hor-grd btn-grd-primary "><i class="fa fa-plus-circle"></i> Servicio</button>
								     </a> 
								</td>
								<td> <a title="Editar" href="index.php?action=editar_usuarios&id='.$item["id_usuario"].'"> 
								    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
								     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_usuario"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
							</tr> ';
				}
			}
			echo '</tbody></table>';
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

	public function agregarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>date('Y/m-d'));

			$disponibilidad = Datos::ifDuplicadoModel($_POST["txtUsername"],"usuarios");
			if($disponibilidad["username"] != $_POST["txtUsername"])
			{
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
				echo '<div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario repetido, ingresa un nombre de usuario diferente</strong>
                    </div>';
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

	#REGISTRO DE CARRERA
	#-------------------------------------
	public function registroUsuariosController()
	{
		if(isset($_POST["btnRegistrarse"]))
		{
			$datosController = array("nombre"=>$_POST['txtNombre'],
									"username"=>$_POST['txtUsername'],
								    "password"=>$_POST['txtPassword']);

			$ifDuplicado = Datos::ifDuplicadoModel($datosController, "usuarios");
			if($ifDuplicado["username"]!=$_POST["txtUsername"])
			{
				$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php";
						</script>';	

				}
				else
				{
					echo "Error en registro de usuario";
				}
			}
			else
			{
				echo '<script type="text/javascript">
							alert("Este nombre de usuario ya existe!");
						 </script>';
			}
			
		}
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
				session_start();
				$_SESSION["id"] = $respuesta["id_usuario"];
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["apellido"] = $respuesta["apellido"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["fecha_registro"] = $respuesta["fecha_registro"];
				$_SESSION["num_visitas"]=$respuesta["num_visitas"];
				$_SESSION["foto"] = $respuesta["foto"];

				echo "<script>
						window.location='index.php?action=dashboard'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php'
					</script>";
			}
		}
	}

	public function editarUsuariosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarUsuariosModel($id,"usuarios");
			return $respuesta;
		}
	}

	public function borrarUsuariosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarUsuariosModel($_GET["idBorrar"],"usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_usuarios'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

  ##### actualizacion 9:14
  
  
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
					$_SESSION["password"]=$_POST["txtPasswordN"];
					 
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

}
?>