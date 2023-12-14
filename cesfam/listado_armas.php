<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Armas</title>
	<?php 
	include("php/links.php");
	?>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="row contenido segundo_plano">
		<div class="col-sm-12 text-center">
			<h1>LISTADO ARMAS</h1>
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


    <div class="panel panel-primary text-left">
        <div class="panel-heading text-center">Listado de armas</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-1">Cod.Arma</div>
                <div class="col-sm-2">Arma</div>
                <div class="col-sm-1">Cod.Categoria_Arma</div>
                <div class="col-sm-1">Cod.Bala</div>
                <div class="col-sm-1">Largo_Total_Arma</div>
                <div class="col-sm-1">Peso_Arma</div>
                <div class="col-sm-1">Cod.Marca</div>
                <div class="col-sm-2">Stock_Arma</div>
                <div class="col-sm-2">Precio_arma</div>
            </div>
            <br>
            <?php 
            include("php/conexionBD.php");
            $link=AbrirConexion();
            $CadSql="Select a.cod_arma, a.nombre_arma, a.cod_categoria_arma, a.cod_bala, a.largo_total_arma, a.peso_arma, a.cod_marca, a.stock_arma, a.precio_arma
            from arma a";
            $resultado=EjecutarConsulta($CadSql,$link);
            while($fila=mysqli_fetch_array($resultado))
            {

                ?>
                <hr>
                <div class="row">
                    <div class="col-sm-1"><?php echo $fila["cod_arma"];?></div>
                    <div class="col-sm-2"><?php echo $fila["nombre_arma"];?></div>
                    <div class="col-sm-1"><?php echo $fila["cod_categoria_arma"];?></div>
                    <div class="col-sm-1"><?php echo $fila["cod_bala"];?></div>
                    <div class="col-sm-1"><?php echo $fila["largo_total_arma"];?></div>
                    <div class="col-sm-1"><?php echo $fila["peso_arma"];?></div>
                    <div class="col-sm-1"><?php echo $fila["cod_marca"];?></div>
                    <div class="col-sm-2"><?php echo $fila["stock_arma"];?></div>
                    <div class="col-sm-2"><?php echo $fila["precio_arma"];?></div>
                </div>

                <?php 
            }
            CerrarConexion($link);
            ?>
        </div>
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