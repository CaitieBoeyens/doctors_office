<?php

    //for debugging

    function var_dump_pre($mixed = null) {
        echo '<pre>';
            var_dump($mixed);
        echo '</pre>';
        return null;
    }

    function validatePoplulated($field) {

        if (empty($_POST[$field])) {
            $errors[$field] = "Please select a doctor";
        }

    }

    function validateName($field) {

        if(!isset($errors[$field])){

            $result = $db -> findDoctor($_POST['doctor_surname']);
            if($result !== '1'){
                $errors['doctor_surname'] = "This is not a valid doctor";
            }
    
        }
        
    }

// Handle form submissions
    $selectRoomForm = isset($_POST['select-room-submit']);
    $assignRoomForm = isset($_POST['new-room-submit']);
    
    if ($formSubmitted && $selectRoomForm) {

           echo("<script>
            function openModal() { modalToggle('room') }
            window.onload = openModal;</script>");

    } 
    if ($formSubmitted && $assignRoomForm) {

           
        validatePoplulated('doctor_surname');
       
        
        if(empty($errors)){
            $change = array();
            $change['room_id'] = $_POST['room_id'];
            $change['doctor_surname'] = $_POST['doctor_surname'];
            $db->assignRoom($change);
           echo("<script>
            function openModal() { modalToggle('success') }
            window.onload = openModal;</script>");
            
            $_POST['doctor_surname']='';
            $_POST['room_id']='';
        } 

    }

    if(!$formSubmitted){
        $_POST['doctor_surname']='';
        $_POST['room']='';
    }
?>