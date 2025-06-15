<?PHP
class Categories
{

    private $id;

    private $name;



    public static function create($name): void
    {

        $params = ['name' => $name];
        $query = "INSERT INTO categories (`name`) VALUES (:name)";

        (new Connection())->insertBuilder($query, $params);
    }

    public static function update($id, $name): void
    {
        $params = ['id' => $id, 'name' => $name];
        $query = "UPDATE categories SET `name` = :name WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }

    public static function getById($id): Categories
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM categories";

        $allItems = (new Connection())->selectBuilder($query, self::class);

        return $allItems;
    }
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
