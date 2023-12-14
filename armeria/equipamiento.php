<?php
include "php/conexionBD.php";
$link=AbrirConexion();

$codEquipamiento=$_POST["cod_equipamiento"];

$CadSql="Select a.nombre_equipamiento,a.cod_marca,a.stock_equipamiento,
a.precio_equipamiento
from equipamiento a
where  a.cod_equipamiento='".$codEquipamiento."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
    $r["nombre_equipamiento"]=$fila["nombre_equipamiento"];
    $r["cod_marca"]=$fila["cod_marca"];
    $r["stock_equipamiento"]=$fila["stock_equipamiento"];
    $r["precio_equipamiento"]=$fila["precio_equipamiento"];
}
$r=json_encode($r);

echo $r;
CerrarConexion($link);
?>
