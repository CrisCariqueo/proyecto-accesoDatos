<?php
include "php/conexionBD.php";
$link=AbrirConexion();

$codMunicion=$_POST["cod_municion"];

$CadSql="Select a.nombre_municion,a.cod_bala,a.cantidad_caja_municion,a.stock_municion,
a.precio_municion
from municion a
where  a.cod_municion='".$codMunicion."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
    $r["nombre_municion"]=$fila["nombre_municion"];
    $r["cod_bala"]=$fila["cod_bala"];
    $r["cantidad_caja_municion"]=$fila["cantidad_caja_municion"];
    $r["stock_municion"]=$fila["stock_municion"];
    $r["precio_municion"]=$fila["precio_municion"];
}
$r=json_encode($r);

echo $r;
CerrarConexion($link);
?>
