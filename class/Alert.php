<?PHP

class Alert
{

    public static function add_alert(string $type, string $message)
    {

        $_SESSION["alerts"][] = [
            "type" => $type,
            "message" => $message
        ];
    }

    public static function clear_alert()
    {

        $_SESSION["alerts"] = [];
    }
    /**
     * Devuelve todas las alertas acumuladas en el sistema, y vacía la lista
     * @return string|null
     */
    public static function get_alerts()
    {
        if (!empty($_SESSION['alerts'])) {
            $alertasActuales = "";
            foreach ($_SESSION['alerts'] as $alert) {
                $alertasActuales .= self::print_alerta($alert);
            }
            self::clear_alert();
            return $alertasActuales;
        } else {
            return null;
        }
    }

    private static function print_alerta($alert): string
    {
        $html = "<div class='alert alert-{$alert['type']} alert-dismissible fade show' role='alert'>";
        $html .= $alert['message'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";

        return $html;
    }
}
