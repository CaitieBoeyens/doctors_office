<?php

session_start();
session_destroy();
header('Location: /doctors_office/pages/login.php');

?>