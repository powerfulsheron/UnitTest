<?php
/**
 * Created by PhpStorm.
 * User: OSBKONE
 * Date: 26/04/2019
 * Time: 17:58
 */

namespace swag;


class User
{
    private $email;
    private $nom;
    private $prenom;
    private $age;

    /**
     * User constructor.
     * @param $email
     * @param $nom
     * @param $prenom
     * @param $age
     */
    public function __construct($email, $nom, $prenom, $age)
    {
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)
        && (isset($this->nom) && trim($this->nom)!== '')
        && (isset($this->prenom) && trim($this->prenom)!== '')
        && ($this->age>=13)) {
            return true;
        }else{
            return false;
        }
    }
}