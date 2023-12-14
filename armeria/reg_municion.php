<?php
include("php/conexionBD.php");
$link=AbrirConexion();
$CadSql="Select a.cod_bala,a.calibre_municion from bala a;";

$bala=EjecutarConsulta($CadSql,$link);


?>

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
        <form name="frmPaciente" action="guardar_municion.php" method="POST">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">REGISTRO DE PRODUCTO(MUNICION)</div>
                        <div class="panel-body">

                            <div class="row text-left">
                                <div class="col-sm-3">Nombre</div>
                                <div class="col-sm-9">
                                    <input type="text" name="txtNombre" placeholder="Indique nombre" id="txtNombre">
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
                                <div class="col-sm-3">Cantidad</div>
                                <div class="col-sm-9">
                                    <input type="number" name="numBalas" placeholder="Indique cantidad de balas" id="numBalas">
                                </div>
                            </div>

                            <div class="row text-left">
                                <div class="col-sm-3">Stock</div>
                                <div class="col-sm-9">
                                    <input type="number" name="numProducto" placeholder="Indique existencias" id="numProducto">
                                </div>
                            </div>

                            <div class="row text-left">
                                <div class="col-sm-3">Precio</div>
                                <div class="col-sm-9">
                                    <input type="number" name="Precio" placeholder="Indique Precio" id="Precio">
                                </div>
                            </div>


                            <div class="row text-left">
                                <div class="col-sm-6">
                                    <input type="submit" name="cmdEnviar" value="Guardar Producto" class="btn btn-primary">
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

