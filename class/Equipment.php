<?php

require_once 'class/Connection.php';
class Equipment
{
    private  $id;
    private  $name;
    private  $type;
    private  $category;
    private  $rarity;
    private  $material;
    private  $ability;
    private  $description;
    private  $price;
    private  $dateAdded;
    private $image;



    /**
     * Retorna el catálogo de equipamientos completo
     * @return array
     */
    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM equipments";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems;
    }

    /**
     * Retorna un equipamiento coincidente con el id proporcionado
     * @param int $id ID del producto a buscar
     * @return Equipment
     */
    public static function getById(int $id): ?Equipment
    {

        $query = "SELECT * FROM equipments WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->consultBuilder($query, self::class, $params);
        return $catalogo[0] ?? null;
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

        $resultado = (new Connection())->consultBuilder($query, self::class, $params);
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
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of rarity
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set the value of rarity
     *
     * @return  self
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

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
        return $this->dateAdded;
    }

    /**
     * Set the value of dateAdded
     *
     * @return  self
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

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
}
