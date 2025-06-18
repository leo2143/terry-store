<?php

class Equipment
{
    private  $id;
    private  $name;
    private  $type;
    private  Categories $category;
    private  Rarities $rarity;

    private  array $features;

    private  $material;
    private  $ability;
    private  $description;
    private  $price;
    private  $date_added;
    private $image;

    public static function create(string $name, string $type, int $categoryId, int $rarityId, string $material, string $ability, string $description, float $price, string $dateAdded, string $image): void
    {
        $query = "INSERT INTO equipments (
        `name`, `type`, `category_id`, `rarity_id`, `material`, `ability`, `description`, `price`, `date_added`, `image`
    ) VALUES (
       :name, :type, :category_id, :rarity_id, :material, :ability, :description, :price, :date_added, :image
    )";

        $params = [
            'name' => $name,
            'type' => $type,
            'category_id' => $categoryId,
            'rarity_id' => $rarityId,
            'material' => $material,
            'ability' => $ability,
            'description' => $description,
            'price' => $price,
            'date_added' => $dateAdded,
            'image' => $image,
        ];

        (new Connection())->insertBuilder($query, $params);
    }
    public static function update(int $id, string $name, string $type, int $categoryId, int $rarityId, string $material, string $ability, string $description, float $price, string $dateAdded, string $image): void
    {
        $query = "UPDATE equipments SET 
        `id` = :id,`name` = :name, `type` = :type, `category_id` = :category_id, `rarity_id` = :rarity_id, `material` = :material, `ability` = :ability, `description` = :description, `price` = :price, `date_added`=:date_added, `image` = :image WHERE id = :id";


        $params = [
            'id' => $id,
            'name' => $name,
            'type' => $type,
            'category_id' => $categoryId,
            'rarity_id' => $rarityId,
            'material' => $material,
            'ability' => $ability,
            'description' => $description,
            'price' => $price,
            'date_added' => $dateAdded,
            'image' => $image,
        ];

        (new Connection())->insertBuilder($query, $params);
    }

    public static function delete($id)
    {
        $params = ["id" => $id];

        $query = "DELETE FROM equipments WHERE id = :id";

        (new Connection())->insertBuilder($query, $params);
    }

    /**
     * Retorna el catálogo de equipamientos completo
     * @return array
     */
    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT equipments.*, GROUP_CONCAT(equipment_features.feature_id) AS features_ids FROM equipments LEFT JOIN equipment_features ON equipments.id = equipment_features.equipment_id GROUP BY equipments.id;";

        $tableResult = (new Connection())->selectBuilder($query, self::class, [], true);
        while ($result = $tableResult->fetch()) {
            $allItems[] = self::buildEquipmentClasses($result);
        }

        return $allItems;
    }

    /**
     * Retorna un equipamiento coincidente con el id proporcionado
     * @param int $id ID del producto a buscar
     * @return Equipment
     */
    public static function getById(int $id): ?Equipment
    {

        $query = "SELECT equipments.*, GROUP_CONCAT(equipment_features.feature_id) AS features_ids FROM equipments LEFT JOIN equipment_features ON equipments.id = equipment_features.equipment_id WHERE id = :id GROUP BY equipments.id";
        $params = ['id' => $id];

        $result = (new Connection())->selectBuilder($query, self::class, $params, true);

        $catalogo = self::buildEquipmentClasses($result->fetch());



        return $catalogo ?? null;
    }

    /**
     * Retorna equipamientos coincidentes con la categoría proporcionada
     * @param string $category Categoría a buscar
     * @return Equipment
     */
    public static function getByCategory(string $category): ?Equipment
    {

        $catalogo = self::getAll();

        foreach ($catalogo as $p) {
            if ($p->category == $category) {
                return $p;
            }
        }

        return null;
    }

    /**
     * Función para la Búsqueda por tipo (arma/escudo)
     * @param string $type Tipo a buscar ('arma' o 'escudo')
     * @return array
     */
    public static function getByType(string $type): array
    {
        $resultado = [];

        $query = "SELECT * FROM equipments WHERE type = :type";
        $params = ['type' => $type];

        $resultado = (new Connection())->selectBuilder($query, self::class, $params);
        return $resultado ?? null;
    }



    /**
     * Reduce la descripción a un máximo de caracteres
     *
     * @param int $maxCharacters Cantidad máxima de caracteres permitidos (por defecto 120).
     * @return string Descripción reducida con puntos suspensivos si fue recortada.
     */
    public function reduceDescription($maxCharacters = 80): string
    {
        $text = trim($this->description);

        if (mb_strlen($text) <= $maxCharacters) {
            return $text;
        }

        $trimmedText = mb_substr($text, 0, $maxCharacters);
        $lastSpace = mb_strrpos($trimmedText, ' ');

        if ($lastSpace !== false) {
            $trimmedText = mb_substr($trimmedText, 0, $lastSpace) . "...";
        }

        return $trimmedText;
    }
    private static $createValues = ['id', 'name', 'type', 'material', 'ability', 'description', 'price', 'date_added', 'image'];
    private static function buildEquipmentClasses($equipmentData): Equipment
    {

        $equipment = new self();

        foreach (self::$createValues as $value) {
            $equipment->{$value} = $equipmentData[$value];
        }

        $equipment->category = Categories::getById($equipmentData["category_id"]);
        $equipment->rarity = Rarities::getById($equipmentData["rarity_id"]);
        $featuresIds = !empty($equipmentData['features_ids']) ? explode(",", $equipmentData['features_ids']) : [];

        $featuresEquipments = [];
        foreach ($featuresIds as $featureId) {
            $featuresEquipments[] = Features::getById($featureId);
        }
        $equipment->features = $featuresEquipments;



        return $equipment;
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
     *
     * @return  self
     */
    public function setId($id)
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
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set the value of material
     *
     * @return  self
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get the value of ability
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * Set the value of ability
     *
     * @return  self
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of dateAdded
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set the value of dateAdded
     *
     * @return  self
     */
    public function setDateAdded($dateAdded)
    {
        $this->date_added = $dateAdded;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }



    /**
     * Get the value of features
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * Set the value of features
     */
    public function setFeatures(array $features): self
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get the value of rarity
     */
    public function getRarity(): Rarities
    {
        return $this->rarity;
    }

    /**
     * Set the value of rarity
     */
    public function setRarity(Rarities $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory(): Categories
    {
        return $this->category;
    }

    /**
     * Set the value of category
     */
    public function setCategory(Categories $category): self
    {
        $this->category = $category;

        return $this;
    }
}
