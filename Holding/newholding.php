<?php
include('../Config/connection.php');
include('../Archivo.php');
$display = trim($_POST["display_holding"]);
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
	while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$query= "INSERT INTO \"servicios\".\"holding\" VALUES ('$nombre','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("holding_ERROR", $query . " " .db2_stmt_errormsg());
					$extra = 'Holding.php?ok=0';
				}else{
					escribir("holding_OK", $query . " OK");
					$extra = 'Holding.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>