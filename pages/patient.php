 
 <?php session_start() ?>
 <?php require_once __DIR__.'/../fragments/setup.php'; ?>

 <?php
    if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/patients.css" />
        <title>Patient</title>         
        <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
        <script src="../external/__jquery.tablesorter/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <?php include __DIR__.'/../fragments/appointment-form.php'; ?>
        
        
        <?php 
            $id = $_GET['id'];
            $patient = $db -> getPatientDetails($id);
            $name = $patient['patient_name'];
            $medical_aid = $patient['medical_aid'];
            $phone = $patient['phone'];
        ?>

        <div class="container main-con">
            <div class="columns is-centered">
                <div class="column is-one-third">
                    <div class="box details is-blue has-text-centered has-text-light">
                        
                        <h2 class="title has-text-light"><?= $name ?></h2>
                        <p> <strong class="has-text-light">Medical aid number: </strong><?= $medical_aid ?></p>
                        <p> <strong class="has-text-light">Phone number:</strong> <?= $phone ?></p>
                    
                        
                    </div>

                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-two-thirds">
                    <div class="box is-orange">
                        <h1 class="has-text-light">All appointments</h1>
                        <div class="box is-orange is-shadowless">
                            <div class="box all-appointments-block">
                                <table class="table is-hoverable is-fullwidth" id="appointments">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Doctor</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $appointments = $db->getPatientAppointments($id);
                                        foreach($appointments as $appointment){
                                            $appointment_id = $appointment['id'];
                                            $doctor = $appointment['doctor_surname'];
                                            $room = $appointment['room_num'];
                                            $date = $appointment['date'];
                                            $time = $appointment['time'];
                                    ?>
                                        <tr>
                                            <td><?= $date ?></td>
                                            <td><?= $time ?></td>
                                            <td>Dr <?= $doctor ?></td>
                                            <td><?= $room ?></td>
                                        </tr>
                                        
                                    <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="columns">
                        <div class="column is-one-fifth is-offset-one-fifth">
                            <a onclick="modalToggle('appointment')">
                                <figure class="has-text-centered">
                                    <p class="image plus">
                                        <img src="../assets/plus.svg">
                                    </p>
                                    <p > 
                                        <strong class="has-text-orange">
                                            New appointment
                                        </strong>
                                    </p>
                                </figure>
                            </a>
                        </div>
                        <div class="column is-one-fifth is-offset-one-fifth">
                            <a href="../pages/new_patient.php">
                                <figure class="has-text-centered">
                                    <p class="image plus">
                                        <img src="../assets/plus.svg">
                                    </p>
                                    <p >
                                        <strong class="has-text-orange">
                                            New Patient
                                        </strong>
                                    </p>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function modalToggle(modalName) {
            var element = document.getElementById(`${modalName}-modal`);
            element.classList.toggle("is-active");
            }
        </script>
        <script>
            $(document).ready(function() 
                { 
                    $("#appointments").tablesorter({sortList: [[0,0], [1,0]]}); 
                } 
            ); 
        </script>
    </body>
</html>