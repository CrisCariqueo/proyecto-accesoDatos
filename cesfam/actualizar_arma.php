<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestión Armería</title>
	<?php 
	include("php/links.php");
	?>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
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

				if(isset($_POST["cmdModificarPaciente"]))
					{
						$CadSql="update paciente set ";
						$CadSql.=" nombre_paciente='".$nombre."',";
						$CadSql.=" paterno_paciente='".$paterno."',";
						$CadSql.=" materno_paciente='".$materno."',";
						$CadSql.=" direccion='".$direccion."',";
						$CadSql.=" telefono='".$telefono."',";
						$CadSql.=" fecha_nacto='".$fechaNacto."',";
						$CadSql.=" cod_tipo_sangre='".$tipoSangre."',";
						$CadSql.=" cod_ciudad='".$ciudad."' ";
						$CadSql.=" where rut_paciente='".$rut."';";
						//$exito=EjecutarIUD($CadSql,$link);
						$mensaje="Paciente modificado exitosamente";
					}
					else if(isset($_POST["cmdEliminarPaciente"]))
					{
						$CadSql="Delete from paciente where rut_paciente='".$rut."';";
						//$exito=EjecutarIUD($CadSql,$link);
						$mensaje="Paciente eliminado correctamente";
					}
					else
					{
						header("location: buscar_evento.php");
					}
				//echo $CadSql;
				$exito=EjecutarIUD($CadSql,$link);
				
				if($exito)
				{
					echo '<div class="panel panel-primary">
					<div class="panel-heading">'.$mensaje.'</div>
					</div>';
				}
				else
				{
					echo '<div class="panel panel-danger">
					<div class="panel-heading">Error al actualizar paciente</div>
					</div>';
				}
			}
			else
			{
				header("location: buscar_paciente.php");
			}
			?>
		</div>
		<div class="col-sm-4 text-center"></div>
	</div>

    <div class="row banner">
		<div class="col-sm-12">
			<?php 
			include("php/banner.php");
			?>
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