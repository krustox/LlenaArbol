<!DOCTYPE html>
<html lang="en">
<?php include('head.php');?>
	<body>
		<div id="wrapper">
		<?php include('header.php'); ?>
		<div id="contain">
			<div id="accordion">
				<h3 id="holding">Holding:</h3>
				<div id="div_holding">
				<?php 
				$query= "Select * from \"servicios\".\"holding\"";
				$conn_resource = db2_connect($conn_string, '', '');
				 if ($conn_resource) {
				 	$resp = db2_prepare($conn_resource, $query);
					 if($resp){
					 	$result = db2_exec($conn_resource, $query	);
						 if ($result) {
					 	 	while ($row = db2_fetch_array($result)) {
       						 echo "<p onclick=\"empresa('$row[0]','$row[1]')\">".$row[1]."</p>"; 
      						}
						 }else{
						 	echo db2_stmt_errormsg();
						 }
      				}
				 }
				 db2_close($conn_resource);
				?>
				</div>
			<h3 id="empresa">Empresa:</h3>
			<div id="div_empresa" ></div>
			<h3 id="canal">Canal:</h3>
			<div id="div_canal" ></div>
			<h3 id="servicio">Plataforma Aplicativa:</h3>
			<div id="div_servicio" ></div>
			<h3 id="tipo">Tipo de Servicio:</h3>
			<div id="div_tipo" ></div>
			<h3 id="subservicio">Subservicio:</h3>
			<div id="div_subservicio" ></div>
			<h3 id="site">Site:</h3>
			<div id="div_site" ></div>
			<h3 id="componente">Componente:</h3>
			<div id="div_componente" ></div>
			<h3 id="subcomponente">Subcomponente:</h3>
			<div id="div_subcomponente" ></div>
			<h3 id="elemento">Elemento</h3>
			<div id="div_elemento" ></div>
			</div>
			<button class="hide" onclick="eliminarArbol()">Eliminar Arbol</button>
			<button onclick="syncArbol()">Sincronizar Arbol</button>
		</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>
