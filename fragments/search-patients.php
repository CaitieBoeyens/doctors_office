<?php require_once __DIR__.'/../fragments/setup.php'; ?>
<?php
        if(isset($_GET['term'])){
            $patients_arr = $db -> searchPatients('%'.$_GET['term'].'%');
            echo json_encode($patients_arr);
        }

?>   