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
	<title>Buscar Arma</title>
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
			<form name="frmPaciente" action="actualizar_paciente.php" method="POST">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">ACTUALIZAR O ELIMINAR PACIENTE</div>
							<div class="panel-body">
								<div class="row text-left">
									<div class="col-sm-3">Rut</div>
									<div class="col-sm-9">
										<input required="required" type="text" name="txtRut" placeholder="Indique rut" id="txtRut"> 
										<input type="buton" name="cmdBuscar" id="cmdBuscar" class="btn btn-primary" value="Buscar Paciente">
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
								<br>
								<div class="row mt-1">
										<div class="col-sm-4">
											<input type="submit" id="cmdModificarPaciente" name="cmdModificarPaciente" class="btn btn-primary" value="Modificar Paciente">
										</div>
										<div class="col-sm-4">
											<input type="submit" id="cmdEliminarPaciente" name="cmdEliminarPaciente" class="btn btn-primary" value="Eliminar Paciente">
										</div>
										<div class="col-sm-4">
											<input type="buton" class="btn btn-success" value="Limpiar" 
											id="cmdLimpiar" name="cmdLimpiar">
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
		$('input#txtRut').keyup(function() {
			Limpiar();
		});
		$("#cmdLimpiar").click(function(){
			alert("hay que limpiar todo, incluyendo el rut");
		});
		$("#cmdBuscar").click(function(){
			var rut=$("#txtRut").val();
			BuscarPaciente(rut);
		});
		$("#cboRegion").change(function(){
			//alert("change region");			
			LlenarProvincias(0,0);
		});
		$("#cboProvincia").change(function(){
			//alert("change provincia");
			LlenarCiudades(0,0);
		});
	});	
</script>
<script type="text/javascript">
	function Limpiar()
	{
		$('#txtNombre').val("");
		$("#txtPaterno").val("");
		$("#txtMaterno").val("");
		$("#txtDireccion").val("");
		$("#txtFechaNacto").val("");
		$("#txtTelefono").val("");
		$("#txtEmail").val("");
		$("#cboTipoSangre").val("");
		$("#cboRegion").val("");
		$("#cboProvincia").val(0);
		$("#cboCiudad").val(0);

	}
	function BuscarPaciente(rut)
	{
		$.ajax({
			type:"POST",
			url:"paciente.php",
			data:"rut="+rut,
			success:function(r){
				var re=JSON.parse(r);
				$("#txtNombre").val(re["nombre_paciente"]);
				$("#txtPaterno").val(re["paterno_paciente"]);
				$("#txtMaterno").val(re["materno_paciente"]);
				$("#txtDireccion").val(re["direccion"]);
				$("#txtFechaNacto").val(re["fecha_nacto"]);
				$("#txtTelefono").val(re["telefono"]);
				$("#txtEmail").val(re["email"]);
				$("#cboTipoSangre").val(re["cod_tipo_sangre"]);
				$("#cboRegion").val(re["cod_region"]);
				$("#cboProvincia").val(re["cod_provincia"]);
				$("#cboCiudad").val(re["cod_ciudad"]);

				codigoRegion=re["cod_region"];
				codigoProvincia=re["cod_provincia"];
				codigoCiudad=re["cod_ciudad"];

				LlenarProvincias(codigoProvincia,codigoRegion);
				LlenarCiudades(codigoProvincia,codigoCiudad);

			}
		});
	}
	function LlenarProvincias(cProvincia,cRegion)
	{
		if(cRegion==0)
		{
			var codRegion=$("#cboRegion").val();
		}
		else
		{
			var codRegion=cRegion;
		}
		$.ajax({
			type:"POST",
			url:"provincias.php",
			data:{"region":codRegion,"provincia":cProvincia},
			success:function(r){
				$('#cboProvincia').html(r);
			}
		});
	}

	function LlenarCiudades(cProvincia,cCiudad,)
	{
		if(cProvincia==0)
		{
			var codProvincia=$("#cboProvincia").val();
		}
		else
		{
			var codProvincia=cProvincia;
		}

		$.ajax({
			type:"POST",
			url:"ciudades.php",
			data:{"provincia":codProvincia,"ciudad":cCiudad},
			success:function(r){
				$('#cboCiudad').html(r);
			}
		});
	}
</script>