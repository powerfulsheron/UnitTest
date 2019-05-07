<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require __DIR__ . "/../src/User.php";
require __DIR__ . "/../src/Product.php";
require __DIR__ . "/../src/Exchange.php";

final class ExchangeTest extends TestCase
{
    public $product;
    public $user;
    public $exchange;
    public $receiver;
    public $floatValidValue = 15.5;
    public $boolValue = true;
    public $arrayValue = ["lorenzo"];
    public $validAge = 15;
    public $nullValue = null;
    public $emptyValue = "";
    public $validName = "canavaggio";
    public $validSurame = "lorenzo";

    static private $pdo = null;
    private $conn = null;

    public $DB_DSN = "mysql:host=localhost;dbname=myDB";
    public $DB_USER = "admin";
    public $DB_PASSWD = "root";
    public $DB_DBNAME = "myDB";

    // CONNECTION

    public function testIsSaveEmptyExchangeReceiver()
    {
        $this->exchange->setReceiver($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeReceiver()
    {
        $this->exchange->setReceiver($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeReceiver()
    {
        $this->exchange->setReceiver($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeReceiver()
    {
        $this->exchange->setReceiver($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeReceiver()
    {
        $this->exchange->setReceiver($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeReceiver()
    {
        $this->exchange->setReceiver($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeReceiver()
    {
        $this->exchange->setReceiver($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveWrongObjectExchangeReceiver()
    {
        $this->exchange->setReceiver($this->product);
        $this->assertFalse($this->exchange->save());
    }
    // PRODUIT

    public function testIsSaveEmptyExchangeProduit()
    {
        $this->exchange->setProduit($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeProduit()
    {
        $this->exchange->setProduit($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeProduit()
    {
        $this->exchange->setProduit($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeProduit()
    {
        $this->exchange->setProduit($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeProduit()
    {
        $this->exchange->setProduit($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeProduit()
    {
        $this->exchange->setProduit($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeProduit()
    {
        $this->exchange->setProduit($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveWrongObjectExchangeProduit()
    {
        $this->exchange->setProduit($this->user);
        $this->assertFalse($this->exchange->save());
    }

    // OWNER

    public function testIsSaveEmptyExchangeOwner()
    {
        $this->exchange->setOwner($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeOwner()
    {
        $this->exchange->setOwner($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeOwner()
    {
        $this->exchange->setOwner($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeOwner()
    {
        $this->exchange->setOwner($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeOwner()
    {
        $this->exchange->setOwner($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeOwner()
    {
        $this->exchange->setOwner($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeOwner()
    {
        $this->exchange->setOwner($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveWrongObjectExchangeOwner()
    {
        $this->exchange->setOwner($this->product);
        $this->assertFalse($this->exchange->save());
    }

    // DATEDEBUT

    public function testIsSaveEmptyExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveObjectExchangeDateDebut()
    {
        $this->exchange->setDateDebut($this->product);
        $this->assertFalse($this->exchange->save());
    }

    // DATEFIN

    public function testIsSaveEmptyExchangeDateFin()
    {
        $this->exchange->setDateFin($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeDateFin()
    {
        $this->exchange->setDateFin($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeDateFin()
    {
        $this->exchange->setDateFin($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeDateFin()
    {
        $this->exchange->setDateFin($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeDateFin()
    {
        $this->exchange->setDateFin($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeDateFin()
    {
        $this->exchange->setDateFin($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeDateFin()
    {
        $this->exchange->setDateFin($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveObjectExchangeDateFin()
    {
        $this->exchange->setDateFin($this->product);
        $this->assertFalse($this->exchange->save());
    }

    //  EMAILSENDER

    public function testIsSaveEmptyExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveWrongObjectExchangeEmailSender()
    {
        $this->exchange->setEmailSender($this->product);
        $this->assertFalse($this->exchange->save());
    }

    // CONNECTION

    public function testIsSaveEmptyExchangeConnection()
    {
        $this->exchange->setConnection($this->emptyValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveNullExchangeConnection()
    {
        $this->exchange->setConnection($this->nullValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveIntegerExchangeConnection()
    {
        $this->exchange->setConnection($this->validAge);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveFloatExchangeConnection()
    {
        $this->exchange->setConnection($this->floatValidValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveArrayExchangeConnection()
    {
        $this->exchange->setConnection($this->arrayValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveBoolExchangeConnection()
    {
        $this->exchange->setConnection($this->boolValue);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveStringExchangeConnection()
    {
        $this->exchange->setConnection($this->validName);
        $this->assertFalse($this->exchange->save());
    }

    public function testIsSaveWrongObjectExchangeConnection()
    {
        $this->exchange->setConnection($this->product);
        $this->assertFalse($this->exchange->save());
    }

    // SET UP

    protected  function setUp(): void
    {

        $this->user = $this->createMock(User::class);
        $this->user->expects()->method('isValid')->willReturn(true);

        $this->receiver = $this->createMock(User::class);
        $this->receiver->setAge(21);
        $this->receiver->expects()->method('isValid')->willReturn(true);

        $this->product = $this->createMock(Product::class);
        $this->product->setOwner($this->user);
        $this->product->expects()->method('isValid')->willReturn(true);

        $this->exchange = new Exchange();
        $this->exchange
            ->setProduct($this->product)
            ->setReceiver($this->receiver)
            ->setDateDebut((new DateTime())->modify('+1 week'))
            ->setDateFin((new \DateTime())->modify('+3 week'));

        // PHPmailer send() return true when email sent.
        $this->exchange->getEmailSender()->expects()->method('sendMail')->willReturn(true);

        // PDO return 1 on one insert
        $this->exchange->getConnection()->expects()->method('exec')->willReturn(1);

    }

    // EXCHANGE

    public function testSave()
    {
        $this->assertTrue($this->exchange->save());
    }

    public function testInvalidSave()
    {
        $this->exchange->dateFin = new DateTime();
        $this->user->expects()->method('isValid')->willReturn(false);
        $this->receiver->expects()->method('isValid')->willReturn(false);
        $this->product->expects()->method('isValid')->willReturn(false);
        $this->assertFalse($this->exchange->save());
    }

    public function testExchangeIsDatesValid()
    {
        $this->assertGreaterThan($this->getExchange()->getDateDebut(), $this->getExchange()->getDateFin());
    }

    // EXCHANGE MAIL

    public function testExchangeMailIsPHPMailerInstance()
    {
        $this->assertInstanceOf(\PHPMailer\PHPMailer\PHPMailer::class, $this->exchange->getEmailSender());
    }


    // EXCHANGE DB

    public function testDbConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWD);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $this->DB_DBNAME);
        }

        return $this->conn;
    }

    public function testExchangeConnectionIsPDOInstance()
    {
        $this->assertInstanceOf( PDO::class,  $this->exchange->getConnection());
    }



    // Reste à tester :
    // Le save ne se fait pas si un des attributs est non reseigné ou de mauvais type (pour chaque)
    // Le receiver mineur
    // La Connection

}