 
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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css" />
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <?php include __DIR__.'/../fragments/appointment-form.php'; ?>
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

                            <div class="box">
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-128x128">
                                            <img src="../assets/user_placeholder.svg">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <h2 class="subtitle">Doctor Name</h1>
                                        <p> <strong>Specialisation:</strong>  </p>
                                        <p> <strong>Rooms: </strong>  </p>
                                    </div>
                                    <div class="media-right">
                                        <a class="button is-rounded" href='doctor.php'>See more</a>
                                    </div>
                                </article>
                            </div>
                            
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
                                    <input class="input is-medium" type="text" placeholder="Medical Aid Number">
                                    <span class="icon is-right">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
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
                                            <th>Time</th>
                                            <th>Patient</th>
                                            <th>Doctor</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>16:00</td>
                                            <td>John</td>
                                            <td>Dr Smith</td>
                                            <td>Floor 1 Room 2</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-half">
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
                        <div class="column is-half">
                            <a onclick="modalToggle('patient')">
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
        <script>
            function modalToggle(modalName) {
            var element = document.getElementById(`${modalName}-modal`);
            element.classList.toggle("is-active");
            }
        </script>
    </body>
</html>