<?php session_start() ?>
<?php require_once __DIR__.'/../fragments/setup.php'; ?>

<?php
    if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
        <link rel="stylesheet" href="../css/jquery-ui.theme.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css" />
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <?php include __DIR__.'/../fragments/patient-form.php'; ?>

        <div class="main-con container">
            <div class="columns">
                <div class="column is-three-fifths">
                    <div class="box is-blue">
                        <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img src="../assets/medical-kit.svg">
                                </p>
                            </figure>
                            <div class="media-content">
                                <h1 class="has-text-light">Doctors</h1>
                            </div>
                            <div class="media-right">
                                <a class="button is-rounded orange-btn has-text-light" href='doctors.php'>View all</a>
                            </div>
                        </article>
                        <div class="box is-blue is-shadowless doctors">

                        <?php 
                        $doctors = $db -> getDoctors();
                        foreach($doctors as $doctor){
                            $doctor_id = $doctor['id'];
                            $name = $doctor['doctor_name'];
                            $surname = $doctor['doctor_surname'];
                            $specialisation = $doctor['specialisation'];
                            $doctor_img = '../assets/'.$doctor['img_path'].'.png';
                        

                        ?>

                            <div class="box">
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-128x128">
                                            <img src="<?= $doctor_img ?>">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <h2 class="subtitle"><?= $name ?> <?= $surname ?></h2>
                                        <p> <strong>Specialisation: <?= $specialisation ?></strong>  </p>
                                    </div>
                                    <div class="media-right">
                                        <a class="button is-rounded" href='doctor.php?id=<?= $doctor_id ?>'>See more</a>
                                    </div>
                                </article>
                            </div>
                            
                            <?php }?> 
                            
                        </div>
                    </div>
                </div>
                <div class="column is-two-fifths">

                    <div class="box is-blue">
                         <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img src="../assets/magnifying-glass.svg">
                                </p>
                            </figure>
                            <div class="media-content">
                                <h1 class="has-text-light">Search Patients</h1>
                            </div>
                            <div class="media-right">
                                <a class="button is-rounded orange-btn has-text-light"  href='patients.php'>View all</a>
                            </div>
                        </article>
                        <div class="box is-blue is-shadowless">
                            <div class="field">
                                <div class="control has-icons-right">
                                    <input class="input is-medium search" type="text" placeholder="Medical Aid Number">
                                    <span class="icon is-right">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>

                            <div id="outputbox">
                                <p id="outputcontent"></p>
                            </div>
                        </div>
                    </div>

                    <div class="box is-blue">
                        <article class="media">
                            <div class="media-content">
                                <h1 class="has-text-light">Upcoming appointments</h1>
                            </div>
                            <div class="media-right">
                                <a class="button is-rounded orange-btn has-text-light"  href='appointments.php'>View all</a>
                            </div>
                        </article>
                        <div class="box is-blue is-shadowless">
                            <div class="box has-text-centered appointments">
                                <table class="table is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Patient</th>
                                            <th>Doctor</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        $appointments = $db -> getAppointments();
                                        
                                        foreach($appointments as $appointment){
                                            $appointment_id = $appointment['id'];
                                            $patient = $appointment['patient_name'];
                                            $doctor = $appointment['doctor_surname'];
                                            $room = $appointment['room_num'];
                                            $date = $appointment['date'];
                                            $time = $appointment['time'];
                                    ?>
                                        <tr>
                                            <td><?= $date ?></td>
                                            <td><?= $time ?></td>
                                            <td><?= $patient ?></td>
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
                        <div class="column is-half">
                            <a href="new_appointment.php">
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
                        <div class="column is-half">
                            <a href="new_patient.php">
                                <figure class="has-text-centered">
                                    <p class="image plus">
                                        <img src="../assets/plus.svg">
                                    </p>
                                    <p >
                                        <strong class="has-text-orange">
                                            New patient
                                        </strong>
                                    </p>
                                </figure>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        
        </div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
        
        <script type="text/javascript">
            $(function() {             

                $(".search").autocomplete({
                    source: function(request, response){
                                $.get("../fragments/search-patients.php", {
                                    term:request.term
                                    }, function(data){
                                    response($.map(data, function(item) {
                                        return {
                                            label: item.name,
                                            value: item.medical_aid,
                                            id: item.id
                                        }
                                    }))
                                }, "json");
                            },
                    minLength: 1,
                    messages: {
                        noResults: '',
                        results: function() {}
                    },
                    dataType: "json",
                    select: function (event, ui) {
                        
                            var thehtml = `<a class="button is-rounded orange-btn has-text-light"  href='patient.php?id=${ui.item.id}'>Go to ${ui.item.label}'s page</a>`;
                            $('#outputcontent').html(thehtml);
                        }
                });            
            });
        </script>

        <!-- <?php 
            /* $appointments = $db -> getAppointments();  */ 
            echo(json_encode($errors));      
        ?> -->

    </body>
</html>