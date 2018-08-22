 
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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
    </head>
    <body>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-third">
                    <figure>
                                <p class="image login-icon">
                                    <img src="../assets/logo.svg">
                                </p>
                        </figure>
                    <div class="box is-blue has-text-light login-block">
                        <h1 class="title has-text-light">Login</h1>
                        <div class="field">
                            <label class="label has-text-light">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="Email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label has-text-light">Password</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="password" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="control is-centered">
                             <a class="button orange-btn has-text-light is-rounded" href="home.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </body>
</html>