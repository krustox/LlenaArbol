<?php
  		include('../Config/connection.php');
        include('../Archivo.php');
$display = trim($_POST["display_elemento"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$site = $_POST["site"];
$componente = $_POST["componente"];
$subcomponente = $_POST["subcomponente"];
$ext = explode("_", $subcomponente);
$extl = sizeof($ext);
$nom="";
if($ext[$extl-1] != "WAS" && $ext[$extl-1] != "S.O" && $ext[$extl-1] != "BROKER" && $ext[$extl-1] != "MQ" && $ext[$extl-1] != "WEBSERVICE"){
	$nom = "_".$ext[$extl-1];
}
//$dato = $nombre."_".$display_sub;
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$dif = explode(" ",$display);
			$difl = sizeof($dif);
			if($difl > 1){
				$nombre = trim($dif[0]);
				$display = trim($dif[1])."_".trim($dif[0]);
			}else{
				$nombre = strtoupper(str_replace(" ", "_", $display));
				$nombre = $nombre . $nom;
				$display = $display.$nom;
			}
			$query= "INSERT INTO \"servicios\".\"elemento\" VALUES ('$subcomponente','$nombre','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("elementos_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Elemento.php?ok=0';
				}else{
					escribir("elementos_OK", $query . " OK" );
					$extra = 'Elemento.php?ok=1';
				}
			}
		}
			header("Location: http://$host$uri/$extra");
}

?>