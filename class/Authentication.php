<?php
class Authentication
{
    /**
     * Inicia sesión de un usuario verificando sus credenciales.
     *
     * @param string $username Nombre de usuario ingresado por el usuario.
     * @param string $password Contraseña ingresada por el usuario.
     *
     * @return string|null|false Devuelve el rol del usuario si las credenciales son correctas.
     *                            Devuelve false si la contraseña es incorrecta.
     *                            Devuelve null si no se encontró al usuario.
     */
    public static function log_in(string $username, string $password): mixed
    {
        $user = User::getByUsername($username);
        if ($user) {
            if (password_verify($password, $user->getPassword())) {

                $loginData['user_id'] = $user->getId();
                $loginData['username'] = $user->getUsername();
                $loginData['full_name'] = $user->getFullName();
                $loginData['role'] = $user->getRole();
                $_SESSION['loggedIn'] = $loginData;

                return $loginData['role'];
            } else {
                Alert::add_alert("danger", "la contraseña ingresada no es correcta");
                return FALSE;
            }
        } else {
            Alert::add_alert("warning", "No se encontro la cuenta en nuestra base de datos");

            return null;
        }
    }
    /**
     * Cierra la sesión del usuario actual eliminando los datos de sesión.
     *
     * @return void
     */

    public static function log_out()
    {
        if (isset($_SESSION["loggedIn"])) {
            unset($_SESSION["loggedIn"]);
        }
    }

    /**
     * Verifica si el usuario tiene permiso para acceder a una sección según su nivel de acceso.
     *
     * @param int $level Nivel requerido (por defecto es 0 = sin verificación).
     *                   - 0: sin restricciones.
     *                   - >1: requiere rol "admin" o "superAdmin".
     *
     * @return bool Devuelve true si tiene permisos suficientes.
     *              Redirige al login y devuelve false si no tiene permisos.
     */
    public static function verify($level = 0): bool
    {
        if (!$level) {
            return true;
        }
        if (isset($_SESSION["loggedIn"])) {

            if ($level > 1) {
                if (
                    $_SESSION["loggedIn"]['role'] == "admin"
                    || $_SESSION["loggedIn"]['role'] == "superAdmin"
                ) {
                    return true;
                } else {
                    header("Location: /terry-store/admin/index.php?page=login");
                    return false;
                }
            } else {
                return true;
            }
        } else {
            header("Location: /terry-store/admin/index.php?page=login");
            return false;
        }
    }
    /**
     * Verifica si el usuario tiene el rol de administrador.
     *
     * @return bool Devuelve true si el usuario tiene el rol de administrador.
     */
    public static function isAdmin(): bool
    {
        if (isset($_SESSION["loggedIn"])) {
            return $_SESSION["loggedIn"]['role'] == "admin"
                || $_SESSION["loggedIn"]['role'] == "superAdmin";
        }
        return false;
    }
}
