<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');


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
                <a href="message.php"><li>Powiadomienia</li></a>
                <a href="calendar_patient.php"><li>Kalendarz</li></a>
                <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
            </ol>   
        </nav>

        <main class="container">

            <article>

                <h2>Zarejestruj się na wizytę</h2>

                <form method="post" action="registration2.php">
            
                    <div class="window">
                        <fieldset>
                        <legend>Wybierz objawy</legend>
                            <div><label><input type="checkbox" value="pediatra" name="symptoms[]">chore dziecko</label></div>
                            <div><label><input type="checkbox" value="ginekolog" name="symptoms[]">problemy z okresem</label></div>
                        </fieldset>
                    </div>


                    <div>
                        <div><input type="submit" value="Dalej"/></div>
                        <a href="main_patient.php"><div id="back">Anuluj</div></a>
                    </div>

                </form>

            </article>
          

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
