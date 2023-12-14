<?php
include("php/conexionBD.php");
$link=AbrirConexion();
$CadSql="Select a.cod_tipo_sangre,a.des_tipo_sangre from tipo_sangre a;";

$tipo_sangre=EjecutarConsulta($CadSql,$link);

$CadSql="Select a.cod_region,a.des_region from region a;";

$regiones=EjecutarConsulta($CadSql,$link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestión CESFAM</title>
	<?php 
	include("php/links.php");
	?>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="row banner">
		<div class="col-sm-12">
			<?php 
			include("php/banner.php");
			?>
		</div>
	</div>
	<div class="row menu">
		<div class="col-sm-12">
			<?php 
			include("php/menu.php");
			?>
			<br><br>
		</div>
	</div>
	<div class="row contenido">
		<div class="col-sm-12 text-center">
			<form name="frmPaciente" action="guardar_paciente.php" method="POST">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">REGISTRO DE PACIENTES</div>
							<div class="panel-body">
								<div class="row text-left">
									<div class="col-sm-3">Rut</div>
									<div class="col-sm-9">
										<input required="required" type="text" name="txtRut" placeholder="Indique rut" id="txtRut">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Nombre</div>
									<div class="col-sm-9">
										<input type="text" name="txtNombre" placeholder="Indique nombre" id="txtNombre">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Paterno</div>
									<div class="col-sm-9">
										<input type="text" name="txtPaterno" placeholder="Indique apellido paterno" id="txtPaterno">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Materno</div>
									<div class="col-sm-9">
										<input type="text" name="txtMaterno" placeholder="Indique apellido materno" id="txtMaterno">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Dirección</div>
									<div class="col-sm-9">
										<input type="text" name="txtDireccion" placeholder="Indique dirección" id="txtDireccion">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Fecha Nacto.</div>
									<div class="col-sm-9">
										<input type="date" name="txtFechaNacto" placeholder="Indique fecha" id="txtFechaNacto" required="required">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Edad</div>
									<div class="col-sm-9">
										<input type="number" name="txtEdad" placeholder="Indique edad" id="txtEdad" min="0" max="99">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Teléfono</div>
									<div class="col-sm-9">
										<input type="text" name="txtTelefono" placeholder="Indique teléfono" id="txtTelefono">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Email</div>
									<div class="col-sm-9">
										<input type="text" name="txtEmail" placeholder="Indique email" id="txtEmail">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Tipo Sangre</div>
									<div class="col-sm-9">
										<select name="cboTipoSangre" id="cboTipoSangre" required="required">
											<option value="">Seleccione tipo sangre</option>
											<?php
											while($fila=mysqli_fetch_array($tipo_sangre))
											{
												?>

												<option value="<?php echo $fila["cod_tipo_sangre"];?>">
													<?php echo $fila["des_tipo_sangre"];?>
												</option>
												<?php
											}
											?>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Región</div>
									<div class="col-sm-9">
										<select name="cboRegion" id="cboRegion">
											<option value="">Seleccione región</option>
											<?php
											while($fila=mysqli_fetch_array($regiones))
											{
												?>
												<option value="<?php echo $fila["cod_region"];?>">
													<?php echo $fila["des_region"];?>
												</option>
												<?php
											}
											?>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Provincia</div>
									<div class="col-sm-9">
										<select name="cboProvincia" id="cboProvincia">
											<option value="">Seleccione provincia</option>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Ciudad</div>
									<div class="col-sm-9">
										<select name="cboCiudad" id="cboCiudad">
											<option value="">Seleccione ciudad</option>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-6">
										<input type="submit" name="cmdEnviar" value="Guardar Paciente" class="btn btn-primary">
									</div>
									<div class="col-sm-6">
										<input type="reset" name="cmdLimpiar" class="btn btn-success" value="Limpiar Formulario">
									</div>	
								</div>

							</div>
						</div>


					</div>
					<div class="col-sm-3"></div>
				</div>

			</form>
		</div>
	</div>
	<div class="row pie">
		<div class="col-sm-12">
			<?php 
			include("php/pie.php");
			?>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cboRegion").change(function(){
			//alert("change region");			
			LlenarProvincias();
		});
		$("#cboProvincia").change(function(){
			//alert("change provincia");
			LlenarCiudades();
		});
	});	
</script>
<script type="text/javascript">
	function LlenarProvincias()
	{
		var codRegion=$("#cboRegion").val();
		$.ajax({
			type:"POST",
			url:"provincias.php",
			data:"region="+codRegion,
			success:function(r){
				//alert(r);
				$('#cboProvincia').html(r);
			}
		});
	}

	function LlenarCiudades()
	{
		var codProvincia=$("#cboProvincia").val();
		$.ajax({
			type:"POST",
			url:"ciudades.php",
			data:"provincia="+codProvincia,
			success:function(r){
				//alert(r);
				$('#cboCiudad').html(r);
			}
		});
	}
</script>