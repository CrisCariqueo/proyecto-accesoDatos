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
    <title>Buscar Municion</title>
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
        <form name="frmPaciente" action="actualizar_municion.php" method="POST">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">Buscar Municion</div>
                        <div class="panel-body">
                            <div class="row text-left">
                                <div class="col-sm-3">ID interna</div>
                                <div class="col-sm-9">
                                    <input required="required" type="number" name="ID" placeholder="Indique id interna" id="ID">
                                    <input type="buton" name="cmdBuscar" id="cmdBuscar" class="btn btn-primary" value="Buscar Producto">
                                </div>
                            </div>
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
                                <div class="col-sm-3">Cantidad Municion</div>
                                <div class="col-sm-9">
                                    <input type="number" name="numBalas" placeholder="Indique Cantidad" id="numBalas">
                                </div>
                            </div>
                            <div class="row text-left">
                                <div class="col-sm-3">Stock</div>
                                <div class="col-sm-9">
                                    <input type="number" name="cantidadStock" placeholder="Indique Stock" id="cantidadStock">
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
                                    <input type="submit" id="cmdModificarProducto" name="cmdModificarProducto" class="btn btn-primary" value="Modificar Producto">
                                </div>
                                <div class="col-sm-4">
                                    <input type="submit" id="cmdEliminarProducto" name="cmdEliminarProducto" class="btn btn-primary" value="Eliminar Producto">
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
        $("#calibre").val("");
        $('#numBalas').val("");
        $('#cantidadStock').val("");
        $("#precio").val("");

    }
    function BuscarProducto(id)
    {
        $.ajax({
            type:"POST",
            url:"municion.php",
            data:"cod_municion="+id,
            success:function(r){
                var re=JSON.parse(r);

                $("#txtNombre").val(re["nombre_municion"]);
                $("#calibre").val(re["cod_bala"]);
                $('#numBalas').val(re["cantidad_caja_municion"]);
                $('#cantidadStock').val(re["stock_municion"]);
                $("#precio").val(re["precio_municion"]);

            }
        });
    }

</script>
