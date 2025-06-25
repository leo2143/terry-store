<?PHP
class Categories
{

    private $id;

    private $name;


    /**
     * Crea una nueva categoría en la base de datos.
     *
     * @param string $name Nombre de la categoría.
     * @return void
     */
    public static function create($name): void
    {

        $params = ['name' => $name];
        $query = "INSERT INTO categories (`name`) VALUES (:name)";

        (new Connection())->insertBuilder($query, $params);
    }
    /**
     * Actualiza una categoría existente.
     *
     * @param int $id ID de la categoría a actualizar.
     * @param string $name Nuevo nombre de la categoría.
     * @return void
     */
    public static function update($id, $name): void
    {
        $params = ['id' => $id, 'name' => $name];
        $query = "UPDATE categories SET `name` = :name WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }

    /**
     * Obtiene una categoría por su ID.
     *
     * @param int $id ID de la categoría.
     * @return Categories Instancia de la categoría encontrada.
     */
    public static function getById($id): Categories
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }

    /**
     * Obtiene todas las categorías.
     *
     * @return Categories[] Array de categorías.
     */
    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM categories";

        $allItems = (new Connection())->selectBuilder($query, self::class);

        return $allItems;
    }
    /**
     * Elimina una categoría por su ID.
     *
     * @param int $id ID de la categoría a eliminar.
     * @return void
     */
    public static function delete($id)
    {
        $params = ["id" => $id];

        $query = "DELETE FROM categories WHERE id = :id";

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
