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
        <title>Patient</title>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        
        
        <div class="container main-con">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box details is-blue has-text-centered has-text-light">
                        <figure>
                            <p class="image person-icon">
                                <img src="../assets/user_placeholder.svg">
                            </p>
                        </figure>
                        <h2 class="title has-text-light">Patient Name</h2>
                        <p> <strong class="has-text-light">Medical aid number:</strong> 01010101010 </p>
                        <p> <strong class="has-text-light">Phone number:</strong> 010 101 1010 </p>
                    
                        
                    </div>

                </div>
                <div class="column is-two-thirds">
                    <div class="box is-orange">
                        <h1 class="has-text-light">All appointments</h1>
                        <div class="box is-orange is-shadowless">
                            <div class="box all-appointments-block">
                                <table class="table is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Doctor</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Monday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>F1 R2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-one-fifth is-offset-one-fifth">
                            <a href="../pages/new_appointment.php">
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
    </body>
</html>