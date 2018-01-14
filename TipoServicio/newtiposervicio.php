<?php
        include('../Config/connection.php');
		include('../Archivo.php');
$display = trim($_POST["display_tipo"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $servicio."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"tipo_servicio\" VALUES ('$servicio','$dato','$display')";	
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("tiposervicio_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'TipoServicio.php?ok=0';
				}else{
					escribir("tiposervicio_OK", $query . " OK");
					$extra = 'TipoServicio.php?ok=1';
				}
			}
		}
		$extra = 'TipoServicio.php';
		header("Location: http://$host$uri/$extra");
}
?>