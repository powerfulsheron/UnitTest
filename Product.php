<?php
/**
 * Created by PhpStorm.
 * User: OSBKONE
 * Date: 26/04/2019
 * Time: 17:58
 */

namespace swag;


class Product
{
    private $nom;
    private $owner;

    /**
     * Product constructor.
     * @param $nom
     * @param $owner
     */
    public function __construct($nom, $owner)
    {
        $this->nom = $nom;
        $this->owner = $owner;
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
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        if ((isset($this->nom) && trim($this->nom)!== '')
        && (isset($this->owner) && $this->isValid())) {
            return true;
        }else{
            return false;
        }
    }
}