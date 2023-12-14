<?php 
include "php/conexionBD.php";
$link=AbrirConexion();

$cod=$_POST["cod"];

$CadSql="Select a.nombre_arma, a.cod_categoria_arma, a.cod_bala, a.largo_total_arma, a.peso_arma, a.cod_marca, a.stock_arma, 
a.precio_arma
from arma a
where a.cod_arma=".$cod."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
	$r["nombre_arma"]     =$fila["nombre_arma"];
	$r["cod_categoria"]   =$fila["cod_categoria"];
	$r["cod_bala"]        =$fila["cod_bala"];
	$r["largo_total_arma"]=$fila["largo_total_arma"];
	$r["peso_arma"]       =$fila["peso_arma"];
	$r["cod_marca"]       =$fila["cod_marca"];
	$r["stock_arma"]      =$fila["stock_arma"];
	$r["precio_arma"]     =$fila["precio_arma"];
}
$r=json_encode($r);

echo $r;
CerrarConexion($link);
?>