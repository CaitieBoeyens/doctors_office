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
        <title>Patients</title>         
        <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
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
        <div class="main-con container">
            <div class="columns">
                <div class="column is-three-fifths">
                    <div class="box is-blue">
                        <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img src="../assets/report-1.svg">
                                </p>
                            </figure>
                            <div class="media-content">
                                <h1 class="has-text-light">Patients</h1>
                            </div>
                            
                        </article>
                        <div class="box is-blue is-shadowless doctors">
                        <?php 
                        $patients = $db -> getPatients();
                        foreach($patients as $patient){
                            $patient_id = $patient['id'];
                            $name = $patient['patient_name'];
                            $medical_aid = $patient['medical_aid'];
                            $phone = $patient['phone'];
                        

                        ?>
                            <div class="box">
                                <article class="media">
                                    
                                    <div class="media-content">
                                        <h2 class="subtitle"><?= $name ?></h2>
                                        <p> <strong>Medical aid number:</strong><?= $medical_aid ?></p>
                                        <p> <strong>Phone number: </strong><?= $phone ?></p>
                                    </div>
                                    <div class="media-right">
                                        <a class="button is-rounded" href="patient.php?id=<?= $patient_id ?>">See more</a>
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

                    
                    <div class="columns">
                        <div class="column is-half">
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
                        <div class="column is-half">
                            <a href="../pages/new_patient.php">
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
    </body>
</html>