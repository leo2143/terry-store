<?PHP
class View{
    private $name;

    private $title;

        /**
     * Valida el identificador de una vista y devuelve un objeto con los datos de la misma
     * @param ?string $vista El identificador de la vista, o null
     *
     * @return View devuelve objeto Vista
     */
    public static function view_validation(?string $viewName)
    {

        //OBTENEMOS TODOS LOS DATOS DE NUESTRO JSON
        $JSON = file_get_contents('data/views.json');
        $viewInfo = json_decode($JSON);

        //RECORREMOS EL JSON
        foreach ($viewInfo as $vista) {
            //SI SE ECUENTRA UNA VISTA QUE COORDINE CON LA SOLICITADA
            if ($vista->name == $viewName) {

                //CHECKEAMOS QUE ESTÉ ACTIVA
                if ($vista->active) {

                    //CHECKEAMOS QUE NO SEA RESTRINGIDA
                    if ($vista->restricted) {
                        //SI ES RESTRINGIDA, DEVOLVEMOS DATOS 403
                        $vistaNoDisp = new self();

                        $vistaNoDisp->name = '403';
                        $vistaNoDisp->title = 'Página Restringida';

                        return $vistaNoDisp;
                    } else {
                        //DEVOLVEMOS LOS DATOS DE LA VISTA
                        $objVista = new self();

                        $objVista->name = $vista->name;
                        $objVista->title = $vista->title;

                        return $objVista;
                    }
                } else {
                    //DEVOLVEMOS LOS DATOS DE PÁGINA NO DISPONIBLE
                    $vistaNoDisp = new self();

                    $vistaNoDisp->name = 'no_disponible';
                    $vistaNoDisp->title = 'Página no disponible por el mometo';


                    return $vistaNoDisp;
                }
            }
        }

        //SI NO SE ENCUENTRA, DEVOLVEMOS DATOS DE 404
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
}