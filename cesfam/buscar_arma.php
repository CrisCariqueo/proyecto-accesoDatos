<?php
include("php/conexionBD.php");
$link=AbrirConexion();
$CadSql="Select a.cod_categoria_arma, a.des_categoria_arma from categoria_arma a;";

$categoria_arma=EjecutarConsulta($CadSql,$link);

$CadSql="Select a.cod_bala, a.calibre_municion from bala a;";

$bala=EjecutarConsulta($CadSql,$link);

$CadSql="Select a.cod_marca, a.des_marca from marca a;";
$marcas=EjecutarConsulta($CadSql,$link);

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

	<div class="row contenido segundo_plano">
		<div class="col-sm-12 text-center">
			<h1>BUSCAR ARMA</h1>
			<br><br>
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
							<div class="panel-heading text-center">Buscar Arma</div>
							<div class="panel-body">

								<div class="row text-left">
									<div class="col-sm-3">Codigo de Arma</div>
									<div class="col-sm-9">
										<input required="required" type="number" name="ID" placeholder="Indique código" id="ID"> 
										<input type="buton" name="cmdBuscar" id="cmdBuscar" class="btn btn-primary" value="Buscar Arma">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Nombre</div>
									<div class="col-sm-9">
										<input type="text" name="txtNombre" placeholder="Indique nombre" id="txtNombre">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Categoría Arma</div>
									<div class="col-sm-9">
										<select name="categoria" id="categoria" required="required">
											<option value="">Seleccione categoria</option>
											<?php
											while($fila=mysqli_fetch_array($categoria_arma))
											{
												?>

												<option value="<?php echo $fila["cod_categoria_arma"];?>">
													<?php echo $fila["des_categoria_arma"];?>
												</option>
												<?php
											}
											?>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Calibre</div>
									<div class="col-sm-9">
										<select name="calibre" id="calibre" required="required">
											<option value="">Seleccione Calibre</option>
											<?php
											while($fila=mysqli_fetch_array($bala))
											{
												?>
												<option value="<?php echo $fila["cod_bala"];?>">
													<?php echo $fila["calibre_municion"];?>
												</option>
												<?php
											}
											?>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Largo Total</div>
									<div class="col-sm-9">
										<input type="number" name="largo" placeholder="Indique largo" id="largo">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Peso</div>
									<div class="col-sm-9">
										<input type="number" name="peso" placeholder="Indique peso" id="peso">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Marca</div>
									<div class="col-sm-9">
										<select name="marca" id="marca" required="required">
											<option value="">Seleccione marca</option>
											<?php
											while($fila=mysqli_fetch_array($marcas))
											{
												?>
												<option value="<?php echo $fila["cod_marca"];?>">
													<?php echo $fila["des_marca"];?>
												</option>
												<?php
											}
											?>
										</select>
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Stock</div>
									<div class="col-sm-9">
										<input type="number" name="cantidadStock" placeholder="Indique stock" id="cantidadStock">
									</div>	
								</div>

								<div class="row text-left">
									<div class="col-sm-3">Precio</div>
									<div class="col-sm-9">
										<input type="number" name="precio" placeholder="Indique precio" id="precio">
									</div>	
								</div>

								<br>
								<div class="row mt-1">
									<div class="col-sm-4">
										<input type="submit" id="cmdModificarArma" name="cmdModificarArma" class="btn btn-primary" value="Modificar Arma">
									</div>
									<div class="col-sm-4">
										<input type="submit" id="cmdEliminarArma" name="cmdEliminarArma" class="btn btn-primary" value="Eliminar Arma">
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
		$("#cmdLimpiar").click(function(){
			Limpiar();
		});
		$("#cmdBuscar").click(function(){
			var id=$("#ID").val();
			BuscarProducto(id);
		});
	});	
</script>
<script type="text/javascript">
	function Limpiar()
	{
		$("#ID").val("");
		$("#txtNombre").val("");
		$("#categoria").val("");
		$("#calibre").val("");
		$("#largo").val("");
		$("#peso").val("");
		$("#marca").val("");
		$('#cantidadStock').val("");
		$("#txtPrecio").val("");
	}

	function BuscarProducto(id)
	{
		$.ajax({
			type:"POST",
			url:"arma.php",
			data:"cod_arma="+id,
			success:function(r){
				var re=JSON.parse(r);
				$("#txtNombre").val(re["nombre_arma"]);
				$("#categoria").val(re["cod_categoria_arma"]);
				$("#calibre").val(re["cod_bala"]);
				$("#largo").val(re["largo_total_arma"]);
				$("#peso").val(re["peso_arma"]);
				$("#marca").val(re["cod_marca"]);
				$('#cantidadStock').val(re["stock_arma"]);
				$("#precio").val(re["precio_arma"]);
			}
		});
	}
</script>