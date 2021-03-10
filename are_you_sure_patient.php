<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');

    if(isset($_POST['newFirstName'])) $_SESSION['newFirstNameForm']=$_POST['newFirstName'];
    if(isset($_POST['newSecondName'])) $_SESSION['newSecondNameForm']=$_POST['newSecondName'];
    if(isset($_POST['newEmail'])) $_SESSION['newEmailForm']=$_POST['newEmail'];
    if(isset($_POST['newDateOfBirth'])) $_SESSION['newDateOfBirthForm']=$_POST['newDateOfBirth'];
    if(isset($_POST['newPesel'])) $_SESSION['newPeselForm']=$_POST['newPesel'];
    if(isset($_POST['newPhoneNumber'])) $_SESSION['newPhoneNumberForm']=$_POST['newPhoneNumber'];
    if(isset($_POST['newPassword'])) $_SESSION['newPasswordForm']=$_POST['newPassword'];
    $_SESSION['newPassword2Form']=$_POST['newPassword2'];


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>E-Przychodnia: Pacjent</title>
    <meta name="description" content=""/>
    <meta nane="keywords" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/edit_data.css" type="text/css"/>
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
            
            <form action="edit_check_patient.php">
                Czy na pewno?
                <div><input type="submit" value="Zapisz zmiany"/></div>
                <a href="edit_data_patient.php"><div id="back">Anuluj</div></a>
            </form>


        </article>

    </main>
    

   <footer>
        Wszystkie prawa zastrzeżone &copy; 2021
   </footer>

   
</body>
</html> 