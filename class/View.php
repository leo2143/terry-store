<?PHP

class View
{
    private $id;
    private $name;
    private $title;
    private $active;
    private $restricted;


    /**
     * Valida el identificador de una vista y devuelve un objeto con los datos de la misma
     * @param ?string $vista El identificador de la vista, o null
     *
     * @return View devuelve objeto Vista
     */
    public static function view_validation(?string $viewName)
    {

        $query = "SELECT * FROM views WHERE name = :name";
        $params = ['name' => $viewName];


        $viewInfo = (new Connection())->selectBuilder($query, self::class, $params)[0] ?? null;

        if ($viewInfo != null) {

            if ($viewInfo->getActive()) {
                return $viewInfo;
            } else {
                $vistaNoDisp = new self();

                $vistaNoDisp->name = 'no_disponible';
                $vistaNoDisp->title = 'Página no disponible por el momento';

                return $vistaNoDisp;
            }
        }

        $vista404 = new self();

        $vista404->name = "404";
        $vista404->title = "Página no Econtrada";


        return $vista404;
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     */
    public function setActive($active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of restricted
     */
    public function getRestricted()
    {
        return $this->restricted;
    }

    /**
     * Set the value of restricted
     */
    public function setRestricted($restricted): self
    {
        $this->restricted = $restricted;

        return $this;
    }
}
