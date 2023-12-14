<?php 
include "php/conexionBD.php";
$link=AbrirConexion();

$rut=$_POST["rut"];

$CadSql="Select a.rut_paciente,a.nombre_paciente,a.paterno_paciente,a.materno_paciente,
a.direccion,a.fecha_nacto,a.telefono,a.email,a.cod_tipo_sangre,a.cod_ciudad,
b.cod_provincia,c.cod_region 
from paciente a,ciudad b,provincia c
where  a.cod_ciudad=b.cod_ciudad and b.cod_provincia=c.cod_provincia and 
a.rut_paciente='".$rut."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
	$r["rut_paciente"]=$fila["rut_paciente"];
	$r["nombre_paciente"]=$fila["nombre_paciente"];
	$r["paterno_paciente"]=$fila["paterno_paciente"];
	$r["materno_paciente"]=$fila["materno_paciente"];
	$r["direccion"]=$fila["direccion"];
	$r["telefono"]=$fila["telefono"];
	$r["email"]=$fila["email"];
	$r["fecha_nacto"]=$fila["fecha_nacto"];
	$r["cod_tipo_sangre"]=$fila["cod_tipo_sangre"];
	$r["cod_ciudad"]=$fila["cod_ciudad"];
	$r["cod_provincia"]=$fila["cod_provincia"];
	$r["cod_region"]=$fila["cod_region"];
}
$r=json_encode($r);

echo $r;
CerrarConexion($link);
?>