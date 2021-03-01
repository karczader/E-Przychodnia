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
        <title>E-Przychodnia: Aktualne leki</title>
        <meta name="description" content=""/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link rel="stylesheet" href="css/onepage.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>
            <a href="logout.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>
       

        <header id="logo_header">
            <p class="main_header">Aktualne leki</p>
        </header>

        <nav>

            <ol>
                <a href="main_patient.php"><li>Strona główna</li></a>
                <a href="#"><li>Rejestracja na wizytę</li> </a>
                <a href="history_medical.php"><li>Historia chorób</li> </a>
                <a href="current_medications.php"><li>Aktualne leki</li></a>
                <a href="#"><li>Powiadomienia</li></a>
                <a href="calendar_patient.php"><li>Kalendarz</li></a>
                <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
            </ol>   
        </nav>

        <main class="container">

            <article>

                <h3>Twoje aktualne leki</h3>

                <div class="list">
                    <ul>
                        <?php
                            if($connection->connect_errno!=0){
                                echo "Error: ".$connection->conncect_errno;
                            }
                            else{
                        
                                $id=$_SESSION['IdPatient'];
                                $sql="SELECT * FROM Illness WHERE IdPatient='$id'";
                                if ($results = @$connection->query($sql)){
                                    $counter=0;
                                    $number=$results->num_rows;
                                    while ($user=mysqli_fetch_assoc($results)){
                                        $array[$counter]=$user;
                                        $counter++;
                                    }
                                    for ($i=0; $i<$number; $i++){
                                        if($array[$i]['End']!=NULL){
                                            //id choroby
                                            $idIllnes=$array[$i]['IdIllnes'];
                                            $sql2="SELECT * FROM SummaryVisits WHERE IdIllnes='$idIllnes'";
                                            if ($results2 = @$connection->query($sql2)){
                                                $counter2=0;
                                                $number2=$results2->num_rows;
                                                while ($user2=mysqli_fetch_assoc($results2)){
                                                    $array2[$counter2]=$user2;
                                                    $counter2++;
                                                }
                                                for ($a=0; $a<$number2; $a++){
                                                    $idSummary=$array2[$a]['IdSummary'];
                                                    $sql3="SELECT * FROM MedicinesVisits WHERE IdSummaryVisits='$idSummary'";
                                                    if ($results3 = @$connection->query($sql3)){
                                                        $counter3=0;
                                                        $number3=$results3->num_rows;
                                                        while ($user3=mysqli_fetch_assoc($results3)){
                                                            $array3[$counter3]=$user3;
                                                            $counter3++;
                                                        }
                                                        for ($b=0; $b<$number3; $b++){
                                                            $idMedicines=$array3[$b]['IdMedicines'];
                                                            $sql4="SELECT * FROM Medicines WHERE IdMedicines='$idMedicines'";
                                                            if ($results4 = @$connection->query($sql4)){
                                                                $counter4=0;
                                                                $number4=$results4->num_rows;
                                                                while ($user4=mysqli_fetch_assoc($results4)){
                                                                    $array4[$counter4]=$user4;
                                                                    $counter4++;
                                                                }
                                                                for ($c=0; $c<$number4; $c++){
                                                                    $name=$array4[$c]['Name'];
                                                                    $description=$array4[$c]['Description'];
                                                                    $dosage=$array4[$c]['Description'];
                                                                    echo "<li> Nazwa: <b>".$name."</b><br/>Opis: ".$description."<br> Dawkowanie: ".$dosage."</li>";
                                                                }
                                                            }
                        
                                                        }
                                                    }
                        
                                                    
                                                }
                                            }
                        
                                        }
                                    }
                        
                                }
                                $connection->close();
                        
                            }
                        
                        ?>
                    <ul>
                </div>

            </article>

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
 
