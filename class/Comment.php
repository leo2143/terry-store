<?PHP
class Comment
{
    private $id;

    private $name;

    private $imgAvatar;

    private $description;

    private $startsCount;

    private $admissionDate;

    /**
     * Retorna el catálogo de equipamientos completo
     * @return array
     */
    public static function getAll(): array
    {
        $allItems = [];

        $JSON = file_get_contents('data/comment.json');

        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {

            $equipment = new self();
            $equipment->setId($value->id);
            $equipment->setName($value->name);
            $equipment->setDescription($value->description);
            $equipment->setImgAvatar($value->imgAvatar);
            $equipment->setStartsCount($value->startsCount);
            $equipment->setAdmissionDate($value->admissionDate);


            $allItems[] = $equipment;
        }

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
     * Get the value of imgAvatar
     */
    public function getImgAvatar()
    {
        return $this->imgAvatar;
    }

    /**
     * Set the value of imgAvatar
     *
     * @return  self
     */
    public function setImgAvatar($imgAvatar)
    {
        $this->imgAvatar = $imgAvatar;

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
     * Get the value of startsCount
     */
    public function getStartsCount()
    {
        return $this->startsCount;
    }

    /**
     * Set the value of startsCount
     *
     * @return  self
     */
    public function setStartsCount($startsCount)
    {
        $this->startsCount = $startsCount;

        return $this;
    }

    /**
     * Get the value of admissionDate
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * Set the value of admissionDate
     *
     * @return  self
     */
    public function setAdmissionDate($admissionDate)
    {
        $this->admissionDate = $admissionDate;

        return $this;
    }
}
