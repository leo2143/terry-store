<?PHP
class Rarities
{

    private $id;

    private $name;



    /**
     * Crea una nueva rareza en la base de datos.
     *
     * @param string $name Nombre de la rareza.
     * @return void
     */
    public static function create($name): void
    {
        $params = ['name' => $name];

        $query = "INSERT INTO rarities (`name`) VALUES (:name)";

        (new Connection())->insertBuilder($query, $params);
    }

    /**
     * Actualiza el nombre de una rareza existente.
     *
     * @param int $id ID de la rareza a actualizar.
     * @param string $name Nuevo nombre de la rareza.
     * @return void
     */
    public static function update($id, $name): void
    {
        $params = ['id' => $id, 'name' => $name];
        $query = "UPDATE rarities SET `name` = :name WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }

    /**
     * Retorna una instancia de Rarities correspondiente al ID proporcionado.
     *
     * @param int $id ID de la rareza.
     * @return Rarities
     */
    public static function getById($id): Rarities
    {
        $query = "SELECT * FROM rarities WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    /**
     * Retorna todas las rarezas existentes en la base de datos.
     *
     * @return array Lista de objetos Rarities.
     */
    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM rarities";

        $allItems = (new Connection())->selectBuilder($query, self::class);

        return $allItems;
    }
    /**
     * Elimina una rareza de la base de datos por su ID.
     *
     * @param int $id ID de la rareza a eliminar.
     * @return void
     */
    public static function delete($id)
    {
        $params = ["id" => $id];

        $query = "DELETE FROM rarities WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
