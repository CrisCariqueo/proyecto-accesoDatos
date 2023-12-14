<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Municiones</title>
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
            <div class="panel-heading text-center">Listado de Municiones</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-1">Codigo</div>
                    <div class="col-sm-3">Nombre</div>
                    <div class="col-sm-2">Calibre</div>
                    <div class="col-sm-1">Cantidad de Balas</div>
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
                $CadSql='Select a.cod_municion,a.nombre_municion, b.calibre_municion, a.cantidad_caja_municion, a.stock_municion, a.precio_municion
					from municion a, bala b
					where a.cod_bala = b.cod_bala limit 0,50;';
                $resultado=EjecutarConsulta($CadSql,$link);
                while($fila=mysqli_fetch_array($resultado)){

                    ?>
                    <div class="row">
                        <hr>
                        <div class="col-sm-1"><?php echo $fila["cod_municion"];?></div>
                        <div class="col-sm-3"><?php echo $fila["nombre_municion"];?></div>
                        <div class="col-sm-2"><?php echo $fila["calibre_municion"];?></div>
                        <div class="col-sm-1"><?php echo $fila["cantidad_caja_municion"];?></div>
                        <div class="col-sm-1"><?php echo $fila["stock_municion"];?></div>
                        <div class="col-sm-1"><?php echo $fila["precio_municion"];?></div>

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