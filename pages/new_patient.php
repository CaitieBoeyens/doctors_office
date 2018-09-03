<?php session_start() ?>
<?php require_once __DIR__.'/../fragments/setup.php'; ?>
<?php require_once __DIR__.'/../fragments/appointment-validation.php'; ?>

<?php
    if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    }
?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>New Apppointment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css" />
</head>
<body>
    <?php include __DIR__.'/../fragments/navigation.php'; ?>
    <div class="main-con container">
        <div class="columns is-centered">
            <div class="column is-three-fifths">
                <div class="card">
                    <header class="card-header is-blue">
                        <p class="card-header-title has-text-light subtitle">
                        New Patient
                        </p>
                        
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <form name="new-patient-form" method="post" action="<?= $self ?>">
                                <input class="button is-orange has-text-light is-rounded" type="submit" name="new-patient-submit" value="Add patient">
                                <button class="button is-rounded" onclick="javascript:history.go(-1);return false;">Cancel</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    
</body>
</html>