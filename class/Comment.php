<?PHP
class Comment
{
    private $id;

    private $username;

    private $equipment_id;

    private $content;

    private $rating;

    private $createAt;

    private $profile_image;


    /**
     * Crea un nuevo comentario en la base de datos.
     *
     * @param int $equipmentId ID del equipamiento al que pertenece el comentario.
     * @param string $username Nombre de usuario que realiza el comentario.
     * @param string $profileImage Ruta o nombre del archivo de imagen de perfil.
     * @param string $content Contenido del comentario.
     * @param int $rating Puntuación del comentario (1 a 5).
     * @param string $createAt Fecha y hora de creación del comentario.
     * @return void
     */
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

    /**
     * Actualiza un comentario existente.
     *
     * @param int $id ID del comentario a actualizar.
     * @param int $equipmentId ID del equipamiento asociado.
     * @param string $username Nombre de usuario.
     * @param string $profileImage Imagen de perfil.
     * @param string $content Texto del comentario.
     * @param int $rating Valoración (1 a 5).
     * @param string $createAt Fecha y hora de creación.
     * @return void
     */
    public static function update($id, $equipmentId, $username, $profileImage, $content, $rating, $createAt)
    {
        $params = [
            'id' => $id,
            'equipment_id' => $equipmentId,
            'username' => $username,
            'profile_image' => $profileImage,
            'content' => $content,
            'rating' => $rating,
            'created_at' => $createAt
        ];
        $query = "UPDATE comments SET `equipment_id` = :equipment_id, `username` = :username, `profile_image` = :profile_image, `content` = :content, `rating` = :rating, `created_at` = :created_at WHERE id = :id";

        (new Connection())->insertBuilder($query,  $params);
    }

    /**
     * Obtiene un comentario por su ID.
     *
     * @param int $id ID del comentario.
     * @return Comment
     */
    public static function getById($id): Comment
    {
        $query = "SELECT * FROM comments WHERE id = :id";
        $params = ['id' => $id];

        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo[0];
    }
    /**
     * Obtiene todos los comentarios asociados a un equipamiento específico.
     *
     * @param int $equipmentId ID del equipamiento.
     * @return Comment[] Array de comentarios.
     */
    public static function getByEquipmentId($equipmentId): array
    {
        $query = "SELECT * FROM comments WHERE `equipment_id` = :equipment_id";
        $params = ['equipment_id' => $equipmentId];
        $catalogo = (new Connection())->selectBuilder($query, self::class, $params);
        return $catalogo;
    }

    /**
     * Obtiene todos los comentarios de la base de datos.
     *
     * @return Comment[] Array de todos los comentarios.
     */
    public static function getAll(): array
    {
        $allItems = [];
        $query = "SELECT * FROM comments";

        $allItems = (new Connection())->selectBuilder($query, self::class);

        return $allItems;
    }
    /**
     * Elimina un comentario por su ID.
     *
     * @param int $id ID del comentario a eliminar.
     * @return void
     */
    public static function delete($id)
    {
        $params = ["id" => $id];

        $query = "DELETE FROM comments WHERE id = :id";

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

    /**
     * Get the value of equipmentId
     */
    public function getEquipmentId()
    {
        return $this->equipment_id;
    }

    /**
     * Set the value of equipmentId
     */
    public function setEquipmentId($equipmentId): self
    {
        $this->equipment_id = $equipmentId;

        return $this;
    }
}
