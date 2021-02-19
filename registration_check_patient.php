<?php

    if(isset($_POST['email'])){
        //walidacja danych
        $check=true;

        $email=$_POST['email'];
        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email){
            $check=false;
            $_SESSION['error_email']='<span style="color: red;">Podaj poprawny email</span>';
            header('Location: registration_patient.php');
        }

        /*$password1=$_POST['password1'];
        $password2=$_POST['password2'];
        if (strlen($password1)<8 || strlen($password1)>20){
            $check=false;
            $_SESSION['error_password']='<span style="color: red;">Haslo musi miec od 8 do 20 znakow</span>';
            header('Location: registration_patient.php');
        }
        if($password1!=$password2)
        {
            $check=false;
            $_SESSION['e_haslo']="Hasla musza byc identyczne";
            header('Location: registration_patient.php');
        }*/
        //$passwordHash=password_hash($password1, PASSWORD_DEFAULT);
    }
