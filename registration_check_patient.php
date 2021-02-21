<?php

    session_start();

    if(isset($_POST['email'])){
        //walidacja danych

        $fistName=$_POST['firstName'];
        $secondName=$_POST['secondName'];
        $date=$_POST['data'];
        $locality=$_POST['locality'];
        $email=$_POST['email'];
        $pesel=$_POST['pesel'];
        $phone=$_POST['phone'];
        $password1=$_POST['password1'];
        $check=true;

        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email){
            $check=false;
            $_SESSION['error_email']='<span style="color: red;">Podaj poprawny email</span><br><br>';
        }

        $password2=$_POST['password2'];
        if($password1!=$password2)
        {
            $check=false;
            $_SESSION['error_password']='<span style="color: red;">Hasla musza byc identyczne</span><br><br>';
        }
        if (strlen($password1)<8 || strlen($password1)>20){
            $check=false;
            $_SESSION['error_password']='<span style="color: red;">Haslo musi miec od 8 do 20 znakow</span><br><br>';
        }

        $pesel=$_POST['pesel'];
        if(strlen($pesel)!=11){
            $check=false;
            $_SESSION['error_pesel']='<span style="color: red;">Pesel musi miec 11 znakow</span><br><br>';
        }


        if (!$check) {

            $_SESSION['firstNameF']=$fistName;
            $_SESSION['secondNameF']=$secondName;
            $_SESSION['dataF']=$date;
            $_SESSION['localityF']=$locality;
            $_SESSION['emailF']=$email;
            $_SESSION['peselF']=$pesel;
            $_SESSION['phoneF']=$phone;
            $_SESSION['password1F']=$password1;
            header('Location: registration_patient.php');
        }

        else {

            //dodanie uzytkownika do bazy!!

            require_once "connect.php";
            $connection= @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0){
                echo "Error: ".$connection->conncect_errno;
            }
            else{
                $hashPassword=password_hash($password1, PASSWORD_DEFAULT);

                $connection->query("INSERT INTO Patiens VALUES (NULL, '$fistName', '$secondName', '$date', '$locality', '$email', '$pesel', '$phone', '$hashPassword')");

                $connection->close();
                header('Location: login_patient.php');
            }
        }

    }
