<?PHP
class Categories
{

    private $id;

    private $name;



    public static function create($name): Categories
    {

        $allItems = [];
        $query = "INSERT INTO categories (`name`) VALUES (:name)";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems[0];
    }

    public static function update(): Categories
    {
        $allItems = [];
        $query = "INSERT INTO categories (`name`) VALUES (:name)";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems[0];
    }

    public static function getById($id): Categories
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->consultBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM categories";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems;
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
