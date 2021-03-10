<?php

    session_start();
    if (!isset($_SESSION['ifLoginD'])) header('Location: index.php');

    //polaczenie z baza
    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>E-Przychodnia: Spis pacjetnów</title>
    <meta name="description" content=""/>
    <meta nane="keywords" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/onepage.css" type="text/css"/>
    <link rel="stylesheet" href="css/list_of_patient.css" type="text/css"/>
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
        <p class="main_header">Spis pacjentów</p>

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

            <a href="list_patients.php"><div id="backList">Wróć</div></a>
            
            <ul>
                    <?php
                        if($connection->connect_errno!=0){
                            echo "Error: ".$connection->conncect_errno;
                        }
                        else{
                            $id=$_SESSION['IdPatient'];
                            $sqlP="SELECT * FROM Patiens WHERE IdPatient='$id'";
                            $resultsP=$connection->query($sqlP);
                            $userP=$resultsP->fetch_assoc();
                            echo "<h3>Pacjent: ".$userP['FirstName']." ".$userP['SecondName']."</h3>";
                            $sql="SELECT * FROM Illness WHERE IdPatient='$id' ORDER BY Beginning";
                            if($results = @$connection->query($sql)){
                                $counter=0;
                                $number=$results->num_rows;
                                while ($user=mysqli_fetch_assoc($results)){
                                    $array[$counter]=$user;
                                    $counter++;
                                }
                                for ($i=0; $i<$number; $i++){
                                    echo "<li>Początek choroby: <b>".$array[$i]['Beginning']."</b><br/>";
                                    if ($array[$i]['End']!=NULL) echo "Koniec choroby: <b>".$array[$i]['End']."</b><br/>";
                                    else echo 'Koniec choroby: <b> <span style="color: red;">wciąż trwa</span></b><br/>';
                                    $idIllness=$array[$i]['IdIllnes'];
                                    $sql2="SELECT * FROM SummaryVisits WHERE IdIllnes='$idIllness'";
                                    if($results2 = @$connection->query($sql2)){
                                        $counter2=0;
                                        $number2=$results2->num_rows;
                                        while ($user2=mysqli_fetch_assoc($results2)){
                                            $array2[$counter2]=$user2;
                                            $counter2++;
                                        }
                                        for ($a=0; $a<$number2; $a++){
                                            $idVisits=$array2[$a]['IdVisits'];
                                            $sql3="SELECT * FROM Visits WHERE IdVisit='$idVisits'";
                                            if($results3 = @$connection->query($sql3)){
                                                $counter3=0;
                                                $number3=$results3->num_rows;
                                                while ($user3=mysqli_fetch_assoc($results3)){
                                                    $array3[$counter3]=$user3;
                                                    $counter3++;
                                                }
                                                echo "<ul>";
                                                for ($b=0; $b<$number3; $b++){
                                                    $date=$array3[$b]['Time'];
                                                    $doctor=$array3[$b]['NrDoctor'];
                                                    $sqlD="SELECT * FROM Doctors WHERE NrDoctor='$doctor'";
                                                    $resultsD = @$connection->query($sqlD);
                                                    $userD=mysqli_fetch_assoc($resultsD);
                                                    $name=$userD['FirsName'];
                                                    $secondName=$userD['SecondName'];
                                                    $specialization=$userD['Specialization'];
                                                    $sqlS="SELECT * FROM Specialization WHERE IdSpecialization='$specialization'";
                                                    $resultsS = @$connection->query($sqlS);
                                                    $userS=mysqli_fetch_assoc($resultsS);
                                                    $specialization=$userS['Name'];
                                                    echo "<li>"."Data wizyty: <b>".$date."</b><br/>Doktor: <b>".$name." ".$secondName."</b> - ".$specialization."</li>";
                                                    $idSummary=$array2[$a]['IdSummary'];

                                                    //objawy
                                                    $sql4="SELECT * FROM SymptomsVisits WHERE IdSummaryVIsits='$idSummary'";
                                                    if($results4 = @$connection->query($sql4)){
                                                        $counter4=0;
                                                        $number4=$results4->num_rows;
                                                        while ($user4=mysqli_fetch_assoc($results4)){
                                                            $array4[$counter4]=$user4;
                                                            $counter4++;
                                                        }
                                                        echo "Posiadane objawy:<ul>";
                                                        for ($c=0; $c<$number4; $c++){
                                                            $idMedicines=$array4[$c]['IdSymptoms'];
                                                            $sql5="SELECT * FROM Symptoms WHERE IdSymptoms='$idMedicines'";
                                                            if($results5 = @$connection->query($sql5)){
                                                                $counter5=0;
                                                                $number5=$results5->num_rows;
                                                                while ($user5=mysqli_fetch_assoc($results5)){
                                                                    $array5[$counter5]=$user5;
                                                                    $counter5++;
                                                                }
                                                                for ($d=0; $d<$number5; $d++){
                                                                    echo "<li>".$array5[$d]['Name'].": ".$array5[$d]['Description']." - ".$array5[$d]['HowLong']."</li>";

                                                                }
                                                            }
                                                        }
                                                        echo "</ul>";
                                                    }

                                                    //przepisane leki
                                                    $sql4="SELECT * FROM MedicinesVisits WHERE IdSummaryVIsits='$idSummary'";
                                                    if($results4 = @$connection->query($sql4)){
                                                        $counter4=0;
                                                        $number4=$results4->num_rows;
                                                        while ($user4=mysqli_fetch_assoc($results4)){
                                                            $array4[$counter4]=$user4;
                                                            $counter4++;
                                                        }
                                                        echo "Zapisane leki:<ul>";
                                                        for ($c=0; $c<$number4; $c++){
                                                            $idMedicines=$array4[$c]['IdMedicines'];
                                                            $sql5="SELECT * FROM Medicines WHERE IdMedicines='$idMedicines'";
                                                            if($results5 = @$connection->query($sql5)){
                                                                $counter5=0;
                                                                $number5=$results5->num_rows;
                                                                while ($user5=mysqli_fetch_assoc($results5)){
                                                                    $array5[$counter5]=$user5;
                                                                    $counter5++;
                                                                }
                                                                for ($d=0; $d<$number5; $d++){
                                                                    echo "<li>".$array5[$d]['Name'].": ".$array5[$d]['Description']."; dawkowanie: ".$array5[$d]['Dosage']."</li>";
                                                                }
                                                            }
                                                        }
                                                        echo "</ul>";
                                                    }


                                                }
                                                echo "</ul>";
                                            }


                                        }
                                    }
                                    

                                }
                            }
                        }
                        $connection->close();
                    ?>
                </ul>
            
        </article>

    </main>
    

   <footer>
        Wszystkie prawa zastrzeżone &copy; 2021
   </footer>

   
</body>
</html> 



