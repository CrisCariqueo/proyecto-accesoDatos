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
						<div class="col-sm-2">Cod.Región</div>
						<div class="col-sm-2">Región</div>
						<div class="col-sm-2">Cod.Provincia</div>
						<div class="col-sm-2">Provincia</div>
						<div class="col-sm-2">Cod.Ciudad</div>
						<div class="col-sm-2">Ciudad</div>
					</div>
					<?php 
					include("php/conexionBD.php");
					$link=AbrirConexion();
					$CadSql="Select a.cod_region,a.des_region,b.cod_provincia,
					b.des_provincia,c.cod_ciudad,c.des_ciudad
					from region a,provincia b,ciudad c
					where a.cod_region=b.cod_region and 
					b.cod_provincia=c.cod_provincia;";
					$resultado=EjecutarConsulta($CadSql,$link);
					while($fila=mysqli_fetch_array($resultado))
					{

						?>
						<div class="row">
							<div class="col-sm-2"><?php echo $fila["cod_region"];?></div>
							<div class="col-sm-2"><?php echo $fila["des_region"];?></div>
							<div class="col-sm-2"><?php echo $fila["cod_provincia"];?></div>
							<div class="col-sm-2"><?php echo $fila["des_provincia"];?></div>
							<div class="col-sm-2"><?php echo $fila["cod_ciudad"];?></div>
							<div class="col-sm-2"><?php echo $fila["des_ciudad"];?></div>
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