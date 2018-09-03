<?php

    $pErrors = array();
    $pFields = array(
        'patient_name', 'phone', 'medical_aid'
    );
    $pDescriptions =  array(
        'patient_name' => 'Patient Name', 'phone' => 'Phone Number', 'medical_aid' => 'Medical Aid Number'
    );

    $pTypes = array (
         'patient_name' => 'text', 'phone' => 'tel', 'medical_aid' => 'text'
    );

    $pIcons = array(
         'patient_name' => 'fas fa-user', 'phone' => 'fas fa-phone', 'medical_aid' => 'fas fa-file-medical'
    );

    $pError_messages = array(
        'patient_name' => 'A name may only contain letters',
        'phone' => 'Please enter a valid phone number <br/>(Please do not include the country code or any spaces)', 
        'medical_aid' => 'Medical aid number must be 10 digits long',
        'medical_aid2' => 'That medical aid number has already been registered with the system'
    );

    //for debugging

    

    function validatePatientPoplulated($pField) {

        global $pErrors, $pDescriptions;

        $pDescription = $pDescriptions[$pField];
        if (empty($_POST[$pField])) {
            $pErrors[$pField] = "the $pDescription is required";
        }

    }
    function validateCorrectFormat($pField){
        global $pErrors, $pDescriptions, $pError_messages;
        if(!isset($errors[$field])){
            if($pField === 'medical_aid'){
                if(!is_numeric($_POST['medical_aid']) || (strlen($_POST['medical_aid']) !== 10)){
                    $pErrors['medical_aid'] = $pError_messages['medical_aid'];
                }
            }else if ($pField === 'phone'){
                if(!is_numeric($_POST['phone']) || strlen($_POST['phone']) !== 10){
                    $pErrors['phone'] = $pError_messages['phone'];
                }
            }
        }
    }
    function validateNewMedicalAid($pField){
        global $pErrors, $pError_messages, $db;

        if(!isset($pErrors[$pField])){
            $result = $db -> findMedicalAid($_POST['medical_aid']);
            if($result === '1'){
                $pErrors['medical_aid'] = $pError_messages['medical_aid2'];
            }
        }
    }
/* regular expression from  https://www.sitepoint.com/community/t/check-whether-string-contains-numbers/5953 */
    function containsNumbers($String){
        if (preg_match('/\\d/', $String)){
            return true;
        };
    }
/*  reqular expression from https://stackoverflow.com/questions/3938021/how-to-check-for-special-characters-php */
    function containsSpecialCharacters($String){
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $String)) {
            return true;   
        };
    }

    function validatePatientName($pField) {
        global $pErrors, $pError_messages;

        $pDescription = $pDescriptions[$pField];

        if(!isset($pErrors[$pField])){
            if (containsNumbers($_POST['patient_name']) || containsSpecialCharacters($_POST['patient_name']) ){
                $pErrors['patient_name'] = $pError_messages['patient_name'];
            }
    
        }
        
    } 

    

// Handle form submissions
    $newPatientForm = isset($_POST['new-patient-submit']);
    if ($formSubmitted && $newPatientForm) {

       foreach($pFields as $pField) {
           validatePatientPoplulated($pField);
        }
        validateCorrectFormat('phone');
        validateCorrectFormat('medical_aid');
        validateNewMedicalAid('medical_aid');
        validatePatientName('patient_name');

       
        
        if(empty($pErrors)){
            $patient = array();
            $patient['patient_name'] = $_POST['patient_name'];
            $patient['medical_aid'] = $_POST['medical_aid'];
            $patient['phone'] = $_POST['phone'];
            $db->postPatient($patient); 
            echo("<script>
            function openModal() { modalToggle('success') }
            window.onload = openModal;</script>");
            
            $_POST['patient_name']='';
            $_POST['phone']='';
            $_POST['medical_aid']='';
        } else {
             echo("<script>
            function openModal() { modalToggle('patient') }
            window.onload = openModal;</script>");
        }

    } 

    if(!$formSubmitted){
        $_POST['patient_name']='';
        $_POST['phone']='';
        $_POST['medical_aid']='';
    } 
?>