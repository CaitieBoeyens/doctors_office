<?php require_once __DIR__.'/../fragments/setup.php'; ?>

 <?php
   /*  if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    } */
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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/doctors.css" />
        <title>Doctor</title>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <?php include __DIR__.'/../fragments/appointment-form.php'; ?>
        
        
        <div class="container main-con">
            <div class="columns">
                <div class="column is-one-third">

                    <?php 
                        $id = $_GET['id'];
                        $doctor = $db -> getDoctorDetails($id);
                        $name = $doctor['doctor_name'];
                        $surname = $doctor['doctor_surname'];
                        $specialisation = $doctor['specialisation'];
                        $doctor_img = '../assets/'.$doctor['img_path'].'.png';
                        $rooms = doctor['rooms'];
                    ?>

                    <div class="box details is-orange has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="<?= $doctor_img ?>">
                            </p>
                        </figure>
                        <h2 class="title has-text-light"><?= $name ?> <?= $surname ?></h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> <?= $specialisation ?> </p>
                        <h2><strong class="subtitle has-text-light appointments">Rooms:</strong></h2>
                        
                            <div class="box"></div>
                        
                    </div>

                </div>
                <div class="column is-two-thirds">
                    <div class="box is-blue">
                        <h1 class="has-text-light">All appointments</h1>
                        <div class="box is-blue is-shadowless">
                            <div class="box all-appointments-block">
                                <table class="table is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Patient</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        $appointments = $db->getDoctorAppointments($id);
                                        foreach($appointments as $appointment){
                                            $appointment_id = $appointment['id'];
                                            $patient = $appointment['patient_name'];
                                            $room = $appointment['room_num'];
                                            $date = $appointment['date'];
                                            $time = $appointment['time'];
                                    ?>
                                        <tr>
                                            <td><?= $date ?></td>
                                            <td><?= $time ?></td>
                                            <td><?= $patient ?></td>
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
                                            New rooms
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

    </body>
</html>