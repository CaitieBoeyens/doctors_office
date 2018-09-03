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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css" />
    </head>
<body>
<?php include __DIR__.'/../fragments/navigation.php'; ?>
    <div class="container main-con">
        <div class="columns is-centered">
            <div class="column is-one-third ">
                <div class="box is-blue has-text-centered has-text-light">
                    <?php
                        $user = $db -> getUser($_SESSION['email']);
                        $name = $user['name'];    
                        $img = '../assets/'.$user['img_path'].'.png';    
                    ?>
                    <figure>
                        <a href="doctor.php">
                            <p class="image person-icon">
                                <img src="<?= $img?>">
                            </p>
                        </a>
                    </figure>
                    <h2 class="title has-text-light"><?= $name ?></h2>
                    <p> <strong class="has-text-light">Email:</strong> <?= $_SESSION['email'] ?></p>
                    <div class="field change-password">
                        <a class="button is-rounded orange-btn has-text-light">Change Password</a>
                    </div>
                </div>  
            </div>
        </div>
        <?php include __DIR__.'/../fragments/rooms.php'; ?>
    </div>

</body>
</html>