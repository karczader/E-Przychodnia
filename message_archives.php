<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');

    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);
    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $id=$_SESSION['IdPatient'];
        $sql="SELECT * FROM Message WHERE IdPatient='$id'";
        if ($results = @$connection->query($sql)){
            $counterRead=0;
            $counterNotRead=0;
            $numberMessage=$results->num_rows;
            while ($user=mysqli_fetch_assoc($results)){
                if ($user['IfRead']==1){
                    $arrayRead[$counterRead]=$user;
                }
                else{
                    $arrayRead[$counterNotRead]=$user;
                }
            }
            
        }

    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>E-Przychodnia: Powiadomienia</title>
    <meta name="description" content=""/>
    <meta nane="keywords" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/onepage.css" type="text/css"/>
    <link rel="stylesheet" href="css/message.css" type="text/css"/>
    <link rel="stylesheet" href="css/fontello.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">

    <script type="text/javascript" src="timer.js"> </script>

</head>

<body>
    
    <div class="navtop">
        <a href="logout.php" class="logout_text">
            <div class="logout">Wyloguj się </div>
        </a>

        <div id="timer"></div>   


        <div style="clear:both;"></div>
    </div>

    <header id="logo_header">
        <p class="main_header">Archiwum powiadomień</p>
    </header>

    <nav>

        <ol>
            <a href="main_patient.php"><li>Strona główna</li></a>
            <a href="registration.php"><li>Rejestracja na wizytę</li> </a>
            <a href="history_medical.php"><li>Historia chorób</li> </a>
            <a href="current_medications.php"><li>Aktualne leki</li></a>
            <a href="message.php"><li>Powiadomienia</li></a>
            <a href="calendar_patient.php"><li>Kalendarz</li></a>
            <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
        </ol>   
    </nav>

    <main class="container">

     

        <article >

            <a href='message.php'><div id="archives">Wróć</div></a>

            <ul>
                <?php
                    for ($i=0; $i<$_SESSION['counterRead']; $i++){
                        echo "<li>";
                        $idDoctor=$arrayRead[$i]['IdDoctor'];
                        $sqlD="SELECT * FROM Doctors WHERE NrDoctor='$idDoctor'";
                        if ($resultsD = @$connection->query($sqlD)){
                            $userD=$resultsD->fetch_assoc();
                            $nameD=$userD['FirsName'];
                            $secondNameD=$userD['SecondName'];
                            $specializationD=$userD['Specialization'];
                            $sqlS="SELECT * FROM Specialization WHERE IdSpecialization='$specializationD'";
                            if ($resultsS = @$connection->query($sqlS)){
                                $userS=$resultsS->fetch_assoc();
                                $specializationD=$userS['Name'];
                            }

                           
                        }
                        echo "Od lekarza: ".$nameD." ".$secondNameD." - ".$specializationD;
                        echo "<br/> Treść: ".$arrayRead[$i]['Text'];

                        
                    }
                ?>
            <ul>

        </article>



    </main>
    

   <footer>
        Wszystkie prawa zastrzeżone &copy; 2021
   </footer>

   
</body>
</html> 


