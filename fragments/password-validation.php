<?php

    $passErrors = array();
    $passFields = array(
        'check-password', 'new-password', 'new-password-check'
    );

    $passError_messages = array(
        'check-password' => 'Password is incorrect',
        'new-password' => 'Password must be at least 4 characters long', 
        'new-password-check' => 'Passwords do not match'
    );

    //for debugging
    function var_dump_pre($mixed = null) {
        echo '<pre>';
            var_dump($mixed);
        echo '</pre>';
        return null;
    }
    

    function validatePasswordPoplulated($passField) {

        global $passErrors;

        $passDescription = $passDescriptions[$passField];
        if (empty($_POST[$passField])) {
            $passErrors[$passField] = "Cannot be blank";
        }

    }
    function validateCorrectPassword($passField){
        global $passErrors, $passError_messages, $db;
        if(!isset($errors[$passField])){
            $user = $db -> getUser($_SESSION['email']);
            $password = $user['password'];
            if($_POST['check-password'] !== $password){
                 $passErrors['check-password'] = $passError_messages['check-password'];
            }
        }
    }
    function validatePasswordsMatch($passField){
        global $passErrors, $passError_messages;

        if(!isset($passErrors[$passField])){
            if($_POST['new-password']!==$_POST['new-password-check']){
                $passErrors['new-password-check'] = $passError_messages['new-password-check'];
            }
        }
    }

    function validatePasswordFormat($passField) {
        global $passErrors, $passError_messages;

        if(!isset($passErrors[$passField])){
           if(strlen($_POST['new-password'])<4){
                 $passErrors['new-password'] = $passError_messages['new-password'];
           }
        }
        
    } 

    

// Handle form submissions
    $passwordCheckForm = isset($_POST['password-check-submit']);
    $newPasswordForm = isset($_POST['password-change-submit']);
    if ($formSubmitted && $passwordCheckForm) {

      validatePasswordPoplulated('check-password');
      validateCorrectPassword('check-password');

       
        
        if(empty($passErrors)){
            echo("<script>
            function openModal() { modalToggle('password-change') }
            window.onload = openModal;</script>");
            
        } else {
             echo("<script>
            function openModal() { modalToggle('password-check') }
            window.onload = openModal;</script>");
        }

    } 
    if ($formSubmitted && $newPasswordForm) {
        validatePasswordPoplulated('new-password');
        validatePasswordPoplulated('new-password-check');
        validatePasswordsMatch('new-password-check');
        validatePasswordFormat('new-password');


        $user = $db -> getUser($_SESSION['email']);

        if(empty($passErrors)){
            $id = $user['id'];
            $password = $_POST['new-password'];
            $db->editPassword($id, $password); 
            echo("<script>
            function openModal() { modalToggle('success') }
            window.onload = openModal;</script>");
            
        } else {
             echo("<script>
            function openModal() { modalToggle('password-change') }
            window.onload = openModal;</script>");
        }
    }



    if(!$formSubmitted){
        $_POST['patient_name']='';
        $_POST['phone']='';
        $_POST['medical_aid']='';
    } 
?>