<?php
class User
{
    private $id;
    private $email;
    private $username;
    private $full_name;
    private $password;
    private $role;



    public static function getByUsername($username): mixed
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $params = ['username' => $username];

        $user = (new Connection())->selectBuilder($query, self::class, $params);

        return $user[0] ?? null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }
}
