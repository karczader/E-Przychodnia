<?php
    session_start();
    if ((isset($_SESSION['ifLoginP'])) && ($_SESSION['ifLoginP']==true))
	{
		header('Location: main_doctor.php');
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
        <link rel="stylesheet" href="css/loginRegistration.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>


    <a href="index.php"><div class="back" style="margin-left: 10px;" >Powrót do strony głównej</div></a>


        <header id="logo_header">
            <p class="main_header">ZALOGUJ SIĘ NA SWOJE KONTO</p>
        </header>

       <main class>

            <form action="login_check_doctor.php" method="post" class="login_form">

                Numer służbowy<br/> 
                <input type="text" name="login" placeholder="12345" value="<?php
                    if(isset($_SESSION['fD_login'])){
                        echo $_SESSION['fD_login'];
                        unset($_SESSION['fD_login']);
                    }
                ?>"/><br/> 

                Hasło<br/> 
                <input type="password" name="password" placeholder="********" value="<?php
                    if(isset($_SESSION['fD_password'])){
                        echo $_SESSION['fD_password'];
                        unset($_SESSION['fD_password']);
                    }
                ?>"/>
                <br/><br/>

                <?php   
                    if (isset($_SESSION['error_login'])) {
                        echo $_SESSION['error_login'];
                        unset($_SESSION['error_login']);
                    }
                ?>

                <input type="submit" value="Zaloguj się!"/>

            </form>
           
       </main>

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
 
