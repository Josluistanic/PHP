<?php

include_once 'db.php';

class User extends DB
{
    private $name;
    private $username;


    public function userExist($user, $password)
    {
        $md5pass = md5($password);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->name = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getName()
    {
        return $this->name;
    }
}
