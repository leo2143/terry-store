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
}
