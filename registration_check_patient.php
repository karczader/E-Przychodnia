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

        //imie
        $fistName = htmlentities($fistName, ENT_QUOTES, "UTF-8"); //usuwa encje htmla
        //czy zawiera tylko litery
        //czy pierwsza litera jest duza
        if(!preg_match("/[a^z]/", $fistName)){ 
            $check=false;
            $_SESSION['error_firstName']='<span style="color: red;">Imie moze zawierac tylko litery</span><br><br>';
        }









        //nazwisko
        $secondName = htmlentities($secondName, ENT_QUOTES, "UTF-8");
        if(!preg_match("/[a^z]/", $secondName)){ 
            $check=false;
            $_SESSION['error_secondName']='<span style="color: red;">Nazwisko moze zawierac tylko litery</span><br><br>';
        }

        //data urodzenia
        $todayUnix=time();
        $todayUnix=$todayUnix-(24*60*60);
        $year=1000*$date[0]+100*$date[1]+10*$date[2]+$date[3];
        $month=10*$date[5]+$date[6];
        $day=10*$date[8]+$date[9];
        $dateUnix=mktime(0,0,0,$month,$day,$year);
        if($todayUnix<$dateUnix){
            $check=false;
            $_SESSION['error_date']='<span style="color: red;">Nie mogles sie urodzic w przyszlosci</span><br><br>';
        }

        //miejscowosc
        $locality = htmlentities($locality, ENT_QUOTES, "UTF-8");
        if(!preg_match("/[a^z]/", $locality)){ 
            $check=false;
            $_SESSION['error_locality']='<span style="color: red;">Nazwa miejscowosci moze zawierac tylko litery</span><br><br>';
        }


        //email
        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email){
            $check=false;
            $_SESSION['error_email']='<span style="color: red;">Podaj poprawny email</span><br><br>';
        }

        //pesel
        if(strlen($pesel)!=11){
            $check=false;
            $_SESSION['error_pesel']='<span style="color: red;">Pesel musi miec 11 znakow</span><br><br>';
        }
        else{
            for ($i=0; $i<strlen($pesel); $i++){
                if(!is_numeric($pesel[$i])){
                    $check=false;
                    $_SESSION['error_pesel']='<span style="color: red;">Pesel może się składać tylko z cyfr</span><br><br>';
                }
            }
        }

        //phone
        for ($i=0; $i<strlen($phone); $i++){
            if(!is_numeric($phone[$i])){
                $check=false;
                $_SESSION['error_phone']='<span style="color: red;">Numer telefonu może się składać tylko z cyfr</span><br><br>';
            }
        }

        //password
        $password2=$_POST['password2'];
        if($password1!=$password2)
        {
            $check=false;
            $_SESSION['error_password']='<span style="color: red;">Hasla musza byc identyczne</span><br><br>';
        }
        if (strlen($password1)<5 || strlen($password1)>20){
            $check=false;
            $_SESSION['error_password']='<span style="color: red;">Haslo musi miec od 5 do 20 znakow</span><br><br>';
        }

         //checkbox
         if (!isset($_POST['regulations'])){
            $check=false;
            $_SESSION['error_regulations']='<span style="color: red;"><br/>Potwierdz akcpetacje regulaminu</span><br><br>';
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

            //dodanie uzytkownika do bazy
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
