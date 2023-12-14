<?php 
include "php/conexionBD.php";
$link=AbrirConexion();

$codProvincia=$_POST["provincia"];
$codCiudad=$_POST["ciudad"];

$CadSql="Select a.cod_ciudad,a.des_ciudad 
from ciudad a where cod_provincia='".$codProvincia."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r='<option value="">Escoja ciudad</option>';
while($fila=mysqli_fetch_array($resultado))
{
	if($codCiudad==$fila["cod_ciudad"])
	{
		$r.='<option value="'.$fila["cod_ciudad"].'" selected="selected">'.$fila["des_ciudad"].'</option>';
	}
	else
	{
		$r.='<option value="'.$fila["cod_ciudad"].'">'.$fila["des_ciudad"].'</option>';
	}
}

echo $r;

?>