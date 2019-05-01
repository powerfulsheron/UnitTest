<?php
/**
 * Created by PhpStorm.
 * User: OSBKONE
 * Date: 26/04/2019
 * Time: 17:58
 */

use PHPMailer\PHPMailer\PHPMailer;

class Exchange
{
    private $receiver;
    private $produit;
    private $owner;
    private $dateDebut;
    private $dateFin;

    private $mail;
    private $connection;

    /**
     * Exchange constructor.
     * @param $receiver
     * @param $produit
     * @param $owner
     * @param $dateDebut
     * @param $dateFin
     */
    public function __construct($receiver, $produit, $owner, $dateDebut, $dateFin)
    {
        $this->receiver = $receiver;
        $this->produit = $produit;
        $this->owner = $owner;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver): void
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit): void
    {
        $this->produit = $produit;
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
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    // SET UP

    protected  function setUp(): void
    {
        $this->mail = new PHPMailer(true);
        $this->connection = new PDO("mysql:host=localhost;dbname=myDB", "admin", "root");
    }

}