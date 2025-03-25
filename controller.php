<?php
function obtenerEmpleados() {
	
	$empleados = array();
	
	$empleados[] = array(
		"empID" => uniqid(), 
		"name" => "Empleado 1",
		"email" => "emp1@email.com"
	);

	$empleados[] = array(
		"empID" => uniqid(), 
		"name" => "Empleado 2",
		"email" => "emp2@email.com"
	);
	
	$empleados[] = array(
		"empID" => uniqid(), 
		"name" => "Empleado 3",
		"email" => "emp3@email.com"
	);
	
	$empleados[] = array(
		"empID" => uniqid(), 
		"name" => "Empleado 4",
		"email" => "emp4@email.com"
	);
	
	$empleados[] = array(
		"empID" => uniqid(), 
		"name" => "Empleado 5",
		"email" => "emp5@email.com"
	);
	
	return $empleados;
}

function generarRespuesta($datos) {
	
	$respuesta = array();
	
	if ($datos['departamento'] == "personal") {
		$respuesta = array(
			"success" => "true",
			"employees" => obtenerEmpleados()
		);
	}
	else {
		$respuesta = array(
			"success" => "false",
			"message" => "No existen empleados del departamento indicado"
		);
	}
	
	return $respuesta;	
}

if (isset($_POST['order'])) {
	
	$peticion = json_decode($_POST['order'], true);
	
	if ($peticion['action'] == 'empleados') {
		
		$respuesta = generarRespuesta($peticion["data"]);
		
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}
?>