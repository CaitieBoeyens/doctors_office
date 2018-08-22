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
    <?php include __DIR__.'/../fragments/appointment-form.php'; ?>

    <button onclick="modalToggle('appointment')" >new appointment</button>

    <script>
        function modalToggle(modalName) {
        var element = document.getElementById(`${modalName}-modal`);
        element.classList.toggle("is-active");
        }
    </script>
</body>
</html>