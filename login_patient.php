<?php
    session_start();
    if ((isset($_SESSION['ifLogin'])) && ($_SESSION['ifLogin']==true))
	{
		header('Location: main_patient.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>E-Przychodnia: zaloguj się</title>
        <meta name="description" content="`"/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/login.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>

        <header id="logo_header">
            <p class="main_header">ZALOGUJ SIĘ NA SWOJE KONTO</p>
        </header>

       <main class="container">

            <form action="login_check_patient.php" method="post" class="login_form">

                E-mail<br/> 
                <input type="text" name="login" placeholder="jan.kowalski@gmail.com"/>
                <br/> 

                Hasło<br/> 
                <input type="password" name="password" placeholder="********"/>
                <br/><br/>

                <input type="submit" value="Zaloguj się!"/>

            </form>

            <?php   
            if (isset($_SESSION['error_login'])) echo $_SESSION['error_login'];
        ?>
           
       </main>

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
