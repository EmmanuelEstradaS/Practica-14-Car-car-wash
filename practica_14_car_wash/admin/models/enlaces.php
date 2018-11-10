<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "formulario" || $enlaces == "listado_premios" || $enlaces == "listado_usuarios" || $enlaces == "listado_servicios" 
         || $enlaces == "listado_visitas" || $enlaces == "salir" || $enlaces == "agregar_usuario" || $enlaces == "agregar_servicio"
         || $enlaces == "agregar_premio" || $enlaces=="editar_usuario" || $enlaces=="editar_premio" || $enlaces=="editar_servicio" 
         || $enlaces=="agregar_visita" || $enlaces=="editar_visita" || $enlaces=="editar_oferta" || 
         $enlaces=="agregar_oferta"|| $enlaces=="listado_ofertas")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
		    else if($enlaces == "index")
		    {
		    	$module =  "views/modules/admin_ingresar.php";	
		    }
			return $module;

			
		}
	}
?>