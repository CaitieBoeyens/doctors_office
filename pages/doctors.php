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
        <title>Doctors</title>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <a href="../pages/rooms.php">
            <div class="floating-btn has-text-centered orange-btn">
                <p >
                    <strong class="has-text-light">
                        Assign rooms
                    </strong>
                </p>
            </div>
        </a>
        
        <div class="container main-con">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <a href="doctor.php">
                                <p class="image person-icon">
                                    <img src="../assets/user_placeholder.svg">
                                </p>
                            </a>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

                <div class="column is-one-third">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Doctor Name</h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> Pediatrician </p>
                        <p> <strong class="has-text-light">Rooms: </strong> F1 R2, F0 R5 </p>
                        <h2><strong class="subtitle has-text-light appointments">Todays Appointments:</strong></h2>
                        <div class="box appointments-block">
                            <table class="table is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>John</td>
                                        <td>F1 R2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
                
            </div>
            

        </div>
    </body>
</html>