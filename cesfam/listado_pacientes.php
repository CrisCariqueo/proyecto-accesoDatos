<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Pacientes</title>
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
	<div class="row contenido segundo_plano">
		<div class="col-sm-12 text-center">
			<h1>BIENVENIDO AL SISTEMA DE GESTIÓN <br>
				DEL CENTRO DE SALUD FAMILIAR <br>
			PARA LA COMUNA DE TEMUCO</h1>
			<br><br>
			<div class="panel panel-primary text-left">
				<div class="panel-heading text-center">Listado de regiones, provincias y ciudades</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-1">Rut</div>
						<div class="col-sm-3">Nombre</div>
						<div class="col-sm-2">Dirección</div>
						<div class="col-sm-1">F.Nacto</div>
						<div class="col-sm-1">Sangre</div>
						<div class="col-sm-1">Ciudad</div>
						<div class="col-sm-1">Provincia</div>
						<div class="col-sm-2">Región</div>
					</div>
					<?php 


					$pag=0;
					if(isset($_GET["pag"])){
						$pag=$_GET["pag"];
						$pag++;
					}



					include("php/conexionBD.php");
					$link=AbrirConexion();
					$CadSql='Select a.rut_paciente,
					concat(a.nombre_paciente," ",a.paterno_paciente," ",a.materno_paciente) "nombre_paciente",
					a.fecha_nacto,a.direccion,a.telefono,a.email,b.des_tipo_sangre,c.des_ciudad,
					d.des_provincia,e.des_region
					from paciente a,tipo_sangre b,ciudad c, provincia d, region e
					where a.cod_tipo_sangre=b.cod_tipo_sangre and 
					a.cod_ciudad=c.cod_ciudad and c.cod_provincia=d.cod_provincia and 
					d.cod_region=e.cod_region limit 0,50;';
					$resultado=EjecutarConsulta($CadSql,$link);
					while($fila=mysqli_fetch_array($resultado)){

						?>
						<div class="row" title="Teléfono:<?php echo $fila['telefono'];?> Email:<?php echo $fila['email'];?>">
							<div class="col-sm-1"><?php echo $fila["rut_paciente"];?></div>
							<div class="col-sm-3"><?php echo $fila["nombre_paciente"];?></div>
							<div class="col-sm-2"><?php echo $fila["direccion"];?></div>
							<div class="col-sm-1"><?php echo $fila["fecha_nacto"];?></div>
							<div class="col-sm-1"><?php echo $fila["des_tipo_sangre"];?></div>
							<div class="col-sm-1"><?php echo $fila["des_ciudad"];?></div>
							<div class="col-sm-1"><?php echo $fila["des_provincia"];?></div>
							<div class="col-sm-2"><?php echo $fila["des_region"];?></div>
						</div>

						<?php 
					}
					CerrarConexion($link);
					?>
				</div>
			</div>
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