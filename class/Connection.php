<?php

/**
 * Clase que se encarga de la conexion con la base de datos y devolver la instancia de PDO
 * 
 */
class Connection
{
    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "terry_store";
    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME .  ";charset=utf8mb4";


    private static ?PDO $db = null;
    /**
     * Establece una conexión PDO a la base de datos y la asigna a una propiedad estática.
     * 
     * Si la conexión falla, detiene la ejecución con un mensaje de error.
     * 
     * @return void
     */
    public static function createConnection()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die("hubo un error al conectarse con la base de datos");
        }
    }

    /**
     * Retorna una instancia activa de la conexión PDO.
     * 
     * Si aún no hay conexión, la crea automáticamente.
     * 
     * @return PDO Instancia de la conexión a la base de datos.
     */

    public static function getConnection(): PDO
    {
        self::createConnection();
        return self::$db;
    }

    /**
     * Ejecuta una consulta SELECT SQL y devuelve los resultados como una lista de objetos o como un `PDOStatement`.
     *
     * @param string $query Consulta SQL a ejecutar.
     * @param string $class Nombre de la clase en la que se mapearán los resultados (si $complexClass es false).
     * @param array $params Parámetros asociados a la consulta preparada.
     * @param bool $complexClass Si es true, devuelve un `PDOStatement` con resultados en formato asociativo (ideal para joins o estructuras complejas).
     * 
     * @return mixed Array de objetos instanciados o `PDOStatement` si $complexClass es true.
     */

    public static function selectBuilder(string $query, string $class, array $params = [], bool $complexClass = false): mixed
    {
        try {
            self::getConnection();
            $PDOStatement = self::$db->prepare($query);
            if ($complexClass) {
                $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
                $PDOStatement->execute($params);

                return $PDOStatement;
            } else {
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, $class);
                $PDOStatement->execute($params);

                return $PDOStatement->fetchAll();
            }
        } catch (Exception $e) {
            throw new Exception("Ocurrió un error al ejecutar la consulta: " . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Ejecuta una sentencia SQL de tipo INSERT, UPDATE o DELETE.
     *
     * @param string $query Consulta SQL a ejecutar.
     * @param array $params Parámetros asociados a la consulta preparada.
     * @param bool $lastId Si es true, retorna el último ID insertado.
     * 
     * @return mixed Retorna el ID del último registro insertado si $lastId es true, de lo contrario null.
     */
    public static function insertBuilder(string $query, array $params = [], bool $lastId = false): mixed
    {
        try {
            self::getConnection();
            $PDOStatement = self::$db->prepare($query);
            $PDOStatement->execute($params);
            if ($lastId) return self::$db->lastInsertId();
            return null;
        } catch (Exception $e) {
            throw new Exception("Ocurrió un error al ejecutar la consulta: " . $e->getMessage(), 0, $e);
        }
    }
}
