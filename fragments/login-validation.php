<?php

    $errors = array();
    $fields = array( 'email', 'password');
    $icons = array('email' => 'fas fa-envelope', 'password' => 'fas fa-lock');
    $types = array('email' => 'email', 'password' => 'password');
    $descriptions = array('email' => 'email', 'password' => 'password');
    $error_messages = array('email' => 'This email address is not registered with The Family Doctor', 'password' => 'Your password does not match your email address');

    function var_dump_pre($mixed = null) {
        echo '<pre>';
            var_dump($mixed);
        echo '</pre>';
        return null;
    }

    function validatePoplulated($field) {
        global $errors;
        if (empty($_POST[$field])) {
            $errors[$field] = "the $field field is required";
        }

    }

    function validateEmail($field) {
        global $errors, $error_messages, $db;

        if(!isset($errors[$field])){
       
            $result = $db -> findUser($_POST['email']);
            if($result !== '1'){
                $errors[$field] = $error_messages[$field];
            }

        }
        
    } 

    function validatePassword($field){
        global $errors, $error_messages, $db;

        if(!isset($errors[$field])){
       
            $user = $db -> getUser($_POST['email']);
            var_dump_pre($user['password']);
            var_dump_pre($_POST['password']);

            if($_POST['password'] !== $user['password']){
                $errors[$field] = $error_messages[$field];
            }

        }
    }

    $newLogin = isset($_POST['login-submit']);
    if ($formSubmitted && $newLogin) {

       foreach($fields as $field) {
           validatePoplulated($field);
        }
        validateEmail('email');
        validatePassword('password');
        
        if(empty($errors)){
           $_SESSION['email'] = $_POST['email']; 
           if(isset($_SESSION['email'])){
               header('Location: /doctors_office/pages/home.php');
           }else{
            var_dump_pre($_POST['email']);

           }
        }

    } 

    if(!$formSubmitted){
        $_POST['email'] = "";
        $_POST['password'] = "";
    }

?>