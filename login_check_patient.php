 <?php

    session_start();

    if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header('Location: index.php');
        exit();
    }

    if ((isset($_SESSION['ifLoginP'])) && ($_SESSION['ifLoginP']==true))
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
        $_SESSION['f_login']=$login;
        $_SESSION['f_password']=$password;


        $sql="SELECT * FROM Patiens WHERE Email='$login' AND HashPassword='$password'";


            if ($results = @$connection->query(
            sprintf("SELECT * FROM Patiens WHERE Email='%s'",
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

                        $_SESSION['ifLoginP']=true;
                        $_SESSION['IdPatient']=$user['IdPatient'];
                        $_SESSION['FirstName']=$user['FirstName'];
                        $_SESSION['SecondName']=$user['SecondName'];
                        $_SESSION['DateOfBirth']=$user['DateOfBirth'];
                        $_SESSION['Locality']=$user['Locality'];
                        $_SESSION['Email']=$user['Email'];
                        $_SESSION['Pesel']=$user['Pesel'];
                        $_SESSION['PhoneNumber']=$user['PhoneNumber'];

                        if(isset($_SESSION['error_login'])) unset($_SESSION['error_login']);
                        $results->close();

                        header('Location: main_patient.php');
                    }
                    else{
                        $_SESSION['error_login']='<span style="color: red;">Nieprawidlowy login lub haslo</span>';
                        header('Location: login_patient.php');
                    }
                }
                //nie ma takiego uzytkownika
                else{
                    $_SESSION['error_login']='<span style="color: red;">Nieprawidlowy login lub haslo</span>';
                    header('Location: login_patient.php');
                }
            }
            
            $connection->close();

    }

?>