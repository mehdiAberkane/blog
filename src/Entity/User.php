<?php

namespace Blog\Entity;

use Blog\Bdd\TableUser;

/**
 * Class User
 * @package Blog\Entity
 */
class User extends TableUser
{
    private $id;

    private $pseudo;

    private $password;

    private $salt;

    private $active;

    protected $tableName;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "user";
        $this->active = true;
        $this->salt = uniqid(mt_rand(), true);
    }

    public function login()
    {
        $user = $this->getOne("pseudo", $this->pseudo);

        if ($user instanceof User) {
            die('cha marche');
        }

        return false;
    }

    /**
     * @param String $password
     * @return string
     */
    protected function encryptePassword($password)
    {
        return hash('ripemd160', md5($this->salt.$password));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }


}