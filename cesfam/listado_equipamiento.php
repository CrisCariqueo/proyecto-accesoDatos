<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Equipamientos</title>
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
        <h1>Bienvenido a C&S Soluciones Armamentisticas</h1>
        <br><br>
        <div class="panel panel-primary text-left">
            <div class="panel-heading text-center">Listado de Equipamientos</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-1">Codigo</div>
                    <div class="col-sm-3">Nombre</div>
                    <div class="col-sm-2">Marca</div>
                    <div class="col-sm-1">Stock</div>
                    <div class="col-sm-1">Precio</div>
                </div>
                <?php

                $pag=0;
                if(isset($_GET["pag"])){
                    $pag=$_GET["pag"];
                    $pag++;
                }

                include("php/conexionBD.php");
                $link=AbrirConexion();
                $CadSql='Select a.cod_equipamiento,a.nombre_equipamiento, b.des_marca, a.stock_equipamiento, a.precio_equipamiento
					from equipamiento a, marca b
					where a.cod_marca = b.cod_marca limit 0,50;';
                $resultado=EjecutarConsulta($CadSql,$link);
                while($fila=mysqli_fetch_array($resultado)){

                    ?>
                    <div class="row">
                        <hr>
                        <div class="col-sm-1"><?php echo $fila["cod_equipamiento"];?></div>
                        <div class="col-sm-3"><?php echo $fila["nombre_equipamiento"];?></div>
                        <div class="col-sm-2"><?php echo $fila["des_marca"];?></div>
                        <div class="col-sm-1"><?php echo $fila["stock_equipamiento"];?></div>
                        <div class="col-sm-1"><?php echo $fila["precio_equipamiento"];?></div>

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