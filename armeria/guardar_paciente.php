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
		<div class="col-sm-4 text-center"></div>
		<div class="col-sm-4 text-center">
			<?php 
			if(isset($_POST["txtRut"]))
			{
				include "php/conexionBD.php";
				$link=AbrirConexion();
				$rut=$_POST["txtRut"];
				$nombre=$_POST["txtNombre"];
				$paterno=$_POST["txtPaterno"];
				$materno=$_POST["txtMaterno"];
				$direccion=$_POST["txtDireccion"];
				$fechaNacto=$_POST["txtFechaNacto"];
				$telefono=$_POST["txtTelefono"];
				$email=$_POST["txtEmail"];
				$tipoSangre=$_POST["cboTipoSangre"];
				$ciudad=$_POST["cboCiudad"];
					//dar formato a la fecha año-mes-dia
				$fechaNacto=date('Y-m-d', strtotime($fechaNacto));

				$CadSql="Insert into paciente(rut_paciente,nombre_paciente,paterno_paciente,materno_paciente,direccion,fecha_nacto,telefono,email,cod_tipo_sangre,cod_ciudad) values('".$rut."','".$nombre."','".$paterno."','".$materno."','".$direccion."','".$fechaNacto."','".$telefono."','".$email."','".$tipoSangre."','".$ciudad."');";
					//echo $CadSql;
				$exito=EjecutarIUD($CadSql,$link);
				if($exito)
				{
					echo '<div class="panel panel-primary">
					<div class="panel-heading">Paciente registrado correctamente</div>
					</div>';
				}
				else
				{
					echo '<div class="panel panel-danger">
					<div class="panel-heading">Paciente registrado correctamente</div>
					</div>';
				}
			}
			else
			{
				header("location: reg_paciente.php");
			}
			?>
		</div>
		<div class="col-sm-4 text-center"></div>
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