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

        public function getDoctorDetails($id) {

            $this -> connect();

            $sql = "SELECT doctors.first_name as doctor_name,
                    doctors.last_name as doctor_surname, 
                    doctors.img_path,
                    FROM doctors
                    WHERE doctors.id = :id;";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            $doctor = $statement->fetch();

            $sql = "SELECT rooms.room_num
                    FROM rooms 
                    INNER JOIN doctors 
                    ON rooms.doc_id = doctors.id
                    WHERE doctors.id = :id;";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            $roomResults = $statement->fetchAll();
            $rooms = array();

            foreach ($roomResults as $roomResult) {
                array_push($rooms, $roomResult['room_num']);
            }
            
            $doctor['rooms'] = $rooms;
            $this->disconnect();
            return $doctor;

        }
    }

?>
