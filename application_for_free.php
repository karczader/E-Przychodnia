<?php

    session_start();
    if (!isset($_SESSION['ifLoginD'])) header('Location: index.php');
    if(isset($_POST['beginning'])){
        $beginning=$_POST['beginning'];
        $end=$_POST['end'];
        if ($beginning<$end){

            require_once "connect.php";
            $connection= @new mysqli($host, $db_user, $db_password, $db_name);
            $id=$_SESSION['IdDoctor'];
            $type=$_POST['free'];
    
            if($connection->connect_errno!=0){
                echo "Error: ".$connection->conncect_errno;
            }
            else{
    
                //sprawdzenie czy mozna wziac jeszcze urlop na wakacje
                if($_POST['free']=="wakacje")
                {
                    $beginningDate=date('m-d-Y',strtotime($beginning));
                    $endDate=date('Y-m-d',strtotime($end));
                    echo $beginning;
                    //!!!!!!!!!!!!!!!!!
                    //nie dziala odejmowanie daty od daty, obliczanie dlugosci urlopu
                    //$howlong=$endDate-$beginningDate;
                    $howlong=10;
                    $sql="SELECT * FROM Doctors WHERE NrDoctor='$id'";
                    if($results = @$connection->query($sql)){
                        $user=$results->fetch_assoc();
                        if($user['DaysForVacation']<$howlong){
                            $_SESSION['error_vacation']='<span style="color: red;">Nie mozna wziac tak dlugiego urlopu, pozostale dni wolne na wakacje to: </span>';
                        }
                        else{
                            $difference=$user['DaysForVacation']-$howlong;
                            $sql3="UPDATE Doctors SET DaysForVacation='$difference' WHERE NrDoctor='$id'";
                            $results = @$connection->query($sql3);
                            $_SESSION['okay']='<span style="color: rgb(48, 48, 48);">Wzięto urlop!</span>';
                        }
                    }
                    
                }
                else{
                    $_SESSION['okay']='<span style="color: rgb(48, 48, 48);">Wzięto urlop!</span>';
                }
    
    
                //dodanie urlopy do tabeli urlopow
                $sql="INSERT INTO FreeDays VALUES(NULL, '$id', '$type', '$beginning', '$end' )";
                $connection->query($sql);        
    
                //znalezienie wizyt w podanych terminach i wyslanie informacji pacjentom
    
    
    
    
    
    
    
                //odwolanie wizyt w terminie urlopu
                $sql2="DELETE FROM Visits WHERE NrDoctor='$id' && Time BETWEEN '$beginning' AND '$end' ";
                $connection->query($sql2);        
    
    
                $connection->close();
            }
        }
        else{
            $_SESSION['error']='<span style="color: red;">Data zakończenia urlopu musi być późniejsza niż data rozpoczęcia urlopu!</span>';
        }
    

       
 
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>E-Przychodnia: Podanie o urlop</title>
    <meta name="description" content=""/>
    <meta nane="keywords" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/applicationForFree.css" type="text/css"/>
    <link rel="stylesheet" href="css/loginRegistration.css" type="text/css"/>
    <link rel="stylesheet" href="css/fontello.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
    

    
</head>

<body>
        <a href="logout.php" class="logout_text">
            <div class="logout">Wyloguj się </div>
        </a>
   

    <header id="logo_header">
        <p class="main_header">Złóż podanie o urlop</p>

    </header>

    <nav>

        <ol>
            <a href="main_doctor.php"><li>Strona główna</li></a>
            <a href="list_patients.php"><li>Spis pacjentów</li> </a>
            <a href="application_for_free.php"><li>Podanie o urlop</li> </a>
            <a href="calendar_doctor.php"><li>Kalendarz</li></a>
            <a href="edit_data_doctor.php"><li>Edytuj dane</li></a>
            
        </ol>   
    </nav>

    <main class="container">

        <article> 

           

            <form method="post">

                <?php
                    if(isset($_SESSION['okay'])){
                        echo $_SESSION['okay'];
                        unset($_SESSION['okay']);
                    }
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['error_vacation'])){
                        echo $_SESSION['error_vacation'];
                        unset($_SESSION['error_vacation']);
                    }

                ?>

                <div class="window"><fieldset>
                    <legend>Rodzaj wolnego</legend>
                    <div><label><input type="radio" value="L4" name="free" checked>L4</label></div>
                    <div><label><input required type="radio" value="wakacje" name="free"> Wakacje</label></div>
                </fieldset></div>

                <div class="window">
                    <label>Data rozpoczęcia: <input required type="date" name="beginning"></label>
                </div>

                <div class="window">
                    <label>Data zakończenia: <input required type="date" name="end"></label>
                </div>

                <div class="window">
                    <input type="submit" value="Wyślij"/>
                </div>



            </form>

           
        </article>

    </main>
    

   <footer>
        Wszystkie prawa zastrzeżone &copy; 2021
   </footer>

   
</body>
</html> 


