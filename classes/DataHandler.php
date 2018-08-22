 <?php
 
    class DatabaseHandler {

        public $driver;
        public $host;
        public $dbname;
        public $username;
        public $password;
        public $dsn;

        public $pdo;

        public function __construct($driver, $host, $dbname, $username, $password) {
            $this->driver = $driver;
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
            $this->dsn = "$this->driver:dbname=$this->dbname;host=$this->host;charset=utf8";
        }

        public function connect() {
            try {
                $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            } catch (PDOException $exception) {
                echo 'Database Error: ' . $exception->getMessage();
            }
        }

        public function disconnect() {
            $this->pdo = null;
        }
    }

?>
