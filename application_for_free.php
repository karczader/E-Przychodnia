<?php

    session_start();
    if (!isset($_SESSION['ifLoginD'])) header('Location: index.php');
    if(isset($_POST['beginning'])){

        $today=date("d-m-Y");
        $todayUnix=time();
        
        $beginning=$_POST['beginning'];
        $year=1000*$beginning[0]+100*$beginning[1]+10*$beginning[2]+$beginning[3];
        $month=10*$beginning[5]+$beginning[6];
        $day=10*$beginning[8]+$beginning[9];
        $beginning=date("d-m-Y",mktime(0,0,0,$month,$day,$year));
        $beginningUnix=mktime(0,0,0,$month,$day,$year);

        $end=$_POST['end'];
        $year=1000*$end[0]+100*$end[1]+10*$end[2]+$end[3];
        $month=10*$end[5]+$end[6];
        $day=10*$end[8]+$end[9];
        $end=date("d-m-Y",mktime(0,0,0,$month,$day,$year));
        $endUnix=mktime(0,0,0,$month,$day,$year);

    
        require_once "connect.php";
        $connection= @new mysqli($host, $db_user, $db_password, $db_name);
        $id=$_SESSION['IdDoctor'];
        $type=$_POST['free'];

        /*function take_vacation($id, $type){
            $connection= @new mysqli($host, $db_user, $db_password, $db_name);

            echo $id;
            echo $type;
            $_SESSION['okay']='<span style="color: rgb(48, 48, 48);">Wzięto urlop!</span>';
            //dodanie urlopy do tabeli urlopow
            $beginning=$_POST['beginning'];
            $end=$_POST['end'];
            $sql2="INSERT INTO FreeDays VALUES(NULL, '$id', '$type', '$beginning', '$end' )";
            $connection->query($sql2);
        }*/

        if ($todayUnix>=$beginningUnix)
        {
            $_SESSION['error']='<span style="color: red;">Nie możesz wziąć urlopu w przeszłości</span>';

        }
        else{
            if ($beginningUnix<=$endUnix){
                
        
                if($connection->connect_errno!=0){
                    echo "Error: ".$connection->conncect_errno;
                }
                else{
        
                    
                    //sprawdzenie czy mozna wziac jeszcze urlop na wakacje
                    if($_POST['free']=="wakacje")
                    {
                        $howlong=$endUnix-$beginningUnix; //w sekundach
                        $howlong=(($howlong/60)/60)/24;
                        $sql="SELECT * FROM Doctors WHERE NrDoctor='$id'";
                        if($results = @$connection->query($sql)){
                            $user=$results->fetch_assoc();
                            if($user['DaysForVacation']<$howlong){
                                $_SESSION['error_vacation']='<span style="color: red;">Nie mozna wziac tak dlugiego urlopu, pozostale dni wolne na wakacje to:'.$user['DaysForVacation'].' </span>';
                            }
                            else{
                                $difference=$user['DaysForVacation']-$howlong;
                                $sql3="UPDATE Doctors SET DaysForVacation='$difference' WHERE NrDoctor='$id'";
                                $connection->query($sql3);

                                //take_vacation($id, $type);

                                $_SESSION['okay']='<span style="color: rgb(48, 48, 48);">Wzięto urlop!</span>';
                                //dodanie urlopy do tabeli urlopow
                                $beginning=$_POST['beginning'];
                                $end=$_POST['end'];
                                $sql2="INSERT INTO FreeDays VALUES(NULL, '$id', '$type', '$beginning', '$end' )";
                                $connection->query($sql2);
                            }
                        }
                        
                    }
                    else{
                        //take_vacation($id, $type);

                        $_SESSION['okay']='<span style="color: rgb(48, 48, 48);">Wzięto urlop!</span>';
                        //dodanie urlopy do tabeli urlopow
                        $beginning=$_POST['beginning'];
                        $end=$_POST['end'];
                        $sql2="INSERT INTO FreeDays VALUES(NULL, '$id', '$type', '$beginning', '$end' )";
                        $connection->query($sql2);
                    }
        
        
                   
                    //znalezienie wizyt w podanych terminach i wyslanie informacji pacjentom
                    $sqlMessage="SELECT * FROM Visits WHERE NrDoctor='$id'";
                    if($resultsMessage = @$connection->query($sqlMessage)){
                            while ($userMessage=mysqli_fetch_assoc($resultsMessage)){
                                $year=1000*$userMessage['Time'][0]+100*$userMessage['Time'][1]+10*$userMessage['Time'][2]+$userMessage['Time'][3];
                                $month=10*$userMessage['Time'][5]+$userMessage['Time'][6];
                                $day=10*$userMessage['Time'][8]+$userMessage['Time'][9];
                                $timeVisits=mktime(0,0,0,$month,$day,$year);
                                if ($beginningUnix<=$timeVisits && $timeVisits<=$endUnix) {
                                    $idPatientMessage=$userMessage['IdPatient'];
                                    //wyslanie informacji pacjentowi o danym id
                                    $text='Twoja wizyta w dniu '.date("d-m-Y",mktime(0,0,0,$month,$day,$year))." została niestety odwołania, prosimy umów się ponownie";
                                    $sendMessage="INSERT INTO Message VALUES (NULL, '$idPatientMessage', '$id', '$text', 0)";
                                    $connection->query($sendMessage);
                                }
                            }
                    }
        
        
                    //odwolanie wizyt w terminie urlopu
                    $sql4="DELETE FROM Visits WHERE NrDoctor='$id' && Time BETWEEN '$beginning' AND '$end' ";
                    $connection->query($sql4);
        
        
                }
            }
            else{
                $_SESSION['error']='<span style="color: red;">Data zakończenia urlopu musi być późniejsza niż data rozpoczęcia urlopu!</span>';
            }
        }
    

       
 
    }
    //$connection->close();


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
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">

    <script type="text/javascript" src="timer.js"> </script>


    
</head>

<body onload="countingTime()">
     
        <div class="navtop">
            <a href="logout.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>

            <div id="timer"></div>   


            <div style="clear:both;"></div>
        </div>
   

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

    <main >

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


