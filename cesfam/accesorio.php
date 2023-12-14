<?php
include "php/conexionBD.php";
$link=AbrirConexion();

$codAccesorio=$_POST["cod_accesorio"];

$CadSql="Select a.nombre_accesorio,a.cod_marca,a.stock_accesorio,
a.precio_accesorio
from accesorio a
where  a.cod_accesorio='".$codAccesorio."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
    $r["nombre_accesorio"]=$fila["nombre_accesorio"];
    $r["cod_marca"]=$fila["cod_marca"];
    $r["stock_accesorio"]=$fila["stock_accesorio"];
    $r["precio_accesorio"]=$fila["precio_accesorio"];
}
$r=json_encode($r);

echo $r;
CerrarConexion($link);
?>
