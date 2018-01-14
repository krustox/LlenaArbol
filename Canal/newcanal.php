<?php 
include('../Config/connection.php');
include('../Archivo.php');
$display = trim($_POST["display_canal"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $nombre;
			$query= "INSERT INTO \"servicios\".\"canal\" VALUES ('$empresa','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("canal_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Canal.php?ok=0';			
				}else{
					escribir("canal_OK", $query . " OK");
					$extra = 'Canal.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
	}
?>