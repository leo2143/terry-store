<?PHP
class Comment
{
    private $id;

    private $username;

    private $content;

    private $rating;

    private $createAt;

    private $profile_image;


    public static function create($equipmentId, $username, $profileImage, $content, $rating, $createAt): void
    {
        $query = "INSERT INTO comments (`equipment_id`, `username`, `profile_image`, `content`, `rating`, `created_at`) 
              VALUES (:equipment_id, :username, :profile_image, :content, :rating, :created_at)";

        $params = [
            'equipment_id' => $equipmentId,
            'username' => $username,
            'profile_image' => $profileImage,
            'content' => $content,
            'rating' => $rating,
            'created_at' => $createAt
        ];

        (new Connection())->insertBuilder($query, $params);
    }


    public static function update($id, $name)
    {
        $query = "INSERT INTO comments (`name`) VALUES (:name)";
        $params = ['id' => $id, 'name' => $name];

        (new Connection())->selectBuilder($query, self::class, $params);
    }

    public static function getById($id): Comment
    {
        $query = "SELECT * FROM comments WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }


    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM comments";

        $allItems = (new Connection())->selectBuilder($query, self::class);

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
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setUserName($username)
    {
        $this->username = $username;

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
     * Get the value of createAt
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     *
     * @return  self
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

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
