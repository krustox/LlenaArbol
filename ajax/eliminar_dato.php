<?php
include('../Config/connection.php');
include('../Archivo.php');

$anterior = $_GET['anterior'];
$nombre = $_GET['nombre'];
$tabla = $_GET['tabla'];

if($tabla == "holding"){
	$query= "SELECT count(*) FROM \"servicios\".\"empresa\" WHERE \"nombre_holding\" = '$anterior'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"holding\" where \"nombre_holding\" = '$anterior' AND \"display_holding\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "empresa"){
	$query= "SELECT count(*) FROM \"servicios\".\"canal\" WHERE \"nombre_empresa\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"empresa\" where \"nombre_holding\" = '$anterior' AND \"nombre_empresa\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "canal"){
	$query= "SELECT count(*) FROM \"servicios\".\"servicio\" WHERE \"nombre_canal\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"canal\" where \"nombre_empresa\" = '$anterior' AND \"nombre_canal\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "servicio"){
	$query= "SELECT count(*) FROM \"servicios\".\"tipo_servicio\" WHERE \"nombre_servicio\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"servicio\" where \"nombre_canal\" = '$anterior' AND \"nombre_servicio\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "tipo"){
	$query= "SELECT count(*) FROM \"servicios\".\"subservicio\" WHERE \"nombre_tipo\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"tipo_servicio\" where \"nombre_servicio\" = '$anterior' AND \"nombre_tipo_servicio\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "subservicio"){
	$query= "SELECT count(*) FROM \"servicios\".\"site\" WHERE \"nombre_subservicio\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"subservicio\" where \"nombre_tipo_servicio\" = '$anterior' AND \"nombre_subservicio\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "site"){
	$query= "SELECT count(*) FROM \"servicios\".\"componente\" WHERE \"nombre_site\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"site\" where \"nombre_subservicio\" = '$anterior' AND \"nombre_site\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "componente"){
	$query= "SELECT count(*) FROM \"servicios\".\"subcomponente\" WHERE \"nombre_componente\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"componente\" where \"nombre_site\" = '$anterior' AND \"nombre_componente\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "subcomponente"){
	$query= "SELECT count(*) FROM \"servicios\".\"elemento\" WHERE \"nombre_subcomponente\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"subcomponente\" where \"nombre_componente\" = '$anterior' AND \"nombre_subcomponente\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "elemento"){
	$query= "delete from \"servicios\".\"elemento\" where \"nombre_subcomponente\" = '$anterior' AND \"nombre_elemento\" = '$nombre'";
	ejecutarDelete($query,$conn_string);
	echo "Se ha eliminado el registro";
}

//Experiencia Usuaria
if($tabla == "agrupacion"){
	$query= "SELECT count(*) FROM \"servicios\".\"segmento\" WHERE \"nombre_agrupacion\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"agrupacion\" where \"nombre_tipo_servicio\" = '$anterior' AND \"nombre_agrupacion\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "segmento"){
	$query= "SELECT count(*) FROM \"servicios\".\"producto\" WHERE \"nombre_segmento\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"segmento\" where \"nombre_agrupacion\" = '$anterior' AND \"nombre_segmento\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "producto"){
	$query= "SELECT count(*) FROM \"servicios\".\"transaccion\" WHERE \"nombre_producto\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"producto\" where \"nombre_segmento\" = '$anterior' AND \"nombre_producto\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "transaccion"){
	$query= "SELECT count(*) FROM \"servicios\".\"operacion\" WHERE \"nombre_transaccion\" = '$nombre'";
	$cont = ejecutar($query,$conn_string);
	$query= "delete from \"servicios\".\"transaccion\" where \"nombre_producto\" = '$anterior' AND \"nombre_transaccion\" = '$nombre'";
	if($cont == 0){
		ejecutarDelete($query,$conn_string);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $query . " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "operacion"){
	$query= "delete from \"servicios\".\"operacion\" where \"nombre_transaccion\" = '$anterior' AND \"nombre_operacion\" = '$nombre'";
	ejecutarDelete($query,$conn_string);
	echo "Se ha eliminado el registro";
}

function ejecutar($query, $conn_string){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if (!$result) {
				echo db2_stmt_errormsg();
			}else{
				while ($row = db2_fetch_array($result)){
					return "$row[0]";
				}
			}
    	}
	}
	db2_close($conn_resource);
}

function ejecutarDelete($query, $conn_string){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if (!$result) {
				escribir("Eliminar", db2_stmt_errormsg());
			}else{
				escribir("Eliminar", $query);
			}
    	}
	}
	db2_close($conn_resource);
}
?>