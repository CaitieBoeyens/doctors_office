<?php require_once __DIR__.'/../fragments/setup.php'; ?>
<?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $doctor = $db -> getDoctorDetails($id);
            $rooms = $doctor['rooms'];
            echo json_encode($rooms);
        }

?>   
