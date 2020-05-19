<?php
	header('Content_type: application/json');
	header("Access-Control-Allow-Origin: *");
	
	// FUNCIONES IMPORTANTES.
	function api($detalle){
		$servidor 	= 'localhost';
		$user 		= 'id13732018_natalia';
		$pass 		= '9lK1PXiO-a9ZLd0e';
		$db 		= 'id13732018_compras';
		$conexion 	= mysqli_connect($servidor, $user, $pass, $db);
		
		if($detalle == 'lista'){
			$query 		= mysqli_query($conexion, "SELECT * FROM productos");
			$consulta 	= mysqli_fetch_all($query, MYSQLI_ASSOC);
		}else{
			$query 		= mysqli_query($conexion, "SELECT * FROM productos WHERE id = '".$detalle."'");
			$consulta 	= mysqli_fetch_array($query);
		}
		
		return $consulta;
	}
	
	if($_GET['peticion'] == 'productos'){
		$resultado = api($_GET['detalle']);
	}else{
		header("HTTP/1.0 405 Method Not Allowed");
     	exit();
	}
	
	echo json_encode($resultado);
?>