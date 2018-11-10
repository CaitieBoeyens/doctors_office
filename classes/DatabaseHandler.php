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

        public function getDoctors(){
            $this -> connect();

            $sql = "SELECT doctors.first_name as doctor_name,
                    doctors.last_name as doctor_surname, 
                    doctors.img_path, doctors.specialisation, doctors.id 
                    FROM doctors";

            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $doctors = $statement->fetchAll();
            
            /* foreach ($doctors as $doctor){

                $sql = "SELECT rooms.room_num
                    FROM rooms 
                    INNER JOIN doctors 
                    ON rooms.doc_id = doctors.id
                    WHERE doctors.id = $doctor[id]";

                $statement = $this->pdo->prepare($sql);
                $statement->execute();

                $roomResults = $statement->fetchAll();
                
                $rooms = array();
                foreach ($roomResults as $roomResult) {
                    array_push($rooms, $roomResult['room_num']);
                }
                
            } */

            $this->disconnect();
            return $doctors;
        }

        public function getDoctorDetails($id) {

            $this -> connect();

            $sql = "SELECT doctors.first_name as doctor_name,
                    doctors.last_name as doctor_surname, 
                    doctors.img_path, doctors.specialisation, doctors.id
                    FROM doctors
                    WHERE doctors.id = :id;";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            $doctor = $statement->fetch();

            $this->disconnect();
            return $doctor;

        }
        public function getDoctorRooms($id) {
            $this -> connect();
            $sql = "SELECT rooms.room_num, rooms.floor_num, rooms.id
                    FROM rooms 
                    INNER JOIN doctors 
                    ON rooms.doc_id = doctors.id
                    WHERE doctors.id = :id;";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            $rooms = $statement->fetchAll();
            
            $this->disconnect();
            return $rooms;
        }

        public function getPatients(){
            $this -> connect();

            $sql = "SELECT patients.name as patient_name, patients.medical_aid, patients.phone, patients.id
                    FROM patients";

            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $patients = $statement->fetchAll();

            $this->disconnect();
            return $patients;
        }

        public function getPatientDetails($id) {

            $this -> connect();

            $sql = "SELECT patients.name as patient_name, patients.medical_aid, patients.phone, patients.id
                    FROM patients
                    WHERE patients.id = :id;";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            $patient = $statement->fetch();

            $sql = "SELECT appointments.date, appointments.time, doctors.last_name as doctor_surname, rooms.room_num
                    FROM appointments 
                    INNER JOIN rooms 
                    ON rooms.id = appointments.room_id
                    INNER JOIN doctors
                    ON doctors.id = appointments.doc_id
                    WHERE appointments.patient_id = :id";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            $appointmentResults = $statement->fetchAll();
            $appointments = array();

            foreach ($appointmentResults as $appointmentResult) {
                array_push($appointments, $appointmentResult['date']);
                array_push($appointments, $appointmentResult['time']);
                array_push($appointments, $appointmentResult['doctor_surname']);
                array_push($appointments, $appointmentResult['room_num']);

            }
            
            $patient['appointments'] = $appointments;

            $this->disconnect();
            return $patient;

        }

        public function getAppointments(){
            $this -> connect();

            $sql = "SELECT appointments.date, appointments.time, doctors.last_name as doctor_surname, rooms.room_num, patients.name as patient_name
                    FROM appointments 
                    INNER JOIN rooms 
                    ON rooms.id = appointments.room_id
                    INNER JOIN doctors
                    ON doctors.id = appointments.doc_id
                    INNER JOIN patients
                    ON patients.id = appointments.patient_id";

            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            
            $appointments = $statement->fetchAll();

            $this-> disconnect();
            return $appointments;
        }

        public function getDoctorAppointments($id){
            $this -> connect();

            $sql = "SELECT appointments.date, appointments.time, doctors.last_name as doctor_surname, rooms.room_num, patients.name as patient_name
                    FROM appointments 
                    INNER JOIN rooms 
                    ON rooms.id = appointments.room_id
                    INNER JOIN doctors
                    ON doctors.id = appointments.doc_id
                    INNER JOIN patients
                    ON patients.id = appointments.patient_id
                    WHERE appointments.doc_id = :id ";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            $appointments = $statement->fetchAll();

            $this-> disconnect();
            return $appointments;
        }

        public function getDoctorAppointmentsDates($name, $date){
            $this -> connect();

            $sql = "SELECT id as doctor_id from doctors where doctors.last_name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $name);
            $statement->execute();

            $doctor = $statement->fetch();

            $sql = "SELECT appointments.date, appointments.time
                    FROM appointments 
                    WHERE appointments.doc_id = :id AND   appointments.date = :date";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $doctor['doctor_id']);
            $statement->bindValue(":date", $date);
            $statement->execute();

            $appointments = $statement->fetchAll();

            $this-> disconnect();
            return $appointments;
        }

        public function getPatientAppointments($id){
            $this -> connect();

            $sql = "SELECT appointments.date, appointments.time, doctors.last_name as doctor_surname, rooms.room_num, patients.name as patient_name
                    FROM appointments 
                    INNER JOIN rooms 
                    ON rooms.id = appointments.room_id
                    INNER JOIN doctors
                    ON doctors.id = appointments.doc_id
                    INNER JOIN patients
                    ON patients.id = appointments.patient_id
                    WHERE appointments.patient_id = :id ";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            $appointments = $statement->fetchAll();

            $this-> disconnect();
            return $appointments;
        }

        public function getRoomsList(){
            $this -> connect();

            $sql = "SELECT rooms.room_num, rooms.floor_num, rooms.id 
                    FROM rooms";

            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $rooms = $statement->fetchAll();

            $this->disconnect();
            return $rooms;
        }

        public function getRoomsByDoc($name){
            $this -> connect();

            $sql = "SELECT rooms.room_num, rooms.floor_num, rooms.id
                    FROM rooms 
                    INNER JOIN doctors 
                    ON rooms.doc_id = doctors.id
                    WHERE doctors.last_name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $name);
            $statement->execute();

            $rooms = $statement->fetchAll();

            $this->disconnect();
            return $rooms;
        }

        public function getDocbyRoom($id){
            $this -> connect();

            $sql = "SELECT rooms.id, doctors.last_name
                    FROM rooms 
                    INNER JOIN doctors
                    ON rooms.doc_id = doctors.id
                    WHERE rooms.id = :id";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
            $doctor = $statement->fetch();

            $this->disconnect();
            return $doctor;
        }

        public function postAppointment($appointment) {
            $this->connect();

            $sql = "SELECT id as patient_id from patients where patients.name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $appointment['patient_name']);
            $statement->execute();

            $patient = $statement->fetch();

            $sql = "SELECT id as doctor_id from doctors where doctors.last_name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $appointment['doctor_surname']);
            $statement->execute();

            $doctor = $statement->fetch();


            $sql = "INSERT INTO appointments(patient_id, doc_id, room_id, date, time)
                    VALUES (:patient_id, :doctor_id, :room_id, :date, :time);";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":patient_id", intval($patient['patient_id']));
            $statement->bindValue(":doctor_id", intval($doctor['doctor_id']));
            $statement->bindValue(":room_id", intval($appointment['room_id']));
            $statement->bindValue(":date", $appointment['date']);
            $statement->bindValue(":time", $appointment['time']);
            $statement->execute();
            $this->disconnect();
            return true;
        }

        public function assignRoom($change){
            $this->connect();

            $sql = "SELECT id as doctor_id from doctors where doctors.last_name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $change['doctor_surname']);
            $statement->execute();

            $doctor = $statement->fetch();

            $sql = "UPDATE rooms SET doc_id = :doc_id WHERE id = :id";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", intval($change['room_id']));
            $statement->bindValue(":doc_id", intval($doctor['doctor_id']));
            $statement->execute();
            $this->disconnect();
            return true;
            
        }

         public function editPassword($id, $password) {
            $this->connect();

            $sql = "UPDATE `users` SET `password`= :password WHERE id = :id";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->bindValue(":password", $password);
            $statement->execute();
            $this->disconnect();
            return true;
        }

        public function findClash($appointment){
            $this->connect();

            $sql = "SELECT id as doctor_id from doctors where doctors.last_name = :name";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $appointment['doctor_surname']);
            $statement->execute();

            $doctor = $statement->fetch();

            $sql = "SELECT COUNT(id) as i FROM appointments WHERE appointments.doc_id = :doc_id AND appointments.date = :date AND appointments.time = :time";

            
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":doc_id", intval($doctor['doctor_id']));
            $statement->bindValue(":date", $appointment['date']);
            $statement->bindValue(":time", $appointment['time']);
            $statement->execute();

            $result = $statement->fetch();

            $this-> disconnect();
            return $result['i'];
        }

        public function postPatient($patient) {
            $this->connect();

            $sql = "INSERT INTO patients(name, medical_aid, phone)
                    VALUES (:name, :medical_aid, :phone);";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":name", $patient['patient_name']);
            $statement->bindValue(":medical_aid", $patient['medical_aid']);
            $statement->bindValue(":phone", $patient['phone']);
            $statement->execute();
            $this->disconnect();
            return true;
        }

        public function findDoctor($name) {
            $this->connect();

            $sql = "SELECT COUNT(id) as i FROM doctors WHERE doctors.last_name = :name ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(":name" , $name);
            $statement->execute();

            $result = $statement->fetch();

            $this-> disconnect();
            return $result['i'];
        }

        public function findPatient($name) {
            $this->connect();

            $sql = "SELECT COUNT(id) as i FROM patients WHERE patients.name = :name ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(":name" , $name);
            $statement->execute();

            $result = $statement->fetch();

            $this-> disconnect();
            return $result['i'];
        }
        public function findMedicalAid($number) {
            $this->connect();

            $sql = "SELECT COUNT(id) as i FROM patients WHERE patients.medical_aid = :number ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(":number" , $number);
            $statement->execute();

            $result = $statement->fetch();

            $this-> disconnect();
            return $result['i'];
        }

        public function findUser($email) {
            $this->connect();

            $sql = "SELECT COUNT(id) as i FROM users WHERE users.email = :email ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(":email" , $email);
            $statement->execute();

            $result = $statement->fetch();

            $this-> disconnect();
            return $result['i'];
        }

        public function getUser($email){
            $this->connect();

            $sql = "SELECT * FROM users WHERE users.email = :email ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(":email" , $email);
            $statement->execute();

            $user = $statement->fetch();

            $this-> disconnect();
            return $user;
        }

        public function searchPatients($number) {
            $this->connect();

            $sql = "SELECT * FROM patients WHERE patients.medical_aid LIKE :number ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(':number', $number);
            $statement->execute();

            $patients = $statement->fetchAll();

            $this-> disconnect();
            return $patients;

        }
        public function searchPatientsName($name) {
            $this->connect();

            $sql = "SELECT * FROM patients WHERE patients.name LIKE :name ";

            $statement = $this->pdo->prepare($sql);
            $statement -> bindValue(':name', $name);
            $statement->execute();

            $patients = $statement->fetchAll();

            $this-> disconnect();
            return $patients;

        }
    }

?>
