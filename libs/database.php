<?php
class Database 
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    var $err;

    public function __construct(){
        //require_once 'report_log.php';
        //$this->err     = new report_log;
        $this->host    = constant('HOST');
        $this->db      = constant('DB');
        $this->user    = constant('USER');
        $this->pass    = constant('PASSWORD_DB');
        $this->charset = constant('CHARSET');
    }
    public function createDB(){
    try {
        $conn = new PDO("mysql:host={$this->host}", $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE {$this->db}";
        $conn->exec($sql);
        echo "Database created successfully\n";
        $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($connection, $this->user, $this->pass, $options);
        $table = "CREATE TABLE productos (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(255) NOT NULL,
            categoria VARCHAR(255) NOT NULL,
            imagen VARCHAR(255),
            link VARCHAR(255),
            afiliado VARCHAR(255),
            asin VARCHAR(255),
            precio VARCHAR(255)
            )";
        $pdo->exec($table);
        echo "Table created successfully \n";
        }catch(PDOException $e) {
            $this->err->reportLog("FILE: ".__FILE__."\n"."Error: " . $e->getMessage() . " Function createDB\n");
        }
    }
      
    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->pass, $options);
            return $pdo;
        }catch(PDOException $e){
            try{
                $this->createDB();
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($connection, $this->user, $this->pass, $options);
                return $pdo;
            }catch(PDOException $e){
                $this->err->reportLog("FILE: ".__FILE__."\n"."Error: " . $e->getMessage() . " Function Connect\n");
                return $e->getMessage();
            }
        }
    }
}
# Con esto ya comprueba si existe una base de datos. Si no es así, la crea y crea la tabla productos.
//require_once '../config/config.php';
//require_once 'report_log.php';
//$db = new Database;
//$db->connect();

?>