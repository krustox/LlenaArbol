<?php
include('../Config/connection.php');
include('../Archivo.php');
$display = trim($_POST["display_subcomponente"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$site = $_POST["site"];
$componente = $_POST["componente"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
    	while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $componente."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"subcomponente\" VALUES ('$componente','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("subcomponente_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Subcomponente.php?ok=0';			
				}else{
					escribir("subcomponente_OK", $query . " OK");
					$extra = 'Subcomponente.php?ok=1';
				}
			}
		}
			header("Location: http://$host$uri/$extra");
}
?>