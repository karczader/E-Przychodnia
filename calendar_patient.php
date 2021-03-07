<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');

    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>E-Przychodnia: Kalendarz</title>
    <meta name="description" content=""/>
    <meta nane="keywords" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/onepage.css" type="text/css"/>
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
        <p class="main_header">Kalendarz</p>
    </header>

    <nav>

        <ol>
            <a href="main_patient.php"><li>Strona główna</li></a>
            <a href="registration.php"><li>Rejestracja na wizytę</li> </a>
            <a href="history_medical.php"><li>Historia chorób</li> </a>
            <a href="current_medications.php"><li>Aktualne leki</li></a>
            <a href="#"><li>Powiadomienia</li></a>
            <a href="calendar_patient.php"><li>Kalendarz</li></a>
            <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
        </ol>   
    </nav>

    <main class="container">

        <article>

            <h2>Zaplanowane wizyty</h2>
            <ul>
                <?php

                    if($connection->connect_errno!=0){
                        echo "Error: ".$connection->conncect_errno;
                    }
                    else{

                        $id=$_SESSION['IdPatient'];
                        $sql="SELECT * FROM Visits WHERE IdPatient='$id' ORDER BY Visits.Time";
                        $actualDate=date("Y-m-d");
                        
                        if($results = @$connection->query($sql)){
                            
                            $counter=0;
                            $numberVisits=$results->num_rows;
                            while ($user=mysqli_fetch_assoc($results)){
                                $array[$counter]=$user;
                                $counter++;
                            }
                            for ($i=0; $i<$numberVisits; $i++){
                                $time=$array[$i]['Time'];
                                if ($time>=$actualDate){
                                    $doctor=$array[$i]['NrDoctor'];
                                    $sql="SELECT * FROM Doctors WHERE NrDoctor='$doctor'";
                                    if($results2 = @$connection->query($sql)){
                                        $row=$results2->fetch_assoc();
                                        $name=$row['FirsName'];
                                        $secondName=$row['SecondName'];
                                        $specialization=$row['Specialization'];
                                        $sqlS="SELECT * FROM Specialization WHERE IdSpecialization='$specialization'";
                                        $resultsS = @$connection->query($sqlS);
                                        $userS=mysqli_fetch_assoc($resultsS);
                                        $specialization=$userS['Name'];
                                        echo "<li><b>".$time."</b><br/>Doktor: ".$name." ".$secondName." - ".$specialization."</li>";
                                    
                                    }

                                }
                                
                            }
                        }
                    }
                    $connection->close();

                
                ?>
            <ul>

        </article>

    </main>
    

   <footer>
        Wszystkie prawa zastrzeżone &copy; 2021
   </footer>

   
</body>
</html> 
