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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/appointment.css" />
        <title>Document</title>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <a href="../pages/new_appointment.php">
            <div class="floating-btn">
                <img src="../assets/plus.svg">
            </div>
        </a>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds ">
                        <div class="box is-blue">
                            <h1 class="has-text-light">All appointments</h1>
                            <div class="box is-blue is-shadowless">
                                <div class="box all-appointments-block">
                                    <table class="table is-hoverable is-fullwidth">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $appointments = $db->getAppointments();
                                            foreach($appointments as $appointment){
                                                $appointment_id = $appointment['id'];
                                                $doctor = $appointment['doctor_surname'];
                                                $patient = $appointment['patient_name'];
                                                $room = $appointment['room_num'];
                                                $date = $appointment['date'];
                                                $time = $appointment['time'];
                                        ?>
                                            <tr>
                                                <td><?=$date ?></td>
                                                <td><?=$time ?></td>
                                                <td>Dr <?= $doctor ?></td>
                                                <td><?=$patient ?></td>
                                                <td><?=$room ?></td>
                                            </tr>
                                            <?php }?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </body>
</html>