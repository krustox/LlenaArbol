<?php
include('../Config/connection.php');
include('../Archivo.php');
//datos del arhivo 
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
   	echo "El archivo ha sido cargado correctamente."; 
}else{ 
   	echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
}  
$fp = fopen($nombre_archivo, "r");
while(!feof($fp)) {
$linea = fgets($fp);
	$dato= "";
	$insert = explode(",",$linea);
	$tam = sizeof($insert);
	$conn_resource = db2_connect($conn_string, '', '');
	$index = 0;
	$tipo = "";
	if ($conn_resource) {
		while ($tam > 0){			
			$tam = $tam - 1;
			$display = trim($insert[$index]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$conn_resource = db2_connect($conn_string, '', '');
			switch ($index){
				case 0:
					$query1 = "SELECT count(*) FROM \"servicios\".\"holding\" WHERE \"nombre_holding\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"holding\" WHERE \"nombre_holding\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[0];
							}else{
								$query= "INSERT INTO \"servicios\".\"holding\" VALUES ('$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("holding_OK", $query ." OK");
									}else{
										escribir("holding_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato= $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					//db2_close($conn_resource);
					break;
				case 1:
					$query1 = "SELECT count(*) FROM \"servicios\".\"empresa\" WHERE \"nombre_empresa\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"empresa\" WHERE \"nombre_empresa\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								$query= "INSERT INTO \"servicios\".\"empresa\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("empresa_OK", $query ." OK");
									}else{
										escribir("empresa_error", $query ." ". db2_stmt_errormsg());
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					//db2_close($conn_resource);
					break;
				case 2:
					$query1 = "SELECT count(*) FROM \"servicios\".\"canal\" WHERE \"nombre_canal\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"canal\" WHERE \"nombre_canal\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								$query= "INSERT INTO \"servicios\".\"canal\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("canal_OK", $query ." OK");
									}else{
										escribir("canal_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					//db2_close($conn_resource);
					break;
				case 3:
					$nombre = $dato ."_".$nombre;
					$query1 = "SELECT count(*) FROM \"servicios\".\"servicio\" WHERE \"nombre_servicio\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"servicio\" WHERE \"nombre_servicio\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								$query= "INSERT INTO \"servicios\".\"servicio\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("servicio_OK", $query ." OK");
									}else{
										escribir("servicio_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					//db2_close($conn_resource);
					break;
				case 4:
					$tipo = $nombre;
					$nombre = $dato ."_".$nombre;
					$query1 = "SELECT count(*) FROM \"servicios\".\"tipo_servicio\" WHERE \"nombre_tipo_servicio\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"tipo_servicio\" WHERE \"nombre_tipo_servicio\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								 $dato =$row[1];
							}else{
								$query= "INSERT INTO \"servicios\".\"tipo_servicio\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("tipo_OK", $query ." OK");
									}else{
										escribir("tipo_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					//db2_close($conn_resource);
					break;
				case 5:
					$nombre = $dato ."_".$nombre;
					if($tipo == "INFRAESTRUCTURA"){
						$query1 = "SELECT count(*) FROM \"servicios\".\"subservicio\" WHERE \"nombre_subservicio\" = '$nombre'";
						$resp = db2_prepare($conn_resource, $query1);
						if($resp){
							$result = db2_exec($conn_resource, $query1);
							if($result){
								$row = db2_fetch_array($result);
								if($row[0] > 0){
									$query1 = "SELECT * FROM \"servicios\".\"subservicio\" WHERE \"nombre_subservicio\" = '$nombre'";
									$resp = db2_prepare($conn_resource, $query1);
									$result = db2_exec($conn_resource, $query1);
									$row = db2_fetch_array($result);
									$dato =$row[1];
								}else{	
									$query= "INSERT INTO \"servicios\".\"subservicio\" VALUES ('$dato','$nombre','$display')";
									$resp = db2_prepare($conn_resource, $query);
									if($resp){
										$result = db2_exec($conn_resource, $query);
										if($result){
											escribir("subservicio_OK", $query ." OK");
										}else{
											escribir("subservicio_error", $query ." " . db2_stmt_errormsg() );
										}
										$dato = $nombre;
									}
								}
							}else{
								escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
							}
						}
					}else{
						$query1 = "SELECT count(*) FROM \"servicios\".\"agrupacion\" WHERE \"nombre_agrupacion\" = '$nombre'";
						$resp = db2_prepare($conn_resource, $query1);
						if($resp){
							$result = db2_exec($conn_resource, $query1);
							if($result){
								$row = db2_fetch_array($result);
								if($row[0] > 0){
									$query1 = "SELECT * FROM \"servicios\".\"agrupacion\" WHERE \"nombre_agrupacion\" = '$nombre'";
									$resp = db2_prepare($conn_resource, $query1);
									$result = db2_exec($conn_resource, $query1);
									$row = db2_fetch_array($result);
									$dato = $row[1];
								}else{	
									$query= "INSERT INTO \"servicios\".\"agrupacion\" VALUES ('$dato','$nombre','$display')";
									$resp = db2_prepare($conn_resource, $query);
									if($resp){
										$result = db2_exec($conn_resource, $query);
										if($result){
											escribir("agrupacion_OK", $query ." OK");
										}else{
											escribir("agrupacion_error", $query ." " . db2_stmt_errormsg() );
										}
										$dato = $nombre;
									}
								}
							}else{
								escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
							}
						}
					}
					//db2_close($conn_resource);
					break;
				case 6:
					$nombre = $dato ."_".$nombre;
					if($tipo == "INFRAESTRUCTURA"){
					$query1 = "SELECT count(*) FROM \"servicios\".\"site\" WHERE \"nombre_site\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"site\" WHERE \"nombre_site\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"site\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("site_OK", $query ." OK");
									}else{
										escribir("site_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}else{
						$query1 = "SELECT count(*) FROM \"servicios\".\"segmento\" WHERE \"nombre_segmento\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"segmento\" WHERE \"nombre_segmento\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"segmento\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("segmento_OK", $query ." OK");
									}else{
										escribir("segmento_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}
					//db2_close($conn_resource);
					break;
				case 7:
					$nombre = $dato ."_".$nombre;
					if($tipo == "INFRAESTRUCTURA"){
					$query1 = "SELECT count(*) FROM \"servicios\".\"componente\" WHERE \"nombre_componente\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"componente\" WHERE \"nombre_componente\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"componente\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("componente_OK", $query ." OK");
									}else{
										escribir("componente_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}else{
						$query1 = "SELECT count(*) FROM \"servicios\".\"producto\" WHERE \"nombre_producto\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"producto\" WHERE \"nombre_producto\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"producto\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("producto_OK", $query ." OK");
									}else{
										escribir("producto_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}
					//db2_close($conn_resource);
					break;
				case 8:
					$nombre = $dato ."_".$nombre;
					if($tipo == "INFRAESTRUCTURA"){
					$query1 = "SELECT count(*) FROM \"servicios\".\"subcomponente\" WHERE \"nombre_subcomponente\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"subcomponente\" WHERE \"nombre_subcomponente\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"subcomponente\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("subcomponente_OK", $query ." OK");
									}else{
										escribir("subcomponente_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}else{
						$query1 = "SELECT count(*) FROM \"servicios\".\"transaccion\" WHERE \"nombre_transaccion\" = '$nombre'";
					$resp = db2_prepare($conn_resource, $query1);
					if($resp){
						$result = db2_exec($conn_resource, $query1);
						if($result){
							$row = db2_fetch_array($result);
							if($row[0] > 0){
								$query1 = "SELECT * FROM \"servicios\".\"transaccion\" WHERE \"nombre_transaccion\" = '$nombre'";
								$resp = db2_prepare($conn_resource, $query1);
								$result = db2_exec($conn_resource, $query1);
								$row = db2_fetch_array($result);
								$dato = $row[1];
							}else{
								
								$query= "INSERT INTO \"servicios\".\"transaccion\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("transaccion_OK", $query ." OK");
									}else{
										escribir("transaccion_error", $query ." " . db2_stmt_errormsg() );
									}
									$dato = $nombre;
								}
							}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}
					}
					//db2_close($conn_resource);
					break;
				default:
					if($tipo == "INFRAESTRUCTURA"){
								$ext = explode("_", $dato);
								$extl = sizeof($ext);
								if($ext[$extl-1] != "WAS" && $ext[$extl-1] != "S.O" && $ext[$extl-1] != "BROKER" && $ext[$extl-1] != "MQ"){
									$nombre = $nombre ."_".$ext[$extl-1];
									$display = $display ."_".$ext[$extl-1];
								}
								$dif = explode(" ",$display);
								$difl = sizeof($dif);
								if($difl > 1){
									$nombre = $dif[0];
									$display = $dif[1];
								}
								$query= "INSERT INTO \"servicios\".\"elemento\" VALUES ('$dato','$nombre','$display')";
								$resp = db2_prepare($conn_resource, $query);
								if($resp){
									$result = db2_exec($conn_resource, $query);
									if($result){
										escribir("elemento_OK", $query ." OK");
									}else{
										escribir("elemento_error", $query ." " . db2_stmt_errormsg() );
									}
						}else{
							escribir("Error_Select",$query1 . " ". db2_stmt_errormsg());
						}
					}else{
						$query= "INSERT INTO \"servicios\".\"operacion\" VALUES ('$dato','$nombre','$display')";
						$resp = db2_prepare($conn_resource, $query);
						if($resp){
							$result = db2_exec($conn_resource, $query);
							if(!$result){
								escribir("operacion_Error", $query . " " .db2_stmt_errormsg());
							}else{
								escribir("operacion_OK", $query . " OK" );
							}
						}
					}
			}
			$index = $index + 1;
		}
		db2_close($conn_resource);
	}
echo $linea . "<br />";
}
fclose($fp);
$extra = 'Carga.php';
header("Location: http://$host$uri/$extra");
?>