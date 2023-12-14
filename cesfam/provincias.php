<?php 
include "php/conexionBD.php";
$link=AbrirConexion();

$codRegion=$_POST["region"];
$codProvincia=$_POST["provincia"];

$CadSql="Select a.cod_provincia,a.des_provincia 
from provincia a where cod_region='".$codRegion."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r='<option value="0">Escoja provincia</option>';
while($fila=mysqli_fetch_array($resultado))
{
	if($codProvincia==$fila["cod_provincia"])
	{
		$r.='<option value="'.$fila["cod_provincia"].'" selected="selected">'.$fila["des_provincia"].'</option>';
	}
	else
	{
		$r.='<option value="'.$fila["cod_provincia"].'">'.$fila["des_provincia"].'</option>';
	}
}

echo $r;

?>