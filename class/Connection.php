<?php

/**
 * Clase que se encarga de la conexion con la base de datos y devolver la instancia de PDO
 * 
 */
class Connection
{
    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "root";
    private const DB_NAME = "terry_store";
    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME .  ";charset=utf8mb4";


    private PDO $db;

    public function createConnection()
    {
        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die($e);
        }
    }

    /**
     * Retorna la instancia de PDO lista para utilizar
     * @return PDO
     */

    public function getConnection(): PDO
    {
        self::createConnection();
        return $this->db;
    }

    /**
     * Ejecuta una consulta SQL y devuelve los resultados como una lista de objetos de una clase dada.
     *
     * @param string $query Consulta SQL a ejecutar.
     * @param string $class Nombre de la clase a la que se mapearán los resultados.
     * @param array $params Lista de posibles parametros por los que filtrar.
     * @return array Lista de objetos instanciados de la clase especificada.
     */
    public function consultBuilder(string $query, string $class, array $params = []): array
    {
        try {
            self::getConnection();
            $PDOStatement = $this->db->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, $class);
            $PDOStatement->execute($params);
        } catch (Exception $e) {
            die("ocurrio un error en la consulta sql");
        }
        return $PDOStatement->fetchAll();
    }
}
