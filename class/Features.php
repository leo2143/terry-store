<?PHP
class Features
{

    private $id;

    private $name;



    public static function create($name): Features
    {

        $params = ["name" => $name];
        $query = "INSERT INTO features (`name`) VALUES (:name)";

        $allItems = (new Connection())->selectBuilder($query, self::class, $params);

        return $allItems[0];
    }

    public static function update($id, $name): void
    {
        $params = ['id' => $id, 'name' => $name];
        $query = "UPDATE features SET `name` = :name WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }

    public static function getById($id): Features
    {
        $query = "SELECT * FROM features WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM features";

        $allItems = (new Connection())->selectBuilder($query, self::class);

        return $allItems;
    }

    public static function delete($id)
    {

        $params = ["id" => $id];
        $query = "DELETE FROM features WHERE id = :id";

        (new Connection())->insertBuilder($query,  $params);
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
