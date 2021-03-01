<?php

    session_start();
    if (!isset($_SESSION['ifLoginD'])) header('Location: index.php');

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
        

        
    </head>

    <body>
            <a href="index.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>
       

        <header id="logo_header">
            <p class="main_header">Kalendarz</p>

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

            <h2>Zaplanowane wizyty</h2>
            <ul>
                <?php  

                    if($connection->connect_errno!=0){
                        echo "Error: ".$connection->conncect_errno;
                    }
                    else{
                        $id=$_SESSION['IdDoctor']; 
                        $sql="SELECT * FROM Visits WHERE NrDoctor='$id' ORDER BY Visits.Time";
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
                                    $patient=$array[$i]['IdPatient'];
                                    $sql="SELECT * FROM Patiens WHERE IdPatient='$patient'";
                                    if($results2 = @$connection->query($sql)){
                                        $row=$results2->fetch_assoc();
                                        $name=$row['FirstName'];
                                        $secondName=$row['SecondName'];
                                        echo "<li><b>".$time."<br></b>Pacjent: ".$name." ".$secondName."</li> ";
                                    
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

 
