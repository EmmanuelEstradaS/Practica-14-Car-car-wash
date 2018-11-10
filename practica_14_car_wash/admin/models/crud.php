<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username and password = :password");	
		$statement->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$statement->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}
  
  	public static function actualizarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, username=:username, email=:email, password=:password, fecha_registro=:fecha_registro, num_visitas=:num_visitas WHERE id_usuario=:id_usuario");	
		//DEfinicion de para metros para la actualizacion ala base de datos tabla usuarios
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		$stmt->bindParam(":num_visitas", $datosModel["num_visitas"]);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function actualizarPremioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, estado=:estado, descripcion=:descripcion WHERE id_premio=:id_premio");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		$stmt->bindParam(":id_premio", $datosModel["id_premio"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}



  
  
  public static function editarModel($id,$tabla,$nom_campo)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $nom_campo = :id");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}
  
  public static function vistaPremiosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}
  
	public static function vistaUsuariosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}
  
  public static function vistasModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

  public static function serviciosIDModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_servicio=:id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function usuariosIDModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT username FROM $tabla WHERE id_usuario=:id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}
  
  public static function ifDuplicadoModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username");	
		//DEfinicion de para metro para la consulta en la tabla usuarios
		$statement->bindParam(":username", $datosModel, PDO::PARAM_STR);
		//Ejecutar la sentencia
		$statement->execute();
		//Asociar resiultados y eevolver el arraty al controller
		return $statement->fetch();
		//Cerrar conexion al final
		$statement->close();
	}
  
  public static function agregarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,username,email,password,fecha_registro) VALUES (:nombre, :apellido, :username, :email, :password, :fecha_registro)");	
		//Definicion de parametros para la isnercion a la base de datos
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		//Si la ejecucion de la consulta es exitosa se devuelve un mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function agregarServicioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,precio) VALUES (:nombre, :descripcion, :precio)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function agregarPremioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,estado,descripcion) VALUES (:nombre, :estado, :descripcion)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function agregarVisitaModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha,id_servicio,id_usuario) VALUES (:fecha, :id_servicio, :id_usuario)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":id_servicio", $datosModel["id_servicio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
	
  
  
  ##### AGREGADO 
  
  public static function borrarModel($datosModel, $tabla,$nom_campo)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $nom_campo = :id");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "borrado";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}
  
   public static function borrarServicioModel($idServicio,$tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_servicio = :id_servicio");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_servicio", $idServicio, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		//Cerrar conexion al final
		$stmt->close();
	}
  
  public static function borrarVisitaModel($idVisita,$tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_visita = :id_visita");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_visita", $idVisita, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		//Cerrar conexion al final
		$stmt->close();
	}


	public static function actualizarServicioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE id_servicio=:id_servicio");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":id_servicio", $datosModel["id_servicio"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  
  ##nuevo 9:02
  
  
  public static function actualizarPasswordModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password=:password WHERE id_usuario=:id_usuario");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function getDatosUsuarioModel($idUser,$table)
  {
      //preparar la consulta conectando a la base de datos
      $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id_usuario = :id_usuario");	
      //DEfinicion de para metro para la consulta en la tabla usuarios
      $statement->bindParam(":id_usuario", $idUser, PDO::PARAM_INT);
      //Ejecutar la sentencia
      $statement->execute();
      //Asociar resiultados y eevolver el arraty al controller
      return $statement->fetch();
      //Cerrar conexion al final
      $statement->close();
  }
  
  public static function getServiciosParaSelectModel($table)
  {
      //preparar la consulta conectando a la base de datos
      $statement = Conexion::conectar()->prepare("SELECT * FROM $table");	
      //Ejecutar la sentencia
      $statement->execute();
      //Asociar resiultados y eevolver el arraty al controller
      return $statement->fetchAll();
      //Cerrar conexion al final
      $statement->close();
  }
  
  public static function aumentarNumVisitasModel($tabla,$id_usuario)
  {
      //preparar la consulta conectando a la base de datos
      $statement = Conexion::conectar()->prepare("SELECT num_visitas FROM $tabla WHERE id_usuario = :id_usuario");	
      //DEfinicion de para metro para la consulta en la tabla usuarios
      $statement->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
      //Ejecutar la sentencia
      $statement->execute();
      //Asociar resiultados y eevolver el arraty al controller
      $cantidad = $statement->fetch();
      $cantidadNueva = $cantidad["num_visitas"]+1;
    
      //preparar la consulta conectando a la base de datos
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_visitas=:num_visitas WHERE id_usuario=:id_usuario");	
      //Definicion de parametros para la actualizacion en la base de datos tabla categorias
      $stmt->bindParam(":num_visitas", $cantidadNueva, PDO::PARAM_INT);
      $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
      //Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
      if($stmt->execute())
      {
        return "success";
      }
      else
      {
        //De lo contrario se devuelve mensaje nde error
        return "error";
      }
      //Cerrar la conexion al final
      $stmt->close();

    
      //Cerrar conexion al final
      $statement->close();
  }
  
  public static function getNombreServicioPorIdModel($idServicio, $table)
  {
      //preparar la consulta conectando a la base de datos
      $statement = Conexion::conectar()->prepare("SELECT nombre FROM $table WHERE id_servicio = :id_servicio");	
      //Definicion de parametros para la actualizacion en la base de datos tabla categorias
      $statement->bindParam(":id_servicio", $idServicio, PDO::PARAM_INT);
      //Ejecutar la sentencia
      $statement->execute();
      //Asociar resiultados y eevolver el arraty al controller
      return $statement->fetch();
      //Cerrar conexion al final
      $statement->close();
  }
  
  public static function actualizarVisitaModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha=:fecha, id_servicio=:id_servicio, id_usuario=:id_usuario WHERE id_visita=:id_visita");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":id_servicio", $datosModel["id_servicio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_visita", $datosModel["id_visita"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  
  
  ##nuevo 6:06
  
  public static function actualizarOfertaModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE id_oferta=:id_oferta");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":id_oferta", $datosModel["id_oferta"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function agregarOfertaModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,precio) VALUES (:nombre, :descripcion, :precio)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  

  
  

}
?>