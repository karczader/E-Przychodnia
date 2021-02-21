<?php
session_start();
    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $id=$_SESSION['IdPatient'];
        $ifUpdate=true;
        $counter=0;

        if ($_POST['newFirstName']!=$_SESSION['FirstName']){
            $name=$_POST['newFirstName'];
            $_SESSION['FirstName']=$_POST['newFirstName'];
            $connection->query("UPDATE Patiens SET FirstName='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_POST['newSecondName']!=$_SESSION['SecondName']){
            $name=$_POST['newSecondName'];
            $_SESSION['SecondName']=$_POST['newSecondName'];
            $connection->query("UPDATE Patiens SET SecondName='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_POST['newDateOfBirth']!=$_SESSION['DateOfBirth']){
            $name=$_POST['newDateOfBirth'];
            $_SESSION['DateOfBirth']=$_POST['newDateOfBirth'];
            $connection->query("UPDATE Patiens SET DateOfBirth='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_POST['newEmail']!=$_SESSION['Email']){
            $name=$_POST['newEmail'];
            $emailB=filter_var($name, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email){
                $ifUpdate=false;
                $_SESSION['error_email']='<span style="color: red; margin-left: 50px;">Podaj poprawny adres e-mail</span>';
                $_SESSION['emailF']=$name;
            }
            else{
                $_SESSION['Email']=$_POST['newEmail'];
                $connection->query("UPDATE Patiens SET Email='$name' WHERE IdPatient=$id");
                $counter++;
            }
        }

        if ($_POST['newPesel']!=$_SESSION['Pesel']){
            $name=$_POST['newPesel'];
            if(strlen($name)!=11){
                $ifUpdate=false;
                $_SESSION['error_pesel']='<span style="color: red; margin-left: 50px;">Pesel musi miec 11 znakow</span>';
                $_SESSION['peselF']=$name;
            }
            else{
                $_SESSION['Pesel']=$_POST['newPesel'];
                $connection->query("UPDATE Patiens SET Pesel='$name' WHERE IdPatient=$id");
                $counter++;
            }
            
        }

        if ($_POST['newPhoneNumber']!=$_SESSION['PhoneNumber']){
            $name=$_POST['newPhoneNumber'];
            $_SESSION['PhoneNumber']=$_POST['newPhoneNumber'];
            $connection->query("UPDATE Patiens SET PhoneNumber='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_POST['newPassword']!="********"){
            $name=$_POST['newPassword'];
            if (strlen($name)<8 || strlen($name)>20){
                $ifUpdate=false;
                $_SESSION['error_password']='<span style="color: red; margin-left: 50px;">Haslo musi 
                mieć od 8 do 20 znakow</span>';
            }
            else{
                $hashPassword=password_hash($name, PASSWORD_DEFAULT);
                $connection->query("UPDATE Patiens SET HashPassword='$hashPassword' WHERE IdPatient=$id");
                $counter++;
            }
           
        }

        $connection->close();
        if($ifUpdate && $counter>0) {
            $_SESSION['update_okay']='<span style="margin-left: 5px">Zaktualizowano dane</span>';
            header('Location: edit_data_patient.php');
        }
        else{
            header('Location: edit_data_patient.php');
        }
    }