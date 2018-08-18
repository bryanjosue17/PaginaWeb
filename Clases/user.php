<?php
session_start();


class user
{
    public $login;
    public $rol;


    /**
     * @return mixed
     */

    public function __construct()
    {
        if (isset($_SESSION['use'])) {
            $this->login = $_SESSION['use'];
            $this->rol = $_SESSION['rol'];
        }
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */



   }