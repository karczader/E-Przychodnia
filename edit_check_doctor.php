<?php
    
    session_start();

    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $id=$_SESSION['IdDoctor'];
        $ifUpdate=true;
        $counter=0;

        if ($_POST['newFirstNameD']!=$_SESSION['FirstName']){
            $name=$_POST['newFirstNameD'];
            $_SESSION['FirstName']=$_POST['newFirstNameD'];
            $connection->query("UPDATE Doctors SET FirstName='$name' WHERE NrDoctor=$id");
            $counter++;
        }
         

        if ($_POST['newSecondNameD']!=$_SESSION['SecondName']){
            $name=$_POST['newSecondNameD'];
            $_SESSION['SecondName']=$_POST['newSecondNameD'];
            $connection->query("UPDATE Doctors SET SecondName='$name' WHERE NrDoctor=$id");
            $counter++;
        }


        if ($_POST['newPasswordD']!="********"){
            $name=$_POST['newPasswordD'];
            if (strlen($name)<8 || strlen($name)>20){
                $ifUpdate=false;
                $_SESSION['error_password']='<span style="color: red; margin-left: 50px;">Haslo musi 
                mieć od 8 do 20 znakow</span>';
            }
            else{
                $hashPassword=password_hash($name, PASSWORD_DEFAULT);
                $connection->query("UPDATE Doctors SET HashPassword='$hashPassword' WHERE NrDoctor=$id");
                $counter++;
            }
           
        }

        $connection->close();
        if($ifUpdate && $counter>0) {
            $_SESSION['update_okayD']='<span style="margin-left: 5px">Zaktualizowano dane</span>';
            header('Location: edit_data_doctor.php');
        }
        else{
            header('Location: edit_data_doctor.php');
        }
    }
