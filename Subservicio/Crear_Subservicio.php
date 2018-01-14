<!DOCTYPE html>
<html lang="en">
<?php include('../head.php');?>
<body>
  <div>
    <?php include('../header.php');?>
    <?php include('../success.php');?>
    <div id="container">
    <h2>Crear Subservicio</h2>
    <div class="formularios">
      	<form action="newsubservicio.php" method="post">
					<label>Holding</label>
					<select name="holding" id="holding">
						<option value=" ">  </option>
						<?php
						$query= "Select * from \"servicios\".\"holding\"";
				$conn_resource = db2_connect($conn_string, '', '');
				 if ($conn_resource) {
				 	$resp = db2_prepare($conn_resource, $query);
					 if($resp){
					 	$result = db2_exec($conn_resource, $query	);
						 if ($result) {
					 	 	while ($row = db2_fetch_array($result)) {
       						?><option value="<?php echo "$row[0]"; ?>"><?php echo "$row[1] "; ?></option><?php
      						}
						 }else{
						 	echo db2_stmt_errormsg();
						 }
      				}
				 }
				 db2_close($conn_resource);
				?>
					</select>
					<label>Empresa</label>
					<select id="empresa" name="empresa">
						<option value=" "> </option>
					</select>
					<label>Canal</label>
					<select id="canal" name="canal">
						<option value=" "> </option>
					</select>
					<label>Servicio</label>
					<select id="servicio" name="servicio">
						<option value=" "> </option>
					</select>
					<label>Tipo de Servicio</label>
					<select id="tipo_servicio" name="tipo_servicio">
						<option value=" "> </option>
					</select>
					<label>Nombre Subservicio</label>
					<input type="text" name="display_subservicio" id="display_subservicio" />
					<input type="submit" value="Enviar" />
				</form>

    </div>
</div>
    <?php include('../footer.php');?>
  </div>
</body>
</html>
