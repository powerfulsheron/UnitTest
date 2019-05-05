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

    private $emailSender;
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

        $this->emailSender = new PHPMailer(true);
        $this->connection = new PDO("mysql:host=localhost;dbname=myDB", "admin", "root");
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

    /**
     * @return PHPMailer
     */
    public function getEmailSender(): PHPMailer
    {
        return $this->emailSender;
    }

    /**
     * @param PHPMailer $emailSender
     */
    public function setEmailSender(PHPMailer $emailSender): void
    {
        $this->emailSender = $emailSender;
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * @param PDO $connection
     */
    public function setConnection(PDO $connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!($this->getProduit()->isValid() &&
            $this->getProduit()->getOwner()->isValid() &&
            $this->getDateDebut() > new DateTime() &&
            $this->getDateFin() > $this->getDateDebut())) {
            return false;
        }
        if ($this->getReceiver()->getAge() < 18) {
            $this->emailSender->setFrom("lorenzo.canavaggio@laposte.net");
            $this->emailSender->addAddress($this->receiver->getEmail());
            $this->emailSender->Subject = 'Your order';
            $this->emailSender->Body = "Wesh le gang wesh c'est kois les bails";
            $this->emailSender->addAddress('ellen@example.com');
            $this->emailSender->send();
        }
        try {
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO exchange (productName, receiverMail, dateDebut, dateFin)
            VALUES ($this->produit()->getNom(), $this->receiver->getEmail(), $this->dateDebut, $this->dateFin)";
            $this->connection->exec($sql);
            return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}