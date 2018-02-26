<?php
/**
 * Archivo de configuración
 */
class Configuracion
{
    // Base de datos por defecto
    public static $fabrica = "mysql";
}

/**
 * Base de datos
 */
interface BasedeDatos
{
    /**
     * Retorna el nombre de la base de datos
     * @return cadena
     */
    public function getNombre();
}

/**
 * Fabrica Abstracta
 */
abstract class FabricaAbstracta
{
    /**
     * Retorna fabrica
     * @return FabricaAbstracta - objeto hijo
     * @throws Excepción
     */
    public static function getFabrica()
    {
        switch(Configuracion::$fabrica){
            case "mysql":
                return new MySqlFabrica();
            case "pgsql":
                return new PostgreSqlFabrica();
            case "sqlsrv";
                return new SQLServerFabrica();
        }
        throw new Exception('Base de datos erronea');
    }

    /**
     * Retorna una base de datos
     * @return BasedeDatos
     */
    abstract public function getBasedeDatos();
}

/**
 * MYSQL
 */
class MySqlFabrica extends FabricaAbstracta
{
    /**
     * Returna una base de datos
     * @return BasedeDatos
     */
    public function getBasedeDatos()
    {
        return new MySqlBD();
    }
}

/**
 * Base de datos de la fabrica MYSQL 
*/
class MySqlBD implements BasedeDatos
{
    /**
     * Returna el nombre de la base de datos
     * @return cadena
     */
    public function getNombre()
    {
        return 'Conexion a MySql';
    }
}

/**
 * POSTGRESQL
 */
class PostgreSqlFabrica extends FabricaAbstracta
{
    /**
     * Returna una base de datos
     * @return BasedeDatos
     */
    public function getBasedeDatos()
    {
        return new PostgreSqlBD();
    }
}

/**
 * Base de datos de la Fabrica POSTGRESQL
 */
class PostgreSqlBD implements BasedeDatos
{
    /**
     * Returna el nombre de la base de datos
     * @return cadena
     */
    public function getNombre()
    {
        return 'Conexion a PostgreSql';
    }
}

/**
 * SQLSERVER
 */
class SQLServerFabrica extends FabricaAbstracta
{
    /**
     * Returna una base de datos
     * @return BasedeDatos
     */
    public function getBasedeDatos()
    {
        return new SQLServerBD();
    }
}

/**
 * Base de datos de la Fabrica SQLSERVER
 */
class SQLServerBD implements BasedeDatos
{
    /**
     * Returna el nombre de la base de datos
     * @return cadena
     */
    public function getNombre()
    {
        return 'Conexion a SQLServer';
    }
}
?>