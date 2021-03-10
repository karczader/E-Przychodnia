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

        if ($_SESSION['newFirstNameForm']!=$_SESSION['FirstName']){
            $name= $_SESSION['newFirstNameForm'];
            $_SESSION['FirstName']= $_SESSION['newFirstNameForm'];
            $connection->query("UPDATE Patiens SET FirstName='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_SESSION['newSecondNameForm']!=$_SESSION['SecondName']){
            $name=$_SESSION['newSecondNameForm'];
            $_SESSION['SecondName']=$_SESSION['newSecondNameForm'];
            $connection->query("UPDATE Patiens SET SecondName='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_SESSION['newDateOfBirthForm']!=$_SESSION['DateOfBirth']){
            $name=$_SESSION['newDateOfBirthForm'];
            $_SESSION['DateOfBirth']=$_SESSION['newDateOfBirthForm'];
            $connection->query("UPDATE Patiens SET DateOfBirth='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_SESSION['newEmailForm']!=$_SESSION['Email']){
            $name=$_SESSION['newEmailForm'];
            $emailB=filter_var($name, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email){
                $ifUpdate=false;
                $_SESSION['error_email']='<span style="color: red; margin-left: 50px;">Podaj poprawny adres e-mail</span>';
                $_SESSION['emailF']=$name;
            }
            else{
                $_SESSION['Email']=$_SESSION['newEmailForm'];
                $connection->query("UPDATE Patiens SET Email='$name' WHERE IdPatient=$id");
                $counter++;
            }
        }

        if ($_SESSION['newPeselForm']!=$_SESSION['Pesel']){
            $name=$_SESSION['newPeselForm'];
            if(strlen($name)!=11){
                $ifUpdate=false;
                $_SESSION['error_pesel']='<span style="color: red; margin-left: 50px;">Pesel musi miec 11 znakow</span>';
                $_SESSION['peselF']=$name;
            }
            else{
                $_SESSION['Pesel']=$_SESSION['newPeselForm'];
                $connection->query("UPDATE Patiens SET Pesel='$name' WHERE IdPatient=$id");
                $counter++;
            }
            
        }

        if ( $_SESSION['newPhoneNumberForm']!=$_SESSION['PhoneNumber']){
            $name=$_SESSION['newPhoneNumberForm'];
            $_SESSION['PhoneNumber']=$_SESSION['newPhoneNumberForm'];
            $connection->query("UPDATE Patiens SET PhoneNumber='$name' WHERE IdPatient=$id");
            $counter++;
        }

        if ($_SESSION['newPasswordForm']!="********"){
            $name=$_SESSION['newPasswordForm'];
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

            $name=$_SESSION['newPassword2Form'];
            if ($_SESSION['newPasswordForm']!=$_SESSION['newPassword2Form']){
                $ifUpdate=false;
                $_SESSION['error_password2']='<span style="color: red; margin-left: 50px;">Hasła muszą być takie same</span>';
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

?>