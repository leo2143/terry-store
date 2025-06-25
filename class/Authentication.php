<?php
class Authentication
{

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
                return FALSE;
            }
        } else {
            return null;
        }
    }

    public static function log_out()
    {
        if (isset($_SESSION["loggedIn"])) {
            unset($_SESSION["loggedIn"]);
        }
    }

    public static function verify($level = 0): bool
    {

        if (!$level) {
            return true;
        } else {

            if (isset($_SESSION["loggedIn"])) {

                if (
                    $_SESSION["loggedIn"]['role'] == "admin"
                    or
                    $_SESSION["loggedIn"]['role'] == "superAdmin"
                ) {
                    return true;
                } else {
                    header("Location: ../index.php?page=login");
                    return false;
                }
            }
            header("Location: ../index.php?page=login");
            return false;
        }
    }
}
