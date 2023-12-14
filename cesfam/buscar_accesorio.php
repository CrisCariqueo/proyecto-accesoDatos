<?php
include("php/conexionBD.php");
$link=AbrirConexion();
$CadSql="Select a.cod_marca,a.des_marca from marca a;";

$Marca=EjecutarConsulta($CadSql,$link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Accesorio</title>
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
        <form name="frmPaciente" action="actualizar_accesorio.php" method="POST">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">Buscar Accesorio</div>
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
                                <div class="col-sm-3">Marca</div>
                                <div class="col-sm-9">
                                    <select name="marca" id="marca" required="required">
                                        <option value="">Seleccione Marca</option>
                                        <?php
                                        while($fila=mysqli_fetch_array($Marca))
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
                                    <input type="submit" id="cmdEliminarProducto" name="cmdEliminarPaciente" class="btn btn-primary" value="Eliminar Producto">
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
        $("#marca").val("");
        $('#cantidadStock').val("");
        $("#precio").val("");

    }
    function BuscarProducto(id)
    {
        $.ajax({
            type:"POST",
            url:"accesorio.php",
            data:"cod_accesorio="+id,
            success:function(r){
                var re=JSON.parse(r);

                $("#txtNombre").val(re["nombre_accesorio"]);
                $("#marca").val(re["cod_marca"]);
                $('#cantidadStock').val(re["stock_accesorio"]);
                $("#precio").val(re["precio_accesorio"]);

            }
        });
    }

</script>
