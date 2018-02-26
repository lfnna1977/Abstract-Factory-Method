<?php

require ('../src/AbstractFactory.php');
// USANDO EL METODO FABRICA ABSTRACTA
// Para conexion a base de datos
// --------------------

// Si no se define algun driver en la configuracion, toma por defecto MYSQL
$instanciaMYSQL = FabricaAbstracta::getFabrica()->getBasedeDatos();
Configuracion::$fabrica = "pgsql";
$instanciaPOSTGRESQL = FabricaAbstracta::getFabrica()->getBasedeDatos();
Configuracion::$fabrica = "sqlsrv";
$instanciaSQLSERVER  = FabricaAbstracta::getFabrica()->getBasedeDatos();



// MYSQL
print_r($instanciaMYSQL->getNombre());
print_r(" ");
// POSTGRESQL
print_r($instanciaPOSTGRESQL->getNombre());
print_r(" ");
//  SQLSERVER
print_r($instanciaSQLSERVER->getNombre());
print_r(" ");
?>