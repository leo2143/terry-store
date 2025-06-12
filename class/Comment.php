<?PHP
class Comment
{
    private $id;

    private $name;

    private $content;

    private $rating;

    private $admissionDate;

    private $profile_image;


    public static function create($name): Comment
    {

        $allItems = [];
        $query = "INSERT INTO comments (`name`) VALUES (:name)";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems[0];
    }

    public static function update(): Comment
    {
        $allItems = [];
        $query = "INSERT INTO comments (`name`) VALUES (:name)";

        $allItems = (new Connection())->consultBuilder($query, self::class);

        return $allItems[0];
    }

    public static function getById($id): Comment
    {
        $query = "SELECT * FROM comments WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->consultBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM comments";

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
     * Get the value of description
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of startsCount
     *
     * @return  self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

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

    /**
     * Get the value of admissionDate
     */
    public function getProfileImage()
    {
        return $this->profile_image;
    }

    /**
     * Set the value of admissionDate
     *
     * @return  self
     */
    public function setProfileImage($profileImage)
    {
        $this->profile_image = $profileImage;

        return $this;
    }
}
