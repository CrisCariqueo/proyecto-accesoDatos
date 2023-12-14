
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
        include("php/conexionBD.php");
        $link=AbrirConexion();
        $nombre     =$_POST["txtNombre"];
        $categoria  =$_POST["categoria"];
        $bala       =$_POST["calibre"];
        $largo      =$_POST["largo"];
        $peso       =$_POST["peso"];
        $marca      =$_POST["marca"];
        $numProducto=$_POST["numProducto"];
        $precio     =$_POST["Precio"];
        $CadSql="Insert into arma(nombre_arma, cod_categoria_arma, cod_bala, largo_total_arma, peso_arma, cod_marca, stock_arma, precio_arma) 
                values('".$nombre."','".$categoria."','".$bala."','".$largo."','".$peso."','".$marca."','".$numProducto."','".$precio."');";
        //echo $CadSql;
        $exito=EjecutarIUD($CadSql,$link);
        if($exito)
        {
            echo '<div class="panel panel-primary">
					<div class="panel-heading">Producto registrado correctamente</div>
					</div>';
        }
        else
        {
            echo '<div class="panel panel-danger">
					<div class="panel-heading">Producto no registrado</div>
					</div>';
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