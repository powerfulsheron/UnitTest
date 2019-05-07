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
    public $DB_USER = "froger";
    public $DB_PASSWD = "R277306R";
    public $DB_DBNAME = "myDB";


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