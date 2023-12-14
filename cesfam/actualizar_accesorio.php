<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Armeria</title>
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
    <div class="col-sm-4 text-center"></div>
    <div class="col-sm-4 text-center">
        <?php
        if(isset($_POST["ID"]))
        {
            include "php/conexionBD.php";
            $link=AbrirConexion();
            $id=$_POST["ID"];
            $marca=$_POST["marca"];
            $nombre=$_POST["txtNombre"];
            $stock=$_POST["cantidadStock"];
            $precio=$_POST["precio"];
            if(isset($_POST["cmdModificarProducto"]))
            {
                $CadSql="update accesorio set ";
                $CadSql.=" cod_marca='".$marca."',";
                $CadSql.=" nombre_accesorio='".$nombre."',";
                $CadSql.=" stock_accesorio='".$stock."',";
                $CadSql.=" precio_accesorio='".$precio."' ";
                $CadSql.=" where cod_accesorio='".$id."';";
                $mensaje="Producto modificado exitosamente";
            }
            else if(isset($_POST["cmdEliminarPaciente"]))
            {
                $CadSql="Delete from accesorio where cod_accesorio='".$id."';";
                $mensaje="Producto eliminado correctamente";
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
					<div class="panel-heading">Error al actualizar producto</div>
					</div>';
            }
        }
        else
        {
            header("location: buscar_municion.php");
        }
        ?>
    </div>
    <div class="col-sm-4 text-center"></div>
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