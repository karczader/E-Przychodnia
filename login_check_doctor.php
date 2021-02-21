<?php

    session_start();

    if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header('Location: index.php');
        exit();
    }

    if ((isset($_SESSION['ifLoginD'])) && ($_SESSION['ifLoginD']==true))
    {
        header('Location: main_patient.php');
        exit();
    }


    //polaczenie z baza
    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

    //sprawdzenie czy udalo sie polaczyc z baza
    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{

        $login=$_POST['login'];
        $login = htmlentities($login, ENT_QUOTES, "UTF-8"); //sprawdzenie danych, wstawienie encji html
        $password=$_POST['password'];

        //zapamietanie danych
        $_SESSION['fD_login']=$login;
        $_SESSION['fD_password']=$password;


        $sql="SELECT * FROM Doctors WHERE NrDoctor='$login' AND HashPassword='$password'";


        if ($results = @$connection->query(
            sprintf("SELECT * FROM Doctors WHERE NrDoctor='%d'",
            mysqli_real_escape_string($connection,$login))))
        {

                //ilu userow zwrocila baza?
                $howManyUsers=$results->num_rows;

                //udalo sie zalogowac
                if($howManyUsers==1)
                {

                    $user=$results->fetch_assoc();

                    if(password_verify($password, $user['HashPassword'])==true) //to jak bedzie zhashowane haslo
                    //if($password== $user['HashPassword'])
                    {

                        $_SESSION['ifLoginD']=true;
                        $_SESSION['IdDoctor']=$user['NrDoctor'];
                        $_SESSION['FirstName']=$user['FirsName'];
                        $_SESSION['SecondName']=$user['SecondName'];
                        $_SESSION['Specialization']=$user['Specialization'];
                   

                        if(isset($_SESSION['error_login'])) unset($_SESSION['error_login']);
                        $results->close();

                        header('Location: main_doctor.php');
                    }
                    else{
                        $_SESSION['error_login']='<span style="color: red;">Nieprawidlowy login lub haslo</span>';
                        header('Location: login_doctor.php');
                    }
                }
                //nie ma takiego uzytkownika
                else{
                    $_SESSION['error_login']='<span style="color: red;">Nieprawidlowy login lub haslo</span>';
                    header('Location: login_doctor.php');
                }
            }
            
            $connection->close();

    }

?>