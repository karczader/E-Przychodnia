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

                <h2>Twoi pacjenci</h2>
                <ul>
                <form method="post" action="data_one_patient.php">
                    <?php
                            if($connection->connect_errno!=0){
                            echo "Error: ".$connection->conncect_errno;
                        }
                        else{

                            $id=$_SESSION['IdDoctor'];
                            $sql="SELECT * FROM ListOfPatients WHERE NrDoctor='$id'";
                            if ($results = @$connection->query($sql)){
                                $counter=0;
                                $number=$results->num_rows;
                                while ($user=mysqli_fetch_assoc($results)){
                                    $array[$counter]=$user;
                                    $counter++;
                                }
                                for ($i=0; $i<$number; $i++){
                                    $idPatient=$array[$i]['IdPatient'];
                                    $sql2="SELECT * FROM Patiens WHERE IdPatient='$idPatient'";
                                    if($results2 = @$connection->query($sql2)){
                                        $row=$results2->fetch_assoc();
                                        $name=$row['FirstName'];
                                        $secondName=$row['SecondName'];
                                        $_SESSION['IdPatient']=$idPatient;
                                        if ($array[$i]['Type']=='chory') echo "<li><b>".$name." ".$secondName." - leczony</b><input type='submit' name='indeks' value='Zobacz wiecej'/></li>";
                                        else echo "<li>".$name." ".$secondName." - zdrowy<input type='submit' name='$idPatient' value='Zobacz więcej'/></li>";
                                    }
                                }
                            }
                            $connection->close();
                        }

                    ?>
                <form>
                </ul>
                
            </article>

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 

 
