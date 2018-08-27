<?php

    $errors = array();
    $fields = array(
        'patient_name', 'doctor_surname', 'date', 'time', 'room_id'
    );
    $descriptions =  array(
        'patient_name' => 'patient', 'doctor_surname' => 'doctor', 'date' => 'date', 'time' => 'time', 'room_id' => 'room'
    );

    $types = array (
        'patient_name' => 'text' , 'doctor_surname' => 'text', 'date' => 'date', 'time' => 'time', 'room_id' => ''
    );

    $icons = array(
        'patient_name' => 'fas fa-user' , 'doctor_surname' => 'fas fa-user-md', 'date' => 'far fa-calendar-alt', 'time' => 'far fa-clock', 'room_id' => 'fas fa-hospital-alt'
    );

    $error_messages = array(
        'patient_name' => 'That patient is not registered, check your spelling or add a new patient',
        'doctor_surname' => 'That doctor is not registered, please only enter their surnamem or check your spelling',
        'date' => 'Select a date within business hours, we are only open on weekdays',
        'time' => ' We are open from 9am to 4pm and slots are booked on the hour every hour',
        'room_id' => 'The doctor you entered only uses the following rooms:'
    );

    $slots = array(
        '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'
    );

    //for debugging

    function var_dump_pre($mixed = null) {
        echo '<pre>';
            var_dump($mixed);
        echo '</pre>';
        return null;
    }

    function validatePoplulated($field) {

        global $errors, $descriptions;

        $description = $descriptions[$field];
        if (empty($_POST[$field])) {
            $errors[$field] = "the $description field is required";
        }

    }

    function validateName($field) {
        global $errors, $descriptions, $error_messages, $db;

        $description = $descriptions[$field];

        if(!isset($errors[$field])){

            if ($description === 'doctor'){
                $result = $db -> findDoctor($_POST['doctor_surname']);
                if($result !== '1'){
                    $errors['doctor_surname'] = $error_messages['doctor_surname'];
                }
    
            } else if ($description === 'patient'){
                $result = $db -> findPatient($_POST['patient_name']);
                if($result !== '1'){
                    $errors['patient_name'] = $error_messages['patient_name'];
                }
            }
        }
        
    } 

    function getWeekday($date) {
        return date('w', strtotime($date));
        //https://stackoverflow.com/questions/12835133/how-to-find-the-date-of-a-day-of-the-week-from-a-date-using-php
    }

    function validateDate($field){
        global $errors, $error_messages;

        if(!isset($errors[$field])){
            $day = getWeekday($_POST['date']);
            if($day === '0' || $day === '6'){
                $errors[$field] = $error_messages[$field];
            }
        }
    }

    function validateTime($field){
        global $errors, $error_messages, $slots;

        if(!isset($errors[$field])){
            if(!in_array($_POST['time'],$slots)){
                $errors[$field] = $error_messages[$field];
            }
        }
    }

    function validateRoom($field) {
        global $errors, $error_messages, $db;

        if(!isset($errors[$field])){
            $rooms = $db -> getRoomsbyDoc($_POST['doctor_surname']);
            $room_id_list = array();
            foreach($rooms as $room) {
                array_push($room_id_list, $room['id']);
            }
            
            if(!in_array($_POST['room_id'],$room_id_list)){
                $errors[$field] = $error_messages[$field];
                $errors['rooms_2'] = true;
            }
            
        }
    }

// Handle form submissions
    $newAppointmentForm = isset($_POST['new-appointment-submit']);
    if ($formSubmitted && $newAppointmentForm) {

       foreach($fields as $field) {
           validatePoplulated($field);
        }
        validateName('doctor_surname');
        validateName('patient_name');
        validateRoom('room_id');
        validateDate('date');
        validateTime('time');

       
        
        if(empty($errors)){
            $appointment = array();
            $appointment['patient_name'] = $_POST['patient_name'];
            $appointment['doctor_surname'] = $_POST['doctor_surname'];
            $appointment['date'] = $_POST['date'];
            $appointment['time'] = $_POST['time'];
            $appointment['room_id'] = $_POST['room_id'];
            
            $db->postAppointment($appointment);
            $_POST['patient_name']='';
            $_POST['doctor_surname']='';
            $_POST['date']='';
            $_POST['time']='';
            $_POST['room_num']='';
        } else {
            echo("<script>
            function openModal() { modalToggle('appointment') }
            window.onload = openModal;</script>");
        }

    } 

    if(!$formSubmitted){
        $_POST['patient_name']='';
        $_POST['doctor_surname']='';
        $_POST['date']='';
        $_POST['time']='';
        $_POST['room_num']='';
    }
?>