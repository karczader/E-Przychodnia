<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');

    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $sqlS="SELECT * FROM Specialization";
        if($resultsS = @$connection->query($sqlS))
        {
            $counter=0;
            $number=$resultsS->num_rows;
            while ($user=mysqli_fetch_assoc($resultsS)){
                $array[$counter]=$user;
                $counter++;
            }         
        }

        $sql="SELECT * FROM Doctors";
        if($results = @$connection->query($sql))
        {
            $counter=0;
            $numberD=$results->num_rows;
            while ($user=mysqli_fetch_assoc($results)){
                $arrayD[$counter]=$user;
                $counter++;
            }         
        }
    }                        

    for ($i=0; $i<$number; $i++){
        $array[$i]['counter']=0;
    }

    if ($_POST['symptoms'])
    {
        foreach($_POST['symptoms'] as $select){
            for ($i=0; $i<$number; $i++){
                    if($array[$i]['Name']==$select)
                    {
                        $array[$i]['counter']++;
                    }
            }
        }
    }

    $max=0;
    $iMax=0;
    for ($i=0; $i<$number; $i++){
        if ($array[$i]['counter']>$max){
            $max=$array[$i]['counter'];
            $iMax=$i;
        }
    }
    $whichDoctor=$array[$iMax]['Name'];



    $connection->close();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>E-Przychodnia: Rejestracja</title>
        <meta name="description" content=""/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link rel="stylesheet" href="css/onepage.css" type="text/css"/>
        <link rel="stylesheet" href="css/edit_data.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">

        <script type="text/javascript" src="timer.js"> </script>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    
        
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
            <p class="main_header">Rejestracja na wizytę</p>
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

                <h2>Zarejestruj się na wizytę</h2>

                <form method="post" action="registration3.php">
            
                    <div class="form_element">
                        <div style="margin-top:15px;">Sugerowany lekarz</div>
                        <div><label><input type="radio" value=<?php echo $whichDoctor?> name="doctor" checked> <?php echo $whichDoctor?></label></div>
                        
                        <div style="margin-top:15px;">Wybierz sam lekarza</div>
                        <?php
                             for ($i=0; $i<$number; $i++){
                                $specialization=$array[$i]['Name'];
                                echo " <div><label><input type='radio' value='".$specialization."' name='doctor'>".$specialization."</label></div>";
                            }
                        ?>

                        <div style="margin-top:15px;">Wybierz po nazwisku</div>
                        <?php
                             for ($i=0; $i<$numberD; $i++){
                                $name=$arrayD[$i]['FirsName'];
                                $secondName=$arrayD[$i]['SecondName'];
                                $specialization=$arrayD[$i]['Specialization'];
                                $idDoctor=$arrayD[$i]['NrDoctor'];
                                $connection= @new mysqli($host, $db_user, $db_password, $db_name);
                                $sqlD="SELECT * FROM Specialization WHERE IdSpecialization='$specialization'";
                                if ($resultsD = @$connection->query($sqlD)){
                                    $userD=mysqli_fetch_assoc($resultsD);
                                    $specialization=$userD['Name'];
                                    echo " <div><label><input type='radio' value='".$idDoctor."' name='doctor'>".$name." ".$secondName." - ".$specialization."</label></div>";
                                }
                            }
                            $connection->close();

                        ?>

                    </div>

                    <div>
                        <div><input type="submit" value="Dalej"/></div>
                        <a href="registration.php"><div id="back">Wróć</div></a>
                    </div>

                </form>

            </article>
          

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
 
